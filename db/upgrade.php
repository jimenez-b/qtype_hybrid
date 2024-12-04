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
 * Hybrid question type upgrade code.
 *
 * @package    qtype
 * @subpackage hybrid
 * @copyright  2011 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade code for the hybrid question type.
 * @param int $oldversion the version we are upgrading from.
 */
function xmldb_qtype_hybrid_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    // Automatically generated Moodle v3.5.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.6.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.7.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.8.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.9.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2021082303) {

        $table = new xmldb_table('qtype_hybrid_options');

        // Define field proctored_exam and upload_exam to be added to qtype_hybrid_options.
        $fields = array(
            // new xmldb_field('proctored_exam', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0', 'filetypeslist'),
            // new xmldb_field('upload_exam', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'proctored_exam')
            new xmldb_field('upload_exam', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'filetypeslist')
        );

        foreach ($fields as $field) {
            // Conditionally launch add field proctored_exam.
            if (!$dbman->field_exists($table, $field)) {
                $dbman->add_field($table, $field);
            }
        }

        // Hybrid savepoint reached.
        upgrade_plugin_savepoint(true, 2021082303, 'qtype', 'hybrid');
    }


    return true;
}
