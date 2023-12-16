<?php  require("header.php"); ?>


<?php 

    if(isset($_POST['submit'])){
        $lang=$_POST['lang'];

        $statement=$con->prepare("DELETE  FROM lang_table WHERE lang_id=? ");
        $statement->execute(array($lang));
        
    }

    if(isset($_POST['submit_level'])){
        $level=$_POST['level'];

        $statement=$con->prepare("DELETE  FROM level_table WHERE level_id=? ");
        $statement->execute(array($level));
        
    }


?>

    <div class="container-fluid">

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Languages</h1>   
            <a href="add_language.php"><button type="button" class="btn btn-primary mr-4 ">Insert new Language</button></a>                             
        </div> 

    </div>

    <div class="container rounded text-center  bg-dark mx-5 my-3 " style="width:91%;padding-right:50px;">                                
        <div class="bg-dark px-3 py-3">
            <table class="table table-dark table-bordered table-hover">
                <thead class="bg-success">
                    <th>Sl No:</th>
                    <th>Language</th>
                    <th width="250px">Action</th>
                </thead>

                <tbody>
                    <?php 
                            $i=0;
                            $statement=$con->prepare("SELECT * FROM lang_table ");
                            $statement->execute();
                            $total=$statement->rowCount();
                            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row){
                                $i++;
                    ?>
                        <tr>
                            <td><?php echo $i;; ?></td>
                            <td><?php echo $row['lang_name']; ?></td>
                            <td>
                                <form method="POST" action="language.php">
                                    <a href="edit_language.php?ref_no=<?php echo $row['lang_id']; ?>"><button type="button" class="btn btn-success mr-3">Edit</button></a>
                                    <input type="text" name="lang" value="<?php echo $row['lang_id']; ?>" hidden>
                                    <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                                </form>                        
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>

            </table>
        </div>                             
    </div>

    <div class="container-fluid">
    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Levels</h1>   
            <a href="add_level.php"><button type="button" class="btn btn-primary mr-4 ">Insert new Level</button></a>                             
        </div> 
    </div>

    <div class="container rounded text-center  bg-dark mx-5 my-3 " style="width:91%;padding-right:50px;">                                
        <div class="bg-dark px-3 py-3">
            <table class="table table-dark table-bordered table-hover">
                <thead class="bg-success">
                    <th>Sl No:</th>
                    <th>Level</th>
                    <th width="250px">Action</th>
                </thead>

                <tbody>
                    <?php 
                            $i=0;
                            $statement=$con->prepare("SELECT * FROM level_table ");
                            $statement->execute();
                            $total=$statement->rowCount();
                            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row){
                                $i++;
                    ?>
                        <tr>
                            <td><?php echo $i;; ?></td>
                            <td><?php echo $row['level_name']; ?></td>
                            <td>
                                <form method="POST" action="language.php">
                                    <a href="edit_level.php?ref_no=<?php echo $row['level_id']; ?>"><button type="button" class="btn btn-success mr-3">Edit</button></a>
                                    <input type="text" name="level" value="<?php echo $row['level_id']; ?>" hidden>
                                    <input type="submit" name="submit_level" class="btn btn-danger" value="Delete">
                                </form>                        
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>

            </table>
        </div>                             
    </div>

<?php require("footer.php"); ?>