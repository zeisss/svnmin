<?php
	require 'config.php';
	
	$use_template = true;
	
	$content = "";
	
	if ( isset ( $_POST['repository']) && !empty($_POST['repository'])) {
		$path = SVN_PARENT . "/{$_POST['repository']}/hooks/post-commit";
		if ( isset ( $_POST['content'] ) ) {
			file_put_contents($path, str_replace("\r\n", "\n", $_POST['content']));
			system("chmod u+x $path");
		}
	 	
	 	if ( file_exists($path)) {
	 		$content = file_get_contents($path);
	 	}
	 	
	 	if ( $content == "" && $use_template) {
	 		$content = file_get_contents($path . ".tmpl");
	 	}
	}
	
	$dp = opendir(SVN_PARENT);
    while ( ( $file = readdir($dp)) !== false) {
      	# TODO: Put the files into an array and sort it before printing it out.
        if ( $file[0] == "." ) continue;	
     	
     	$repositories[] = $file;    
    }
	closedir($dp);
	sort($repositories);
?>
<html>
<head>
 <title><?php echo TITLE; ?> - Trigger modify</title>
</head>
<body>
<form method="POST">
 <label for="repository">Repository:</label>
 <select name="repository">
   <option></option>
   <?php
      foreach ( $repositories AS $file) {
         if ( $_POST['repository'] == $file ) {
           echo "<option selected=\"selected\">$file</option>\n";
         } else {
           echo "<option>$file</option>\n";
         }
      }
   ?>
 </select><input type="submit" value="Ausw&auml;hlen" />
</form>
<hr />
<?php if(isset($_POST['repository']) && !empty($_POST['repository'])): ?>
<form method="POST">
 <input type="hidden" name="repository" value="<?php echo $_POST['repository']; ?>" />
 <span>Repository: <?php echo $_POST['repository']; ?></span><br />
 
 <label for="content">post-commit trigger:</label><br />
 <textarea cols="80" rows="20" name="content"><?php print $content; ?></textarea>
 <br />
 <input type="submit" value="Speichern" />
</form>
<?php endif; ?>
</body>
</html>

