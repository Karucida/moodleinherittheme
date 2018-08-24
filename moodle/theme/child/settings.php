<?php

/**
 * @package    theme_parent
 * @author     Jorge Huete & Carlos Perez
 */

include_once ('config.php');
include_once $CFG->dirroot . '/theme/'.$THEME->name.'/classes/settings_child.php';
require_once($CFG->libdir.'/adminlib.php');

if ($ADMIN->fulltree) {
    $childsettings = new settings_child();
    $childsettings->theme_name = $THEME->name;
    $childsettings->settings($settings);
}
