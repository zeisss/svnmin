<?php
  require 'config.php';

  if ( isset ( $_POST['content'])) {
    file_put_contents(ACCESS_CONFIG, $_POST['content']);    
    echo "Saved.";
  } 
  $content = join("", file(ACCESS_CONFIG));
?>
<form method="POST">
 <textarea name="content" rows="30" cols="100"><?php echo $content; ?></textarea><br />
 <input type="submit" />
 
 <div>
 	<span class="tip">
 		You can define groups by creating a [groups] block with multiple &lt;groupname&gt; = &lt;name1, name2, ...&gt; lines. To include them, use @groupname.<br />
 	</span>
 </div>

</form>
