<?php

/**
 * @package    theme_parent
 * @author     Jorge Huete & Carlos Perez
 */

require_once($CFG->dirroot . '/theme/parent/classes/settings_parent.php');

class settings_child extends settings_parent{
    
    public function settings(&$settings) {
        
            parent::settings($settings);

            //ADD EXTRA SETTINGS LIKE
            
            $themename = $this->theme_name;
            // Advanced settings.
            $page= new admin_settingpage('theme_'.$themename.'_advanced', 'Te bañaste wey');

            // Raw SCSS to include before the content.
            $setting = new admin_setting_scsscode('theme_'.$themename.'/scsspre', get_string('rawscsspre', 'theme_parent'), get_string('rawscsspre_desc', 'theme_parent'), '', PARAM_RAW);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            // Raw SCSS to include after the content.
            $setting = new admin_setting_scsscode('theme_'.$themename.'/scss', get_string('rawscss', 'theme_parent'), get_string('rawscss_desc', 'theme_parent'), '', PARAM_RAW);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

            $settings->add($page);
    }
    
}
