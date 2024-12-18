<?php
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
 * Strings for component 'qtype_hybrid', language 'en', branch 'MOODLE_20_STABLE'
 *
 * @package    qtype
 * @subpackage hybrid
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['acceptedfiletypes'] = 'Accepted file types';
$string['acceptedfiletypes_help'] = 'Accepted file types can be restricted by entering a list of file extensions. If the field is left empty, then all file types are allowed.';
$string['allowattachments'] = 'Allow attachments';
$string['attachedfiles'] = 'Attachments: {$a}';
$string['attachmentsoptional'] = 'Attachments are optional';
$string['attachmentsrequired'] = 'Require attachments';
$string['attachmentsrequired_help'] = 'This option specifies the minimum number of attachments required for a response to be considered gradable.';
$string['formateditor'] = 'HTML editor';
$string['formateditorfilepicker'] = 'HTML editor with file picker';
$string['formatmonospaced'] = 'Plain text, monospaced font';
$string['formatnoinline'] = 'No online text';
$string['formatplain'] = 'Plain text';
$string['graderinfo'] = 'Information for graders';
$string['graderinfoheader'] = 'Grader Information';
$string['mustattach'] = 'When "No online text" is selected, or responses are optional, you must allow at least one attachment.';
$string['mustrequire'] = 'When "No online text" is selected, or responses are optional, you must require at least one attachment.';
$string['mustrequirefewer'] = 'You cannot require more attachments than you allow.';
$string['nlines'] = '{$a} lines';
$string['nonexistentfiletypes'] = 'The following file types were not recognised: {$a}';
$string['pluginname'] = 'Hybrid Question';
$string['pluginname_help'] = 'In response to a question, the respondent may upload one or more files and/or enter text online. A response template may be provided. Responses must be graded manually.';
$string['pluginname_link'] = 'question/type/hybrid';
$string['pluginnameadding'] = 'Adding an Hybrid question';
$string['pluginnameediting'] = 'Editing an Hybrid question';
$string['pluginnamesummary'] = 'Allows a response of a file upload and/or online text. This must then be graded manually.';
$string['privacy:metadata'] = 'The Hybrid question type plugin does not store any personal data.';
$string['responsefieldlines'] = 'Input box size';
$string['responseformat'] = 'Response format';
$string['responseoptions'] = 'Response Options';
$string['responserequired'] = 'Require text';
$string['responsenotrequired'] = 'Text input is optional';
$string['responseisrequired'] = 'Require the student to enter text';
$string['responsetemplate'] = 'Response template';
$string['responsetemplateheader'] = 'Response Template';
$string['responsetemplate_help'] = 'Any text entered here will be displayed in the response input box when a new attempt at the question starts.';

// Proctored settings
$string['filesubmissionexam'] = 'File submission exam';
$string['is_this_quiz_proctored'] = 'Is this exam proctored ?';
$string['upload_exam'] = 'Choose the file submission exam.';
$string['upload_exam_help'] = 'Choose the exam where the student will upload their files after scanning the QR Code.';
$string['choose_exam'] = 'Choose exam';

$string['nline'] = '{$a} line';

// New strings
$string['addfile'] = 'Add a new file +';
$string['uploadedfiles'] = 'Uploaded file(s)';

// Default text for the response summary.
$string['responsesummary'] = 'No answer provided by the student.';
$string['responsesummary_setting_name'] = 'Default answer';
$string['responsesummary_setting_desc'] = 'The default answer when a student leave the response summary blank.';
