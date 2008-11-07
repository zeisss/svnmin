<?php
 ##############
 # Parses the userlist in the config constant ACCESS_FILE.
 # 
 #
 #
 ##############
 
	require 'config.php';
	
	function modify_htusers_file ( $action, $data, $file = ACCESS_USER ) {
		
	}
	
	$fp = file(ACCESS_USER);
	$users = array();
	
	foreach ( $fp AS $row => $line ) {
		if ( $line[0] == "#" ) # Ignore comments
			continue;
			
		$t = split(":", $line);	 # Split username:password
		
		$users[] = array('name' => $t[0], 'password' => $t[1]); # Add them for later display
	}
	fclose($fp);
	
	if ( isset ( $_GET['action'] )) {
		if ( $_GET['action'] == "add" ) {
			$username = addslashes($_POST['username']);	
			
			if ( ACCESS_PASSWORDTYPE == 'crypt') {
			   $password =  crypt(trim(addslashes($_POST['password'])), base64_encode(CRYPT_STD_DES)); 
			} else {
				$password = md5(addslashes($_POST['password']));	
			}
			echo "{$username}:{$password}";

			modify_htusers_file('add', array($username, $password) );			
		}	
		
		else if ( $_GET['action'] == "delete" ) {
			$username = addslashes($_GET['username']);
			
			modify_htusers_file('delete', $username);	
		}
	}
?>
<html>
 <head>
  <title><?php echo TITLE; ?> - Manage users</title>
 </head>
 <body>
  <h1>Manage users</h1>
  <form method="POST" action="htusers.php?action=add">
    <label for="username">Username</label> <input type="text" name="username" />
    <label for="password">Password</label> <input type="text" name="password" />
    <input type="submit" value="Add" />
  </form>
  <hr />
  <table>
  	<tr>
  		<th width=200>Username</th>
  		<th width=200>Password</th>
  		<th></th>
  	</tr>
  	<?php foreach ($users AS $user): ?>
  	<tr>
  		<td><?php echo $user['name']; ?></td>
  		<td><?php echo $user['password']; ?></td>
  		<td><a href="htusers.php?action=delete&username=<?php echo $user['name']; ?>">[Remove]</a></td>
  	</tr>
  	<?php endforeach; ?>
  </table>
 </body>
</html>