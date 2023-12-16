<?php  require("header.php"); ?>


<?php

    if(isset($_POST['submit'])){
        $name=$_POST['lang_name'];
        $info=$_POST['lang_info'];
        $instruction=$_POST['lang_instructions'];
        $link=$_POST['lang_link'];
        $data=$_POST['lang_data'];
        $duration=$_POST['lang_duration'];




        $statement=$con->prepare("INSERT INTO lang_table(lang_name,lang_info,lang_instructions,lang_links,lang_training_data,lang_duration)VALUES(?,?,?,?,?,?) ");
        $statement->execute(array($name,$info,$instruction,$link,$data,$duration));

        $echo ="<script>alert('Language has been added . . . . ')</script>";

        echo $echo;
    }

?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">ADD Language</h1>   
            <a href="language.php" class="ml-5 float-right  btn btn-success shadow-sm">Go Back</a>
                             
    </div> 

    </div>

    <div class="container mx-5 my-5 rounded text-center bg-dark"  >
        <div class="float-left rounded bg-dark px-3 py-3" >
            <form method="POST" action="add_language.php">
                
                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="lang_name" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Information</span>
                    </div>
                    <textarea class="form-control" aria-label="Large" name="lang_info" aria-describedby="inputGroup-sizing-sm" required></textarea>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Instructions</span>
                    </div>
                    <textarea class="form-control" aria-label="Large" name="lang_instructions" aria-describedby="inputGroup-sizing-sm" required></textarea>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Link</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="lang_link" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Training Data</span>
                    </div>
                    <textarea class="form-control" aria-label="Large" name="lang_data" aria-describedby="inputGroup-sizing-sm" required></textarea>
                </div>

                <div class="input-group input-group-lg my-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Duration</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="lang_duration" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <input type="submit" name="submit" class="btn btn-success" value="Submit">
            
            </form>
        
        </div>
    </div>

<?php require("footer.php") ?>