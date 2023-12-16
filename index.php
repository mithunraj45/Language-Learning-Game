<?php 

require_once("Database/connection.php");
connect_db();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>LearnToSpeak</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About Me</h4>
              <p class="text-muted d-flex justify-content-center">Hi This is Mithun, <br> Cureently studying B.Tech in Computer Science and Engineering at UVCE.Extremly motivated to constantly develop my skills and grow professionally. I am confident in my ability
to come up with interesting ideas for unforgettable marketing campaigns.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="https://www.linkedin.com/in/mithun-raj-71b1a9202/" class="text-white">LinkedIn</a></li>
                <li><a href="https://github.com/mithunraj45?tab=repositories" class="text-white">GitHub</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            
            <strong>LearnToSpeak</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Learn To Speak</h1>
          <p class="lead">In the dynamic landscape of education and technology, language learning has taken on a new dimension with the advent of language learning games. These games bring an element of playfulness into the process of acquiring a new language.</p>
          <p>
            <a href="login.php" class="btn btn-primary my-2">Login</a>
            <a href="signin.php" class="btn btn-secondary my-2">SignIn</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

          <?php 

              $statement = $con->prepare("SELECT * FROM  lang_table");
              $statement->execute();
              $total = $statement->rowCount();    
              $result = $statement->fetchAll(PDO::FETCH_ASSOC);
              
              foreach($result as $row){
          
          ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top pl-5 pt-5" src="Images/<?php echo $row['lang_image']; ?>" height="150px" style="align:center;width: 250px;" >
                  <div class="card-body">
                    <p align="justify" class="card-text"> <?php echo $row['lang_info']; ?> </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="login.php"><button type="button" class="btn btn-xl btn-outline-primary">Learn Now</button></a>
                      </div>
                      <small class="text-muted"><?php echo $row['lang_duration']; ?></small>
                    </div>
                  </div>
                </div>
              </div>
          
          <?php }?>

          </div>
        </div>
      </div>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>
  </body>
</html>
