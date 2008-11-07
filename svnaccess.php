<?php
  require 'config.php';

  if ( isset ( $_POST['content'])) {
    file_put_contents(ACCESS_CONFIG, $_POST['content']);    
    echo "Saved.";
  } 
  $content = join("", file(ACCESS_CONFIG));
?>
<form method="POST">
 <textarea name="content" rows="30" cols="100"><?php echo $content; ?></textarea>
 <input type="submit" />

</form>
