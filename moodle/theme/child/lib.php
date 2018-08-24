<?php
/**
 * @package    theme_child
 * @author     Jorge Huete & Carlos Perez
 */

//INCLUDE THE LIB OF THE PARENT
include_once ($CFG->dirroot.'/theme/parent/lib.php');

defined('MOODLE_INTERNAL') || die();


//JUST CALL TO THE FUNCTION OF THE PARENT
function theme_child_get_main_scss_content($theme) {
    theme_parent_get_main_scss_content($theme);
    //MORE STUFF
}

