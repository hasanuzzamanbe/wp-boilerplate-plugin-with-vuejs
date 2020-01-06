<?php

namespace PluginName\Classes;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Ajax Handler Class
 * @since 1.0.0
 */
class Activator
{
    public function migrateDatabases($network_wide = false)
    {
        global $wpdb;
        if ($network_wide) {
            // Retrieve all site IDs from this network (WordPress >= 4.6 provides easy to use functions for that).
            if (function_exists('get_sites') && function_exists('get_current_network_id')) {
                $site_ids = get_sites(array('fields' => 'ids', 'network_id' => get_current_network_id()));
            } else {
                $site_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE site_id = $wpdb->siteid;");
            }
            // Install the plugin for all these sites.
            foreach ($site_ids as $site_id) {
                switch_to_blog($site_id);
                $this->migrate();
                restore_current_blog();
            }
        } else {
            $this->migrate();
        }

    }

    private function migrate()
    {
        /*
        * database creation commented out, 
        * If you need any database just active this function bellow 
        * and write your own query at createBookmarkTable function
        */

        // $this->createBookmarkTable();
    }

    public function createBookmarkTable()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'plugin_name';
        $sql = "CREATE TABLE $table_name (
                                             pl_id int(10) NOT NULL AUTO_INCREMENT,
                                             pl_name varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
                                             chart_values varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
                                             created_at timestamp NULL DEFAULT NULL,
                                             updated_at timestamp NULL DEFAULT NULL,
                                             PRIMARY KEY (chart_id)
                                            ) $charset_collate;";

        $this->runSQL($sql, $table_name);
    }

    private function runSQL($sql, $tableName)
    {
        global $wpdb;
        if ($wpdb->get_var("SHOW TABLES LIKE '$tableName'") != $tableName) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
}
