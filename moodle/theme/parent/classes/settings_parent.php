<?php

/**
 * @package    theme_parent
 * @author     Jorge Huete & Carlos Perez
 */

class settings_parent {

    public $theme_name = '';

    public function settings(&$settings) {
            $themename = $this->theme_name;
            $settings = new theme_parent_admin_settingspage_tabs('themesetting'.$themename, get_string('configtitle', 'theme_'.$themename));
            $page = new admin_settingpage('theme_'.$themename.'_general', get_string('generalsettings', 'theme_parent'));

// Preset.
            $name = 'theme_'.$themename.'/preset';
            $title = get_string('preset', 'theme_parent');
            $description = get_string('preset_desc', 'theme_parent');
            $default = 'default.scss';

            $context = context_system::instance();
            $fs = get_file_storage();
            $files = $fs->get_area_files($context->id, 'theme_parent', 'preset', 0, 'itemid, filepath, filename', false);

            $choices = [];
            foreach ($files as $file) {
                $choices[$file->get_filename()] = $file->get_filename();
            }
// These are the built in presets.
            $choices['default.scss'] = 'default.scss';
            $choices['plain.scss'] = 'plain.scss';

            $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

// Preset files setting.
            $name = 'theme_'.$themename.'/presetfiles';
            $title = get_string('presetfiles', 'theme_parent');
            $description = get_string('presetfiles_desc', 'theme_parent');

            $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0, array('maxfiles' => 20, 'accepted_types' => array('.scss')));
            $page->add($setting);

// Background image setting.
            $name = 'theme_'.$themename.'/backgroundimage';
            $title = get_string('backgroundimage', 'theme_parent');
            $description = get_string('backgroundimage_desc', 'theme_parent');
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

// Variable $body-color.
// We use an empty default value because the default colour should come from the preset.
            $name = 'theme_'.$themename.'/brandcolor';
            $title = get_string('brandcolor', 'theme_parent');
            $description = get_string('brandcolor_desc', 'theme_parent');
            $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $page->add($setting);

// Must add the page after definiting all the settings!
            $settings->add($page);

// Advanced settings.
            $page = new admin_settingpage('theme_'.$themename.'_advanced', get_string('advancedsettings', 'theme_parent'));

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
