<?php  require("header.php"); ?>


<?php 

$query=" ";

if(isset($_POST['submit'])){
    $question=$_POST['question'];

    
    $statement=$con->prepare("DELETE  FROM option_table WHERE question_id=? ");
    $statement->execute(array($question));

    $statement=$con->prepare("DELETE  FROM question_table WHERE question_id=? ");
    $statement->execute(array($question));

}

if(isset($_POST['language'])){
    if(isset($_POST['level'])){
        $lang=$_POST['language'];
        $level=$_POST['level'];

        $query="SELECT * FROM question_table WHERE question_lang=$lang AND question_level=$level";
    }

}

?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Questions</h1>  
            <a href="add_question.php"><button type="button" class="btn btn-primary mr-4 ">Add New Question</button></a>                                                           
        </div> 

    </div>

    <div class="container rounded bg-dark mx-5 my-3 " style="width:91%;padding-right:50px;">
            <form method="POST" action="questions.php">
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
            </form>
            
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <div id="question-container" class="row"></div>
                        <div id="options-container" class="options row"></div>
                        <div class="row">
                                <?php 
                                if($query!=" "){
                                     $statement=$con->prepare($query);  
                                     $statement->execute();
                                     $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                     foreach($result as $row){
                                ?>
                                <div class="col-md-4 rounded bg-white mx-3 my-3">

                                    <p class="text-center mt-3"> <?php echo $row['question_name']; ?> </p> <br>
                                    <?php 
                                        $a=['a','b','c','d'];
                                        $i=0;
                                        $statement1=$con->prepare("SELECT * FROM option_table WHERE question_id=? ");  
                                        $statement1->execute(array($row['question_id']));
                                        $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result1 as $row1){
                                    
                                            $statement2=$con->prepare("SELECT * FROM question_table as q JOIN option_table as o ON q.question_id=o.question_id AND q.question_answer=o.option_id WHERE question_lang=? AND question_level=? AND q.question_id=?");  
                                            $statement2->execute(array($lang,$level,$row1['question_id']));
                                            $result2=$statement2->fetch(PDO::FETCH_ASSOC);
                                    ?>

                                        
                                    
                                    <p class="ml-3">
                                        <?php echo $a[$i++] .") ".$row1['option_name']; ?>
                                        
                                        <br>
                                    </p>
                                    <?php  } ?>

                                    <p class="text-center"><span class="text-warning">Correct Answer</span> is <?php echo $result2['option_name']; ?> </p>

                                    <form method="POST" action="questions.php" >
                                        <a href="edit_question.php?ref_no=<?php echo $result2['question_id']; ?>"><button type="button" class="btn btn-success mx-3 my-3">Edit</button></a>
                                        <input type="text" name="question" value="<?php echo $row['question_id']; ?>" hidden>
                                        <input type="submit" name="submit" class="btn btn-danger" value="Delete">
                                    </form> 

                                </div>
                            <?php } }?>
                        </div>
                    </tr>
                </tbody>

            </table>
    </div>

<?php require("footer.php") ?>