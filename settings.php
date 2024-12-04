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
 * Admin settings for the hybrid question type.
 *
 * @package   qtype_hybrid
 * @copyright  2021 KnowledgeOne <knowledgeone.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    ////////////////////////////////////////////////
    // QRMOOD-41 - As a student, I want my question status set to incomplete instead of not attempted.
    //
    // Define the defautl text to be inputed when the response summary is left blank.
    $settings->add(new admin_setting_configtext(
        'qtype_hybrid/responsesummary_default_text',
        new lang_string('responsesummary_setting_name', 'qtype_hybrid'),
        new lang_string('responsesummary_setting_desc', 'qtype_hybrid'),
        new lang_string('responsesummary', 'qtype_hybrid')
    ));
    // QRMOOD-41
}