var readline = require('readline');

var rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

function convertToLowercase(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'')
        .replace(/[^\w-]+/g,'')
        ;
}

function camalize(str) {
  return str.toLowerCase().replace(/[^a-zA-Z0-9]+(.)/g, function(match, chr)
  {
      return chr.toUpperCase();
  });
}

function convertToUpperCamel(Text)
{
    return Text
        .to()
        .replace(/ /g,'')
        .replace(/[^\w-]+/g,'')
        ;
}

function convertToUppercase(Text)
{
    return Text
        .toUpperCase()
        .replace(/ /g,'')
        .replace(/[^\w-]+/g,'')
        ;
}


rl.question("Please enter your plugin Name:", function(answer) {
  // TODO: Log the answer in a database
  // console.log("Your plugin Name slug is: "+' '+ convertToSlug(answer));
  var glob = require('glob');
  var fs = require('fs');
  

  // For entry file selection
  glob("plugin-name.php", function(err, files) {
        files.forEach(function(item, index, array) {
          
          var data = fs.readFileSync(item, 'utf8');
          var Uppercase = convertToUppercase(answer);
          var Lowercase = convertToLowercase(answer);
          var Slug      = convertToSlug(answer);
          var Camel     = camalize(answer);
      
          var mapObj = {
            PluginName: Camel,
            plugin_name: Slug,
            PLUGINNAME: Uppercase,
            pluginname: Lowercase
         };
         var result = data.replace(/pluginName|plugin_name|PLUGINNAME|pluginname/gi, function(matched){
           return mapObj[matched];
         });
          fs.writeFile(item, result, 'utf8', function (err) {
              if (err) return console.log(err);
          });
          console.log('Replacement complete');
      });
  });

  glob("includes/autoload.php*", function(err, files) {

    files.forEach(function(item, index, array) {
          
              var data = fs.readFileSync(item, 'utf8');
              var Uppercase = convertToUppercase(answer);
              var Lowercase = convertToLowercase(answer);
              var Slug      = convertToSlug(answer);
              var Camel     = camalize(answer);
          
              var mapObj = {
                PluginName: Camel,
                plugin_name: Slug,
                PLUGINNAME: Uppercase,
                pluginname: Lowercase
             };
             var result = data.replace(/pluginName|plugin_name|PLUGINNAME|pluginname/gi, function(matched){
               return mapObj[matched];
             });
              fs.writeFile(item, result, 'utf8', function (err) {
                  if (err) return console.log(err);
              });
              console.log('Replacement complete');
          });
  });



  // Find file(s) except node and entry
  glob("!(node_modules)/*/*.*", function(err, files) {
      if (err) { throw err; }
  
      files.forEach(function(item, index, array) {

            // Read fileclear
            var data = fs.readFileSync(item, 'utf8');

       
            var Uppercase = convertToUppercase(answer);
            var Lowercase = convertToLowercase(answer);
            var Slug      = convertToSlug(answer);
            var Camel     = camalize(answer);
         

            var mapObj = {
              YourPlugin: answer,
              PluginName: Camel,
              plugin_name: Slug,
              PLUGINNAME: Uppercase,
              pluginname: Lowercase
           };
           var result = data.replace(/YourPlugin|pluginName|plugin_name|PLUGINNAME|pluginname/gi, function(matched){
             return mapObj[matched];
           });
  
            fs.writeFile(item, result, 'utf8', function (err) {
                if (err) return console.log(err);
            });
            console.log('Replacement complete');
        });
  });


  // Closing all inputs
  rl.close();
});

