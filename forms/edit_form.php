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
 * @package   local_metagroup
 * @copyright 2020, Michelle Melton <meltonml@appstate.edu>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
require_once("$CFG->libdir/formslib.php");

class metagroup_form extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG, $COURSE;
        
        $mform = $this->_form;
        
        $mform->addElement('checkbox', 'enablemetagroup', get_string('enable', 'local_metagroup'));
        
        $mform->addElement('text', 'groupname', get_string('groupname', 'local_metagroup'));
        $mform->setType('groupname', PARAM_TEXT);
        $groupname = $COURSE->shortname . ' course';
        $mform->setDefault('groupname', $groupname);
        
        $mform->addElement('hidden', 'courseid');
        $mform->setType('courseid', PARAM_INT);
        $mform->setDefault('courseid', $COURSE->id);
        
        $this->add_action_buttons(false, 'Submit');
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}