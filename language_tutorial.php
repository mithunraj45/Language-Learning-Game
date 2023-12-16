<?php 

    require('header.php');
    $lang_id=$_REQUEST['refernce_no'];

    $statement = $con->prepare("SELECT * FROM  lang_table WHERE lang_id=?");
    $statement->execute(array($lang_id));
    $total = $statement->rowCount();    
      $result = $statement->fetch(PDO::FETCH_ASSOC);    
      if($total==0) {
          header('location:login.php');
      } 

      $link=strip_tags($result['lang_links']);
?>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center  mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Languages / <?php echo $result['lang_name']; ?></h1>
            <a href="language.php?refernce_no=<?php echo $lang_id; ?>" class="ml-5 float-right  btn btn-success shadow-sm">Go Back</a>
            <a href="quiz.php?reference_no=<?php echo $lang_id; ?>" class="float-right ml-5 btn btn-primary shadow-sm mr-1">Start Quiz</a>   
                                   
        </div>

        <div class="row">
                <iframe class="rounded border-0 ml-4" width="95%" height="315" src="<?php echo $result['lang_links']; ?>"></iframe>
        </div>

        <br>

        <div class="row">

            <div class="col-lg-6">

                <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <?php echo $result['lang_instructions']; ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Training Data <h6>   
                    </div>
                    <div class="card-body">
                        <?php echo $result['lang_training_data']; ?>
                    </div>
                </div>
            </div>

    </div>
    
    </div>




<?php 

    require('footer.php');

?>