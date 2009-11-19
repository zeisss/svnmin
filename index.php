<?php
	require_once 'config.php';	
?>
<? include 'layout/header.php'; ?>

	<ul id="index-list">
				<li><a href="htusers.php">Manage users</a></li>
				<li><a href="svnaccess.php">Manage repository access</a></li>
				<li><a href="create-repository.php">Create a new repository</a></li>
				<li><a href="modify-post-commit.php">Modify the post-commit hook</a></li>
				<li><a href="README.markdown">See the README</a></li>
	</ul>			
<? include 'layout/footer.php'; ?>
