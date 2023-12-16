<?php 
require('header.php');



$ans = $_POST['cans'];
$lang = $_POST['clang'];
$level = $_POST['clevel'];


$statement=$con->prepare("SELECT * FROM level_table WHERE level_id=?");
$statement->execute(array($level));
$result = $statement->fetch(PDO::FETCH_ASSOC); 

// print_r($result);


if($ans>=((60/100 )*$result['level_limit_question'])){

    // Prepare and execute SQL query to insert results into the database
    $stmt = $con->prepare("INSERT INTO quiz_table (user_id, lang_id,level_id,marks_got) VALUES (?,?,?,?)");
    $stmt->execute(array($user['user_id'],$lang,$level,$ans));

    if($level==1){
        $stmt1 = $con->prepare("INSERT INTO user_level (lang_id,level_id,user_id) VALUES (?,?,?)");
        $stmt1->execute(array($lang,$level,$user['user_id']));
    }else{
        $stmt1=$con->prepare("UPDATE user_level SET level_id=? WHERE lang_id=? AND user_id=? ");
        $stmt1->execute(array($level,$lang,$user['user_id']));  
    }

    
}



if ($stmt->execute()) {
    header("location:result.php");
}


?>