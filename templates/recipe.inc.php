<script type="text/javascript">
  function returnArray(string) {
    if(string === ""){
      return null
    } else {
      let newArray = string.split(",").map(item => item.trim() )
      return newArray
    }
  }

  function addRecipe () {
    async function addingRecipe() {
      let response = await fetch(``, {
        method: 'POST',
        body: JSON.stringify({
          title: title,
          directions: directions,
          ingredients: returnArray(ingredients),
        }),
        headers: new Headers({
          'Content-Type': 'application/json',
          "Authorization": localStorage.getItem('token')
        })
      })
        
        response = await response.json()
              
        if(response.recipe){
          let recipeId = response.recipe.id
        } else {
          alert("There was an error with the server! Try again later.")
        }
      } 
      addingRecipe()
}
  
  
</script>


<?php

$id =

$file = $_FILES['file'];
$title = $_POST['title'];
$instruct = $_POST['ingred'];
$desc = $_POST['direct'];

if (empty($title) || empty($direct) || empty($ingred) || empty($file)) {
  header("Location: ../addrecipe.php?error=emptyfields);
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
        $fileDestination = '../assets/img/'.$fileNameNew;

         move_uploaded_file($fileTmpName, $fileDestination);
        
        $dispid = "<?php
        $idn = '$id';
        ?> ";

        $disp_main = file_get_contents('templates/recipe.temp.php');

        $disp_path = "../recipes/recipe$id.php";

        file_put_contents($disp_path, $dispid);
        file_put_contents($disp_path, $disp_main, FILE_APPEND);


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



