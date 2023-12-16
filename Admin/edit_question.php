<?php  require("header.php");?>

<?php

    $question=$_REQUEST['ref_no']; 

    $statement=$con->prepare("SELECT * FROM question_table WHERE question_id=?");  
    $statement->execute(array($question));
    $result=$statement->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){
        $question_name=$_POST['question'];

        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];

        $ans=$_POST['ans'];
        
        $o1=$_POST['o1'];
        $o2=$_POST['o2'];
        $o3=$_POST['o3'];
        $o4=$_POST['o4'];

        $option=[$option1,$option2,$option3,$option4];

        $statement=$con->prepare("UPDATE question_table SET question_name=? WHERE question_id=?");  
        $statement->execute(array($question_name,$question));

        $statement=$con->prepare("SELECT * FROM option_table WHERE question_id =? ORDER BY option_id");  
        $statement->execute(array($question));
        $result1=$statement->fetchAll(PDO::FETCH_ASSOC);
        $i=0;

        foreach($result1 as $row1){
            $statement=$con->prepare("UPDATE option_table SET option_name=? WHERE question_id=? AND option_id=?");  
            $statement->execute(array($option[$i++],$question,$row1['option_id']));
    
        }

        if($ans==$o1){
            $statement=$con->prepare("SELECT * FROM option_table WHERE option_name LIKE ? ");  
            $statement->execute(array($option1));
            $result1=$statement->fetch(PDO::FETCH_ASSOC);

        }else{
            if($ans==$o2){
                $statement=$con->prepare("SELECT * FROM option_table WHERE option_name LIKE ? ");  
                $statement->execute(array($option2));
                $result1=$statement->fetch(PDO::FETCH_ASSOC);
    
            }else{
                if($ans==$o3){
                    $statement=$con->prepare("SELECT * FROM option_table WHERE option_name LIKE ? ");  
                    $statement->execute(array($option3));
                    $result1=$statement->fetch(PDO::FETCH_ASSOC);
        
                }else{
                    $statement=$con->prepare("SELECT * FROM option_table WHERE option_name LIKE ? ");  
                    $statement->execute(array($option4));
                    $result1=$statement->fetch(PDO::FETCH_ASSOC);
                }
            }
        }

        $statement=$con->prepare("UPDATE question_table SET question_answer=? WHERE question_id=?");  
        $statement->execute(array($result1['option_id'],$result['question_id']));

        $echo ="<script>alert('Question has been updateded . . . . ')</script>";

        echo $echo;

    }
?>

    <div class="container-fluid">

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Edit Question</h1>     
            <a href="questions.php"><button type="button" class="btn btn-success mr-4 ">Go Back</button></a>                            
        </div> 

    </div>

    <div class="container rounded bg-dark mx-5 my-3 text-center" style="width:91%;padding-right:50px;">
            <form method="POST"  action="edit_question.php?ref_no=<?php  echo $question; ?>">
                    
                <div class="px-5 py-5 mx-5 my-5">

                    <div class="input-group input-group-lg my-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Question</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $result['question_name'];?>" aria-label="Large" name="question" aria-describedby="inputGroup-sizing-sm" required>
                    </div>

                    <?php 

                            $statement=$con->prepare("SELECT * FROM option_table WHERE question_id=?");  
                            $statement->execute(array($question));
                            $result1=$statement->fetchAll(PDO::FETCH_ASSOC);
                            
                            $a=['Option 1','Option 2','Option 3','Option 4'];
                            $b=['option1','option2','option3','option4'];
                            $c=['o1','o2','o3','o4'];
                            $i=0;
                    
                            foreach($result1 as $row){
                    ?>

                        <div class="input-group input-group-lg my-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $a[$i]; ?></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $row['option_name']; ?>" aria-label="Large" name="<?php echo $b[$i]; ?>" aria-describedby="inputGroup-sizing-sm" required>
                            <input type="text" name="<?php echo $c[$i++] ?>" value="<?php echo $i; ?>" hidden>

                        </div>
                    <?php } ?>

                    <div class="form-check form-check-inline" >
                        <span style="color:yellow;margin-right:10px;"> Correct Option : </span>  
                        <input class="form-check-input" type="radio" id="inlineCheckbox1" name="ans" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Option 1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox2" value="2" name="ans">
                        <label class="form-check-label" for="inlineCheckbox2">Option 2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox3" value="3" name="ans">
                        <label class="form-check-label" for="inlineCheckbox3">Option 3 </label>
                    </div>   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineCheckbox3" value="4" name="ans">
                        <label class="form-check-label" for="inlineCheckbox3">Option 4</label>
                    </div>   
                    
                    <br>
                    


                    <input type="submit" value="Submit" name="submit" class="btn btn-success mb-3 mt-3">

                </div>

            </form>
    </div>

<?php require("footer.php") ?>