<?php
  require 'config.php';

  if (!defined('ACCESS_CONFIG'))
    die("No ACCESS_CONFIG file provided");
  if ( !file_exists(ACCESS_CONFIG)) 
    die(ACCESS_CONFIG . " does not exist.");

  if ( isset ( $_POST['content'])) {
    file_put_contents(ACCESS_CONFIG, $_POST['content']);    
    echo "Saved.";
  } 
  $content = join("", file(ACCESS_CONFIG));
?>
<? include 'layout/header.php'; ?>
<form method="POST">
 <textarea name="content" rows="30" cols="100"><?php echo $content; ?></textarea><br />
 <input type="submit" />
 
 <div>
 	<span class="tip">
 		You can define groups by creating a [groups] block with multiple &lt;groupname&gt; = &lt;name1, name2, ...&gt; lines. To include them, use @groupname. See <a href="http://svnbook.red-bean.com/nightly/en/svn.serverconfig.pathbasedauthz.html" target="_blank">svnbook.red-bean.com</a> for details about the usage.<br />
 	</span>
 </div>

</form>
<? include 'layout/footer.php'; ?>
