<?php 
    require('header.php');
    $lang_id=$_REQUEST['reference_no'];
    $id=$_REQUEST['temp_no'];

    $statement = $con->prepare("SELECT * FROM  lang_table WHERE lang_id=?");
    $statement->execute(array($lang_id));
    $total = $statement->rowCount();    
      $result = $statement->fetch(PDO::FETCH_ASSOC);    
      if($total==0) {
          header('location:login.php');
      } 
  
      $statement1 = $con->prepare("SELECT * FROM  quiz_table WHERE lang_id=? and user_id=? and level_id=? ");
      $statement1->execute(array($lang_id,$user['user_id'],$id));
      $total1=$statement1->rowCount();

      $stmt=$con->prepare("SELECT * FROM level_table WHERE level_id=?");
      $stmt->execute(array($id));
      $res=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Languages / <?php echo $result['lang_name']; ?> / QUIZ / <?php echo $res['level_name']; ?></h1>
        <a href="language_tutorial.php?refernce_no=<?php echo $lang_id; ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm">Back</a>                         
    </div>

</div>

<div class="container-fluid">
    <?php 
        if($total1==0 && $id!==5){
    ?>
    <div class="container ml-5 mt-5">
        <div class="row">
            <div class="rounded col-11 bg-dark px-4 py-4"  align="justify" style="color:white;height:200px;font-size:24px;">
                <div id="question-container " class="row"></div>
                     Dear <?php echo $user['user_name']; ?>, You have been successfully completed the quiz . After careful consideration, we regret to inform you that you have <span style="color:red;">not been cleared</span> to proceed to the next round.We appreciate the time and effort you invested in the application and assessment process.
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <a href="language_tutorial.php?refernce_no=<?php echo $lang_id; ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm">Go back to Training </a>
            </div>
            <div class="col-4">
                <a href="quiz.php?reference_no=<?php echo $lang_id; ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm">Start Last Quiz</a>
            </div>
        </div>
        
    </div>
    <br>

    <?php
        }else{
            if($total1!=0 && $id==5){

    ?>
        <div class="container ml-5 mt-5">
        <div class="row">
            <div class="rounded col-11 bg-dark px-4 py-4"  align="justify" style="color:white;height:200px;font-size:24px;">
                <div id="question-container " class="row"></div>
                     Dear <?php echo $user['user_name']; ?>, Congragulations you have completed <span style="color:yellow;">Training and Quiz with Excellent Performance</span> .Now you can learn any other language . . . .
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <a href="language.php" class="d-none d-sm-inline-block btn btn-success shadow-sm">Go back to Menu </a>
            </div>
        </div>
        
    </div>
    <?php       
        }else{  
    ?>

    <div class="container ml-5 mt-5">
        <div class="row">
            <div class="rounded col-11 bg-dark px-4 py-4"  align="justify" style="color:white;height:200px;font-size:24px;">
                <div id="question-container " class="row"></div>
                     Dear <?php echo $user['user_name']; ?>, Congragulations you have cleared this level and <span style="color:yellow;">earned a star</span> .Also can proceed to further round . . . .
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <a href="language_tutorial.php?reference_no=<?php echo $lang_id; ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm">Go back to Training </a>
            </div>
            <div class="col-4">
                <a href="quiz.php?reference_no=<?php echo $lang_id; ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm">Start Next Quiz</a>
            </div>
        </div>
        
    </div>

    <?php } }?>
</div>

<?php
    require('footer.php');
?>