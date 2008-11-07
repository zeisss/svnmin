
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
	## 
	################################################################
	define ( "ACCESS_CONFIG", "/home/zeisss/var/svn/svn_moinz_de/conf/svnaccess.conf");
	
	################################################################
	## 
	################################################################
	define ( "ACCESS_USER", "/home/zeisss/var/svn/svn_moinz_de/conf/svnusers.conf");
	define ( 'ACCESS_PASSWORDTYPE', 'crypt'); # Options: crypt, md5
	
	################################################################
	# Just a title added to the html output.
	define ("TITLE", "Moinz.de");
	
?>