<?php  require("header.php"); ?>

<?php 

if(isset($_POST['submit'])){
    $name=$_POST['level_name'];
    $limit=$_POST['level_limit'];
    $time=$_POST['level_time'];




    $statement=$con->prepare("INSERT INTO level_table(level_name,level_limit_question,level_time)VALUES(?,?,?) ");
    $statement->execute(array($name,$limit,$time));

    $echo ="<script>alert('Level has been added . . . . ')</script>";

    echo $echo;
}

?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Level</h1>   
            <a href="language.php" class="ml-5 float-right  btn btn-success shadow-sm">Go Back</a>                             
        </div> 

    </div>

    <div class="container mx-5 my-5 rounded text-center bg-dark"  >
        <div class="float-left rounded bg-dark px-3 py-3" >
            <form method="POST" action="add_level.php">
                
                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="level_name" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Limit</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="level_limit" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Time in seconds</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="level_time" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <input type="submit" name="submit" class="btn btn-success" value="Submit">
            
            </form>
        
        </div>
    </div>

<?php require("footer.php"); ?>