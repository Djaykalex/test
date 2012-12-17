<?php
require ('class.upload.php');

$handle = new upload($_FILES['image_field']);
  if ($handle->uploaded) {
      $handle->file_new_name_body   = 'image_resized';
      $handle->image_resize         = true;
      $handle->image_x              = 100;
      $handle->image_ratio_y        = true;
      $handle->process('webroot/files');
      if ($handle->processed) {
          echo 'image resized';
          $handle->clean();
      } else {
          echo 'error : ' . $handle->error;
      }
  }