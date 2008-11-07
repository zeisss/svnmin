<?php
	require_once 'config.php';	
?>
<html>
	<head>
		<title><?php echo TITLE; ?> - Index</title>
	</head>
	<body>
		<div id="content">
			<ul>
				<li><a href="htusers.php">Manage users</a></li>
				<li><a href="svnaccess.php">Manage repository access</a></li>
				<li><a href="create-repository.php">Create a new repository</a></li>
				<li><a href="modify-post-commit.php">Modify the post-commit hook</a></li>
				<li><a href="README.markdown">See the README</a></li>
			</ul>			
		</div>
	</body>
</html>