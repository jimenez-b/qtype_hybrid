// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This is to extend the Hybrid question type.
 *
 * It's binding some events on custom elements on the file manager events to have a custom UI.
 *
 * @package    qtype_hybrid
 * @subpackage questionengine
 * @copyright  2010 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

M.qtype_hybrid = {};

M.qtype_hybrid.init = function(Y, options) {
    var currentImageName = '';
    var oldFiles = [];
    var requiredFiles = Y.all('.js-edit-file.is-required');

    // Listen to add ajax requests on the page
    var origOpen = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function() {
        this.addEventListener('load', function() {
            // Deleting an existing image
            if (this.responseURL.indexOf('?action=delete') > -1) {
                Y.one('.js-edit-file img[src*="' + currentImageName + '"]').get('parentNode').remove();
                currentImageName = '';
            }

            // Check if there's an existing file that went through renaming (this only happens when you select Recent files, select a file and click Rename)
            if (this.responseURL.indexOf('repository_ajax.php?action=download') > -1) {
                var response = JSON.parse(this.responseText);
                if (response.event === 'fileexists') {
                    oldFiles.push(response.existingfile.filename);
                }
            }

            // Retrieving all images from File manager
            if (this.responseURL.indexOf('draftfiles_ajax.php?action=list') > -1) {
                var response = JSON.parse(this.responseText);

                // Order by date
                var responseOrderedDate = response.list.sort((a,b) => (a.datecreated > b.datecreated) ? 1 : ((b.datecreated > a.datecreated) ? -1 : 0))


                // Remove all placeholders to rebuilt it with the list from AJAX call
                var placeholders = Y.all('.qtype_hybrid_placeholder');
                placeholders.each(function (placeholder) {
                    placeholder.remove();
                });


                // If Filecount is higher than placeholders
                var placeholdersWrapper = Y.one('.qtype_hybrid_attachments_placeholders_wrapper');
                for (var i = 0; i < response.filecount; i++) {
                    var classes = 'qtype_hybrid_placeholder js-edit-file';
                    if (i === 0) {
                        classes += ' is-required';
                    }

                    // If oldFiles exist, only keep the new named files and don't append files with old names
                    // otherwise, you will get duplicated files in the placeholders
                    // Again, this only happen when you click on Recent files, selct a file and click Rename
                    if (oldFiles.length > 0) {
                        if (oldFiles.indexOf(responseOrderedDate[i].fullname) === -1) {
                            placeholdersWrapper.append("<div class='" + classes + "'><img src='" + responseOrderedDate[i].url + "' /></div>");
                        }
                    } else {
                        // If Recent files has never been clicked (and it shouldn't happen, we keep the old logic)
                        placeholdersWrapper.append("<div class='" + classes + "'><img src='" + responseOrderedDate[i].url + "' /></div>");
                    }

                }

                // If there's no file yet, add the upload box with the text Upload file +
                if (response.filecount === 0) {
                    placeholdersWrapper.append("<div class='qtype_hybrid_placeholder is-required js-add-file'><i class='icon fa fa-plus' aria-hidden='true'></i></div>");
                }

                // Edit an existing file, will trigger the click of when you click on an image in the File manager
                // It will open a lightbox where you can Delete or update the image
                // If the slot is empty, it will add a new file
                var editFiles = Y.all('.js-edit-file');
                editFiles.each(function (editFile) {
                    editFile.on('click', function(node) {
                        if (editFile.one('img')) {
                            var fileSrc = editFile.one('img').get('src');
                            var fileSrcArray = fileSrc.split('/');

                            var thumbnailFileManager = Y.one('.fp-thumbnail img[title*="' + decodeURI(fileSrcArray[fileSrcArray.length-1]) + '"]');

                            thumbnailFileManager.simulate('click');
                            currentImageName = fileSrcArray[fileSrcArray.length-1];
                        } else {
                            var addNewButton = Y.one('.fp-btn-add .btn');
                            addNewButton.simulate('click');
                            setTimeout(function() {
                                // set user preferences to upload
                                var uploadTab = Y.one('.file-picker .fp-repo-icon[src*="repository_upload"]').get('parentNode');
                                uploadTab.simulate('click');
                            }, 500);
                        }

                    });
                });

                // Add a new file, will trigger the click of the Add new file from File manager
                var addFiles = Y.all('.js-add-file');
                addFiles.each(function (addFile) {
                    addFile.on('click', function(node) {
                        var addNewButton = Y.one('.fp-btn-add .btn');
                        addNewButton.simulate('click');
                        setTimeout(function() {
                            // set user preferences to upload
                            var uploadTab = Y.one('.file-picker .fp-repo-icon[src*="repository_upload"]').get('parentNode');
                            uploadTab.simulate('click');

                            // Add Cancel button to modal
                            setTimeout(function() {
                                var dialogButtonsWrapper = Y.one('.filepicker .fp-upload-btn');
                                var newCloseButton = Y.one('.filepicker .js-close-button');
                                if (!newCloseButton) {
                                    dialogButtonsWrapper.get('parentNode').append("<button class='btn-secondary btn js-close-button'>Cancel</button>");

                                    var closeButton = Y.one('.js-close-button');
                                    closeButton.on('click', function() {
                                        var dialogCloseButton = Y.one('.filepicker .closebutton');
                                        dialogCloseButton.simulate('click');
                                    });
                                }
                            }, 500);
                        }, 500);
                    });
                });


            }

        });
        origOpen.apply(this, arguments);
    };
};

M.qtype_hybrid.init(Y);
