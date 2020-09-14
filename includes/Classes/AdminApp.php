<?php

namespace PluginName\Classes;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Admin App Renderer and Handler
 * @since 1.0.0
 */
class AdminApp
{
    public function bootView()
    {
        echo "<div id='plugin_name_app'></div>";
    }
}
