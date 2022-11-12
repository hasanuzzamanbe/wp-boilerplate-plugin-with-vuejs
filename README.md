# WordPress boilerplate plugin with Vue.js

#### A simple boilerplate plugin for WordPress using vue js.

## How to use:

* Clone this repository on your local `plugin folder`

* Run command `npm i` to install node modules.

Now just setup for your own plugin, it's very easy using node auto command.
##### 1. Auto setup:
Just run `node src/setup`
it will ask for a plugin name, type your plugin name and hit enter.

Your plugin is ready to use.

Now run `npm run watch`
Then activate the plugin from your WP admin dashboard.

If you want to make setup by hand you can do it also. But auto setup is the best option for you.

<details><summary>Or Manual Setup</summary>

## Step to make your own plugin

* Open with an IDE (Vscode, sublime, PhpStorm etc)

* Change all the   `plugin_name` to Your-Plugin-Name 
* Change all the   `PLUGINNAME`  to YOURPLUGINNAME    (Upper case)
* Change all the   `PluginName`  to YourPluginName    (Upper Camel Case)
* Change all the   `Plugin_Name` to your_plugin_name
* Change all the   `textdomain`  to yourtextdomain

</details>

## All done have fun


# Some suggestions for beginners:

#### Now your plugin is ready to use with a standard format.
#### You can write vue.js codes inside `/src` folder
#### Do any customization you need.

 ### NB: These 3 packages are already installed on this project, You can use those or remove that if you don't need.
 * element-ui
 * vue-router
 * @Wordpress/hooks
 
 For more details please check the `package.json` file
 
 
 ### After Development Production:
 When your Plugin development is complete and you want to use it for production. Then run `npm run prod` after that you can delete some files which are already build.
 
 Files/Folder you should delete on production:
 * node modules 
 * src
 * package-lock.json
 
 
 ### For Help:
 Please feel free to mail me <a href="mailto:hasanuzzamanbe@gmail.com">hasanuzzamanbe@gmail.com</a>
 
 For faster response please text me on https://www.hasanuzzaman.com live chat.
 
 <hr>
 
### Other Setups you may Use
* WordPress Plugin with Vue 3, tailwind (Vite Build) [https://github.com/hasanuzzamanbe/wp-boilerplate-vue-with-vite]
* WordPress Plugin with Vue 3, tailwind (Laravel Mix Build) [https://github.com/hasanuzzamanbe/wp-plugin-with-vue-tailwind]
 
