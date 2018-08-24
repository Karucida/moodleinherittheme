<?php

/**
 * @package    theme_parent
 * @author     Jorge Huete & Carlos Perez
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir.'/adminlib.php');
include_once ('config.php');
include_once $CFG->dirroot . '/theme/'.$THEME->name.'/classes/settings_parent.php';


if ($ADMIN->fulltree) {
    $parentsettings = new settings_parent();
    $parentsettings->theme_name = $THEME->name;
    $parentsettings->settings($settings);
}

