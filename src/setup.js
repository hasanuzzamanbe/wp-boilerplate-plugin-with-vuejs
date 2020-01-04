var readline = require('readline');

var rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});
// function convertToSlug(Text)
// {
//     return Text
//         .toLowerCase()
//         .replace(/ /g,'-')
//         .replace(/[^\w-]+/g,'')
//         ;
// }


rl.question("Please enter your plugin Name:", function(answer) {
  // TODO: Log the answer in a database
  // console.log("Your plugin Name slug is: "+' '+ convertToSlug(answer));
  var glob = require('glob');
  var fs = require('fs');
  // var replace = require("replace");
  
  // Find file(s)
  glob("!(node_modules)/*/*.*", function(err, files) {
      if (err) { throw err; }
      // console.log(files);
      files.forEach(function(item, index, array) {
            // console.log(item + ' found');
            // Read fileclear
            var data = fs.readFileSync(item, 'utf8');
            // console.log(data);
            var result = data.replace(/PluginName/g, answer);
            // console.log(item,'item')

          //   var mapObj = {
          //     pluginName:"dog",
          //     plugin_name:"goat",
          //     plugin_name:"cat"
          //  };
          //  str = str.replace(/cat|dog|goat/gi, function(matched){
          //    return mapObj[matched];
          //  });




            // var result = data.replace(/plugin-name/g, 'shamim');
  
            fs.writeFile(item, result, 'utf8', function (err) {
                if (err) return console.log(err);
            });
            console.log('Replacement complete');
        });
  });





  rl.close();
});

// var fs = require("fs");

/* create a file if not exist */

// fs.exists('../bb.php', (exists) => {
//   if (exists) {
//     console.error('file already exists');
//   } else {
//     fs.open('../bb.php', 'wx', (err, fd) => {
//       if (err) throw err;
//       console.log(err);
//     });
//   }
// });

/* Read a file */

// fs.readFile("../plugin-name.php", function(err, buf) {
//   console.log(buf);
// });


/* Try to Replace a string */
// fs.readFile("../bb.php", 'utf8', function (err,data) {
//   if (err) {
//     return console.log(err);
//   }else {
//     console.log(data, 'data');
//   }
  // var result = data.replace('shamim', 'xaaman');

  // fs.writeFile("../bb.php", result, 'utf8', function (err) {
  //    console.log(result);
  //    if (err) return console.log(err);
  // });
// });



