
<?php
	## REMOVE THIS
	die("Not yet configured. See config.php");
	## END OF REMOVE THIS
	
    error_reporting(E_ALL);
    
	###############################################################
	## Define the folder, where your Subversion repositories are.
	###############################################################
	define ( "SVN_PARENT", "/opt/svn");
	
	###############################################################
	##  A pattern to check the repository name before creating one.
	###############################################################
	define ( "REPOSITORY_PATTERN", '/^[A-Za-z][A-Za-z0-9]*$/');
	
	################################################################
	## Where is the path based authorization file located?
	################################################################
	define ( "ACCESS_CONFIG", "/opt/svn/svnaccess.conf");
	
	################################################################
	## 
	################################################################
	define ( "ACCESS_USER", "/opt/svn/svnusers.conf");
	define ( 'ACCESS_PASSWORDTYPE', 'crypt'); # Options: crypt, md5
	
	################################################################
	# Just a title added to the html output.
	define ("TITLE", "Svnmin");
	
?>