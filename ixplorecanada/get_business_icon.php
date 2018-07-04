<?php
  $imagesDir = 'images/business_icon/';
  if ($handle = opendir($imagesDir )) {
    if(false !== ($file = readdir($handle))) {
        echo $file;
    }
    closedir($handle);
}
?>