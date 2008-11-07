<?php
	require_once 'config.php';	
?>
<html>
	<head>
		<title><?php echo TITLE; ?> - Index</title>
		<style>
			a {
				color:black;
				text-decoration:none;
			}
			body { 

				margin:0;
				padding:0;
			}
			#content {

				text-align:center;
				border-bottom:2px white solid;
			}
			#content h1 {
				color:black;	
			}
			#index-list {
				text-align:left;
				
				margin:auto;

				width:400px;
				padding-bottom:100px;
				list-style-type:none;
				list-style-image:none;	
			}
			#index-list li {
				border:1px grey solid;
				padding-left:15px;
				padding-top:12px;
				padding-bottom:10px;
				margin-bottom:5px;
			}
			
			#content a {
				font-weight:bold;	
			}
			
			#footer {
				text-align:right;
				color:grey;
				font-size:x-small;
				padding-right:50px;	
			}
		</style>
	</head>
	<body>
		<div id="content">
			<h1>svnmin</h2>
			<ul id="index-list">
				<li><a href="htusers.php">Manage users</a></li>
				<li><a href="svnaccess.php">Manage repository access</a></li>
				<li><a href="create-repository.php">Create a new repository</a></li>
				<li><a href="modify-post-commit.php">Modify the post-commit hook</a></li>
				<li><a href="README.markdown">See the README</a></li>
			</ul>			
		</div>
		<div id="footer">
			<a href="http://www.github.com/ZeissS/svnmin/">Svnmin</a>
		</div>
	</body>
</html>