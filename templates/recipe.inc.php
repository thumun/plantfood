<?php

$id =

$file = $_FILES['file'];

if (empty($title) || empty($desc) || empty($instruct) || empty($file)) {
  header("Location: ../addrecipe.php?error=emptyfields&title=".$title."&desc=".$desc."&instruct=".$instruct);
  exit();
} else {

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('png');


  if (in_array($fileActualExt, $allowed)) {

    if ($fileError === 0) {

      if ($fileSize < 1000000) {

        $fileNameNew = "img".$id.".".$fileActualExt;
        $fileDestination = '../assets/images/'.$fileNameNew;

         move_uploaded_file($fileTmpName, $fileDestination);

      } else {
        header("Location: ../addrecipe.php?error=toolarge");
        exit();
      }
    } else {
      header("Location: ../addrecipe.php?error=file_error");
      exit();
    }
  } else {
    header("Location: ../addrecipe.php?error=badext");
    exit();
  }


}



$dispid = "<?php
$idn = '$id';
?> ";

$disp_main = file_get_contents('templates/recipe.temp.php');

$disp_path = "recipes/recipe$id.php";

file_put_contents($disp_path, $dispid);
file_put_contents($disp_path, $disp_main, FILE_APPEND);
