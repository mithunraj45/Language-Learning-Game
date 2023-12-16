<?php
    require('header.php');


    $statement=$con->prepare("SELECT * FROM user_level WHERE user_id=? ");
    $statement->execute(array($user['user_id']));
    $total=$statement->rowCount();


    if(isset($_POST['submit'])){
        $langs=$_POST['lang'];

        $statement=$con->prepare("DELETE FROM quiz_table WHERE user_id=? AND lang_id=?");
        $statement->execute(array($user['user_id'],$langs));
        
        $statement=$con->prepare("DELETE FROM user_level WHERE user_id=? AND lang_id=?");
        $statement->execute(array($user['user_id'],$langs));

    }

    $lang="";
    $limit=0;    



?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Dashboard</h1>                                
                    </div> 

                </div>
                <!-- /.container-fluid -->

                <div class="container text-center  bg-dark mx-5 my-3 " style="width:91%;padding-right:50px;">
                                <div class="image d-block">
                                    <img class="rounded-circle px-3 py-3 " src="Images/image.png"> 
                                </div>  
                                <?php
                                    if($total!=0){
                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
                                
                                        foreach($result as $row){
                                            $statement1=$con->prepare("SELECT * FROM lang_table WHERE lang_id=?");
                                            $statement1->execute(array($row['lang_id']));
                                            $result1 = $statement1->fetch(PDO::FETCH_ASSOC); 
                                    
                                            $lang=$result1['lang_name'];
                                            $limit=$row['level_id'];
                                        
                                
                                ?>
                                    <span style="color:white;">
                                        <?php echo $lang.":"; ?>
                                        <?php for($i=0;$i<$limit;$i++){ ?>
                                            <i class="fas fa-star" style="color:yellow;"></i>
                                        <?php } ?>
                                    </span>   <br>
                                
                                <?php } } ?>
                                
                                <div class="bg-dark px-3 py-3">
                                    <table class="table table-dark table-bordered table-hover">
                                        <tr>
                                            <td>Name:</td>
                                            <td><?php echo $user['user_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo ($user['user_gender']=="M")?"Male":"Female"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile No:</td>
                                            <td><?php echo $user['user_mobile']; ?></td>
                                        </tr>

                                    </table>
                                </div>                             
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4 mr-5">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-5 mt-2">Performance</h1>                                
                </div> 

                <?php 

                $statement=$con->prepare("SELECT * FROM user_level WHERE user_id=? ");  
                $statement->execute(array($user['user_id']));
                $total=$statement->rowCount();
                
                if($total!=0){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
                ?>
                
                <div class="row">
                        
                        <?php        
                            foreach($result as $row){
                                $statement1=$con->prepare("SELECT * FROM lang_table WHERE lang_id=?");
                                $statement1->execute(array($row['lang_id']));
                                $result1 = $statement1->fetch(PDO::FETCH_ASSOC); 
                        
                                $lang=$result1['lang_name'];
                                $limit=$row['level_id'];

                        ?>
                        
                            <div class="col-lg-3 ml-5  ">
                                <div class="card shadow mb-4">
                                    <div class="card-header text-center py-2">
                                        <form class="form" action="dashboard.php" method="POST">
                                            <span>
                                                <h6 class="m-0 font-weight-bold float-left pt-3 text-primary"><?php echo $lang; ?><h6>
                                                <input type="text" value="<?php echo $result1['lang_id']; ?>" name="lang" hidden>   
                                                <input type="submit"  name="submit" class="btn text-white bg-danger ml-5" value="DELETE">
                                            </span>            
                                        </form>    
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Levels</th>
                                                <th>Accuracy</th>
                                            </tr>

                                            <?php 

                                                $statement2=$con->prepare("SELECT * FROM quiz_table as q join level_table as o  WHERE q.user_id=? and q.lang_id=? and q.level_id=o.level_id ");
                                                $statement2->execute(array($user['user_id'],$row['lang_id']));
                                                $result2 = $statement2->fetchALL(PDO::FETCH_ASSOC);
                                                foreach($result2 as $row2){
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $row2['level_name']; ?></td>
                                                <td><?php echo number_format($row2['marks_got']/$row2['level_limit_question']*100,2); ?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <?php }}?>
                </div>
            </div>
            <!-- End of Main Content -->

 <?php 
    require('footer.php');
 ?>