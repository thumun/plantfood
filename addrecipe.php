<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Recipe</title>
    <link rel="stylesheet" href="assets/addrecipecss.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Plantfood</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact-us.html">Recipes</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Add recipe</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Log in / Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Add a Recipe</h2>
                </div>
          <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($url, "error=emptyfields" == true)){
                echo "<p class='error'>Fill in all fields!</p>";
                exit();
            }
            elseif (strpos($url, "error=toolarge" == true)){
                echo "<p class='error'>Image file is too large!</p>";
                exit();
            }
            elseif (strpos($url, "error=file_error" == true)){
                echo "<p class='error'>Unknown file error!</p>";
                exit();
            }
            elseif (strpos($url, "error=toolarge" == true)){
                echo "<p class='error'>Image extension not supported!</p>";
                exit();
            }
          ?>
                <form>
                    <label>Image</label><div class="form-group"><input class="form-control2" type="file" name="file"></div>
                    <div class="form-group"><label>Title</label><input class="form-control" type="text" name="title"></div>
                    <div class="form-group"><label>Ingredients (separate with a comma)</label><input class="form-control" type="text" name="ingred"></div>
                    <div class="form-group"><label>Directions</label><textarea class="form-control" name="direct"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2021 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
