<?php  require("header.php"); ?>

<?php 

    $statement=$con->prepare("SELECT COUNT(user_id) as total FROM user_table");
    $statement->execute();
    $result=$statement->fetch(PDO::FETCH_ASSOC);

    $statement=$con->prepare("SELECT COUNT(lang_id) as total FROM lang_table");
    $statement->execute();
    $result1=$statement->fetch(PDO::FETCH_ASSOC);

    $statement=$con->prepare("SELECT COUNT(admin_id) as total FROM admin_table");
    $statement->execute();
    $result2=$statement->fetch(PDO::FETCH_ASSOC);

?>

    <div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Dashboard</h1>                                
        </div> 
    </div>

        <div class="row" style="width:91%;">

            <div class="col-md-4">
                <div class="card bg-primary mx-5 text-white font-weight-bold my-3 box-shadow">
                  <div class="card-body">
                    <p align="justify" class="card-text">Users Count : <?php  echo $result['total']; ?> </p>
                  </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card bg-warning mx-5 text-white font-weight-bold my-3 box-shadow">
                  <div class="card-body">
                    <p align="justify" class="card-text">Languages : <?php  echo $result1['total']; ?> </p>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success mx-5 text-white font-weight-bold my-3 box-shadow">
                  <div class="card-body">
                    <p align="justify" class="card-text">Admin Count : <?php  echo $result2['total']; ?> </p>
                  </div>
                </div>
            </div>


        </div>

<?php require("footer.php") ?>