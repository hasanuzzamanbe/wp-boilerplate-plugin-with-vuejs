import Vue from './elements';
import Router from 'vue-router';
Vue.use(Router);

import { applyFilters, addFilter, addAction, doAction } from '@wordpress/hooks';

export default class PluginName {
    constructor() {
        this.applyFilters = applyFilters;
        this.addFilter = addFilter;
        this.addAction = addAction;
        this.doAction = doAction;
        this.Vue = Vue;
        this.Router = Router;
    }

    $publicAssets(path){
        return (window.PluginNameAdmin.assets_url + path);
    }

    $get(options) {
        return window.jQuery.get(window.PluginNameAdmin.ajaxurl, options);
    }

    $adminGet(options) {
        options.action = 'plugin_name_admin_ajax';
        return window.jQuery.get(window.PluginNameAdmin.ajaxurl, options);
    }

    $post(options) {
        return window.jQuery.post(window.PluginNameAdmin.ajaxurl, options);
    }

    $adminPost(options) {
        options.action = 'plugin_name_admin_ajax';
        return window.jQuery.post(window.PluginNameAdmin.ajaxurl, options);
    }

    $getJSON(options) {
        return window.jQuery.getJSON(window.PluginNameAdmin.ajaxurl, options);
    }

}
