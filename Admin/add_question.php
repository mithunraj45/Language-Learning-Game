<?php  require("header.php") ?>


<?php 

    if(isset($_POST['submit'])){
        $lang=$_POST['language'];
        $level=$_POST['level'];
        $question=$_POST['question'];

        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];

        $ans=$_POST['ans'];
        
        $o1=$_POST['o1'];
        $o2=$_POST['o2'];
        $o3=$_POST['o3'];
        $o4=$_POST['o4'];
        
        $statement=$con->prepare("INSERT INTO question_table (question_name,question_level,question_lang) VALUES(?,?,?)");  
        $statement->execute(array($question,$level,$lang));

        $statement=$con->prepare("SELECT * FROM question_table WHERE question_name LIKE ? ");  
        $statement->execute(array($question));
        $result=$statement->fetch(PDO::FETCH_ASSOC);

        $statement=$con->prepare("INSERT INTO option_table (option_name,question_id) VALUES(?,?),(?,?),(?,?),(?,?)");  
        $statement->execute(array($option1,$result['question_id'],$option2,$result['question_id'],$option3,$result['question_id'],$option4,$result['question_id']));
        

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

        $echo ="<script>alert('Question has been added . . . . ')</script>";

        echo $echo;
        
    }


?>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Add Question</h1>    
            <a href="questions.php"><button type="button" class="btn btn-success mr-4 ">Go Back</button></a>                                                        
        </div> 
    </div>

    <div class="container rounded bg-dark mx-5 my-3 text-center" style="width:91%;padding-right:50px;">
            <form method="POST" action="add_question.php">
                <select name="language" class="btn bg-white mx-3 my-3" required>
                    <option>Select any language</option>
                    <?php 
                        $statement=$con->prepare("SELECT * FROM lang_table");  
                        $statement->execute();
                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $row){
                    ?>
                        <option value="<?php echo $row['lang_id']; ?>"><?php echo $row['lang_name']; ?></option>
                    <?php } ?>
                </select>

                <select name="level" class="btn bg-white mx-3 my-3" onchange="this.form.submit()" required>
                    <option>Select any Level</option>
                    <?php 
                        $statement=$con->prepare("SELECT * FROM level_table");  
                        $statement->execute();
                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $row){
                    ?>
                        <option value="<?php echo $row['level_id']; ?>"><?php echo $row['level_name']; ?></option>
                    <?php } ?>
                </select>

                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Question</span>
                    </div>
                    <textarea type="text" class="form-control" aria-label="Large" name="question" aria-describedby="inputGroup-sizing-sm" required></textarea>
                </div>

                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Option 1</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="option1" aria-describedby="inputGroup-sizing-sm" required>
                    <input type="text" name="o1" value="1" hidden>
                </div>

                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Option 2</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="option2" aria-describedby="inputGroup-sizing-sm" required>
                    <input type="text" name="o2" value="2" hidden>
                </div>

                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Option 3</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="option3" aria-describedby="inputGroup-sizing-sm" required>
                    <input type="text" name="o3" value="3" hidden>
                </div>

                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Option 4</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Large" name="option4" aria-describedby="inputGroup-sizing-sm" required>
                    <input type="text" name="o4" value="4" hidden>
                </div>

                
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

            </form>
    </div>


<?php require("footer.php") ?>