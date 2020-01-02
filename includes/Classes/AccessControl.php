<?php

namespace PluginName\Classes;


class AccessControl
{
    public static function hasTopLevelMenuPermission()
    {
        $menuPermissions = array(
            'manage_options',
            'plugin_name_full_access',
            'plugin_name_can_view_menus'
        );
        foreach ($menuPermissions as $menuPermission) {
            if (current_user_can($menuPermission)) {
                return $menuPermission;
            }
        }
        return false;
    }
}
