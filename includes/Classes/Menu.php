<?php

namespace PluginName\Classes;


class Menu
{
    public function register()
    {
        add_action( 'admin_menu', array($this, 'addMenus') );
        add_action('admin_enqueue_scripts', array($this, 'enqueueAssets'));
    }

    public function addMenus()
    {
        $menuPermission = AccessControl::hasTopLevelMenuPermission();
        if (!$menuPermission) {
            return;
        }

        $title = __('Plugin Name', 'textdomain');
        global $submenu;
        add_menu_page(
            $title,
            $title,
            $menuPermission,
            'plugun_name.php',
            array($this, 'render'),
            'dashicons-admin-site',
            25
        );

        $submenu['plugun_name.php']['my_profile'] = array(
            __('Plugin Dashboard', 'textdomain'),
            $menuPermission,
            'admin.php?page=plugun_name.php#/',
        );
        $submenu['plugun_name.php']['settings'] = array(
            __('Settings', 'textdomain'),
            $menuPermission,
            'admin.php?page=plugun_name.php#/settings',
        );
        $submenu['plugun_name.php']['supports'] = array(
            __('Supports', 'textdomain'),
            $menuPermission,
            'admin.php?page=plugun_name.php#/supports',
        );
    }

    public function render() {
        do_action('plugun_name/render_admin_app');
        wp_enqueue_script(
            'plugin_name',
            PLUGINNAME_URL . 'assets/js/plugin-main-js-file.js',
            array( 'jquery' ),
            PLUGINNAME_VERSION,
            true
        );
    }

    public function enqueueAssets()
    {

            wp_enqueue_script('plugin_name_boot', PLUGINNAME_URL.'assets/js/boot.js', array('jquery'), PLUGINNAME_VERSION, true);
            // 3rd party developers can now add their scripts here
            do_action('plugin_name/booting_admin_app');
            wp_enqueue_script('plugin_name_admin_app', PLUGINNAME_URL.'assets/js/plugin_name.js', array('wppayform_boot'), PLUGINNAME_VERSION, true);
            // wp_enqueue_style('plugin_name_admin_app', PLUGINNAME_URL.'assets/css/plugin_name-admin.css', array(), PLUGINNAME_VERSION);

            $pluginNameAdminVars = apply_filters('plugin_name/admin_app_vars',array(
                // 'image_upload_url' => admin_url('admin-ajax.php?action=wpf_global_settings_handler&route=wpf_upload_image'),
                'assets_url' => PLUGINNAME_URL.'assets/',
                'ajaxurl' => admin_url('admin-ajax.php')
            ));

            wp_localize_script('plugin_name_boot', 'PluginNameAdmin', $pluginNameAdminVars);
        
    }

}
