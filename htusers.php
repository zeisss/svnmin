<?php
 ##############
 # Parses the userlist in the config constant ACCESS_FILE.
 # 
 #
 #
 ##############
 require 'config.php';

 if (!defined('ACCESS_USER'))
    die("No ACCESS_USER file provided");
        
	
	function modify_htusers_file ( $action, $data, $file = ACCESS_USER ) {

		$content = file($file);
		$newcontent = array();
			
		foreach ($content AS $line) {
			$line = trim($line);
			if ( empty($line) OR $line[0] == "#" ) { # Empty / comment lines get stored
				$newcontent[] = "$line\n";		
				continue;
			}
			
			$t = split(":", $line);
			if ( $action == "delete" && $t[0] == $data) {
				; # ignore this user, as we want to delete him	
			} else {
				# Nothing happend, re add him
				$newcontent[] = "{$t[0]}:{$t[1]}\n";	
			}
		}
		
		if ( $action == "add" ) {
			$newcontent[] = "{$data[0]}:{$data[1]}\n";	
		}

		file_put_contents($file, $newcontent);
	}
	
	if ( isset ( $_GET['action'] )) {
		if ( $_GET['action'] == "add" && !empty($_POST['username'])) {
			$username = addslashes($_POST['username']);	
			
			if ( ACCESS_PASSWORDTYPE == 'crypt') {
			   $password =  crypt(trim(addslashes($_POST['password'])), base64_encode(CRYPT_STD_DES)); 
			} else {
				$password = md5(addslashes($_POST['password']));	
			}
			modify_htusers_file('add', array($username, $password) );			
		}	
		
		else if ( $_GET['action'] == "delete" ) {
			$username = addslashes($_GET['username']);
			
			modify_htusers_file('delete', $username);	
		}
	}
	
	
	## Read the current file
	$fp = file(ACCESS_USER);
	$users = array();
	
	foreach ( $fp AS $row => $line ) {
		if ( $line[0] == "#" ) # Ignore comments
			continue;
			
		$t = split(":", $line);	 # Split username:password
		$users[] = array('name' => $t[0], 'password' => $t[1]); # Add them for later display
	}
?>
<? include 'layout/header.php'; ?>
  <h1>Manage users</h1>
  <form method="POST" action="htusers.php?action=add">
    <label for="username">Username</label> <input type="text" name="username" />
    <label for="password">Password</label> <input type="text" name="password" />
    <input type="submit" value="Add" />
  </form>
  <hr />
  <table>
  	<tr>
  		<th width=200 align=left>Username</th>
  		<th></th>
  	</tr>
  	<?php foreach ($users AS $user): ?>
  	<tr>
  		<td><?php echo $user['name']; ?></td>
  		<td><a href="htusers.php?action=delete&username=<?php echo $user['name']; ?>">[Remove]</a></td>
  	</tr>
  	<?php endforeach; ?>
  </table>
<? include 'layout/footer.php'; ?>
