<?php

namespace PluginName\Classes;


class Menu
{
    public function register()
    {
        add_action( 'admin_menu', array($this, 'addMenus') );
    }

    public function addMenus()
    {
        $menuPermission = AccessControl::hasTopLevelMenuPermission();
        if (!$menuPermission) {
            return;
        }

        $title = __('YourPlugin', 'textdomain');
        global $submenu;
        add_menu_page(
            $title,
            $title,
            $menuPermission,
            'plugin_name.php',
            array($this, 'enqueueAssets'),
            'dashicons-admin-site',
            25
        );

        $submenu['plugin_name.php']['my_profile'] = array(
            __('Plugin Dashboard', 'textdomain'),
            $menuPermission,
            'admin.php?page=plugin_name.php#/',
        );
        $submenu['plugin_name.php']['settings'] = array(
            __('Settings', 'textdomain'),
            $menuPermission,
            'admin.php?page=plugin_name.php#/settings',
        );
        $submenu['plugin_name.php']['supports'] = array(
            __('Supports', 'textdomain'),
            $menuPermission,
            'admin.php?page=plugin_name.php#/supports',
        );
    }

    public function enqueueAssets() {
        do_action('plugin_name/render_admin_app');
        wp_enqueue_script('plugin_name_boot', PLUGINNAME_URL.'assets/js/boot.js', array('jquery'), PLUGINNAME_VERSION, true);
       
        // 3rd party developers can now add their scripts here
        do_action('plugin_name/booting_admin_app');     
        wp_enqueue_script( 'plugin_name_js', PLUGINNAME_URL . 'assets/js/plugin-main-js-file.js', array( 'plugin_name_boot' ), PLUGINNAME_VERSION, true );
       
        //enque css file
        wp_enqueue_style('plugin_name_admin_css', PLUGINNAME_URL.'assets/css/element.css');

        $PluginNameAdminVars = apply_filters('plugin_name/admin_app_vars',array(
            // 'image_upload_url' => admin_url('admin-ajax.php?action=wpf_global_settings_handler&route=wpf_upload_image'),
            'assets_url' => PLUGINNAME_URL.'assets/',
            'ajaxurl' => admin_url('admin-ajax.php')
        ));

        wp_localize_script('plugin_name_boot', 'PluginNameAdmin', $PluginNameAdminVars);
    }

}
