window.PluginNameBus = new window.PluginName.Vue();

window.PluginName.Vue.mixin({
    methods: {
        applyFilters: window.PluginName.applyFilters,
        addFilter: window.PluginName.addFilter,
        addAction: window.PluginName.addFilter,
        doAction: window.PluginName.doAction,
        $get: window.PluginName.$get,
        $adminGet: window.PluginName.$adminGet,
        $adminPost: window.PluginName.$adminPost,
        $post: window.PluginName.$post,
        $publicAssets: window.PluginName.$publicAssets
    }
});

import {routes} from './routes'

const router = new window.PluginName.Router({
    routes: window.PluginName.applyFilters('PluginName_global_vue_routes', routes),
    linkActiveClass: 'active'
});

import App from './AdminApp'

new window.PluginName.Vue({
    el: '#plugin_name_app',
    render: h => h(App),
    router: router
});

