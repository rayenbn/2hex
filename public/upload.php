<?php
  $imageFolder = "uploads/posts/";

  reset ($_FILES);
  $temp = current($_FILES);

  if (is_uploaded_file($temp['tmp_name'])){

    // Sanitize input
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        header("HTTP/1.1 400 Invalid file name.");
        return;
    }

    // Verify extension
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png", "jpeg"))) {
        header("HTTP/1.1 400 Invalid extension.");
        return;
    }
    
    // Accept upload if there was no origin, or if it is an accepted origin
    //$name = hash('sha256', $temp['name'] . strval(time()));

    $name = $temp['name'];

    $mimeType = 'image/jpg';
    switch ($temp['type']) { 
      case "image/gif": 
          $mimeType = '.gif';
          break; 
      case "image/jpeg": 
          $mimeType = '.jpeg';
          break; 
      case "image/png": 
          $mimeType = '.png';
          break; 
      case "image/jpg": 
          $mimeType = '.jpg';
          break;
      }

    $filetowrite = $imageFolder . $name;

    // Create folder if dont exists
    if (!file_exists($imageFolder)) {
        mkdir($imageFolder, 0755, true);
    }

    move_uploaded_file($temp['tmp_name'], $filetowrite);

    // Respond to the successful upload with JSON.
    // Use a location key to specify the path to the saved image resource.
    // { location : '/your/uploaded/image/file'}
    echo json_encode(array('location' => '/' . $filetowrite));
  } else {
    // Notify editor that the upload failed
    header("HTTP/1.1 500 Server Error");
  }
?>