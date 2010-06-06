<?php
	require 'model.php';

	if ( isset ( $_GET['name'] ) && !empty($_GET['name'])) 
	{
		if ( !preg_match_all(REPOSITORY_PATTERN, $_GET['name'], $matches) )
		{
			die ( "Invalid repository name.");	
		}

		$path = SVN_PARENT . $_GET['name'];
		if ( file_exists($path) ) 
		{
			echo "Path $path already exists.";
		} else 
		{
			echo "Creating new repository '{$_GET['name']}': ";
			if ( system("svnadmin create " . SVN_PARENT . $_GET['name']) !== FALSE) 
			{
				echo "Success";
			} else {
				echo "Failure";
			}
		}
	}
?>
<? include 'layout/header.php'; ?> 
<h1>Create a new repository</h1>
 <form>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" />
  <input type="submit" />
 </form>
<? include 'layout/footer.php'; ?>
