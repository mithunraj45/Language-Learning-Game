<?php

    require('header.php');

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Languages</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                                
                    </div>

                                 <div class="album py-3 bg-light">
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
                                                        <a href="language_tutorial.php?refernce_no=<?php echo $row['lang_id']; ?>"><button type="button" class="btn btn-xl btn-outline-primary">Learn Now</button></a>
                                                        </div>
                                                        <small class="text-muted">9 mins</small>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>

                                            <?php }?>

                                        </div>
                                    </div>
                                </div>

                    

                </div>
                <!-- /.container-fluid -->

            </div>


<?php 

    require('footer.php');

?>