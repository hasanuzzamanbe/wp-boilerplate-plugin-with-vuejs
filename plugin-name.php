<?php

/*
Plugin Name: plugin_name
Plugin URI: #
Description: A WordPress boilerplate plugin with Vue js.
Version: 1.0.0
Author: #
Author URI: #
License: A "Slug" license name e.g. GPL2
Text Domain: textdomain
*/


/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 *
 * Copyright 2019 Plugin Name LLC. All rights reserved.
 */

if (!defined('ABSPATH')) {
    exit;
}
if (!defined('PLUGINNAME_VERSION')) {
    define('PLUGINNAME_VERSION_LITE', true);
    define('PLUGINNAME_VERSION', '1.1.0');
    define('PLUGINNAME_MAIN_FILE', __FILE__);
    define('PLUGINNAME_URL', plugin_dir_url(__FILE__));
    define('PLUGINNAME_DIR', plugin_dir_path(__FILE__));
    define('PLUGINNAME_UPLOAD_DIR', '/plugin_name');

    class PluginName
    {
        public function boot()
        {
            if (is_admin()) {
                $this->adminHooks();
            }
        }

        public function adminHooks()
        {
            require PLUGINNAME_DIR.'includes/autoload.php';

            //Register Admin menu
            $menu = new \PluginName\Classes\Menu();
            $menu->register();

             // Top Level Ajax Handlers
            $ajaxHandler = new \PluginName\Classes\AdminAjaxHandler();
            $ajaxHandler->registerEndpoints();

            add_action('plugin_name/render_admin_app', function () {
                $adminApp = new \PluginName\Classes\AdminApp();
                $adminApp->bootView();
            });

        }

        public function textDomain()
        {
            load_plugin_textdomain('plugin_name', false, basename(dirname(__FILE__)) . '/languages');
        }

    }

    add_action('plugins_loaded', function () {
        (new PluginName())->boot();
    });

    register_activation_hook(__FILE__, function ($newWorkWide) {
        require_once(PLUGINNAME_DIR . 'includes/Classes/Activator.php');
        $activator = new \PluginName\Classes\Activator();
        $activator->migrateDatabases($newWorkWide);
    });

    // disabled admin-notice on dashboard
    add_action('admin_init', function () {
        $disablePages = [
            'plugin_name.php',
        ];
        if (isset($_GET['page']) && in_array($_GET['page'], $disablePages)) {
            remove_all_actions('admin_notices');
        }
    });

} else {
    add_action('admin_init', function () {
        deactivate_plugins(plugin_basename(__FILE__));
    });
}
