<?php
  require_once("Database/connection.php");
  connect_db();
  $error_message='';
  $success_message='';
  session_start(); 

  if(isset($_POST['form'])) {
        
      if(empty($_POST['email']) || empty($_POST['cpassword']) || empty($_POST['name']) || empty($_POST['npassword']) || empty($_POST['gender']) || empty($_POST['number'])) {
          $error_message = 'Feilds can not be empty<br>';
      } else {
    
        $email = strip_tags($_POST['email']);
        $cpassword = strip_tags($_POST['cpassword']);
        $npassword = strip_tags($_POST['npassword']);
        $name = strip_tags($_POST['name']);
        $gender=$_POST['gender'];
        $no=$_POST['number'];
        
      
        $statement = $con->prepare("SELECT * FROM  user_table WHERE user_email=?");
        $statement->execute(array($email));
        $total = $statement->rowCount();    
          $result = $statement->fetch(PDO::FETCH_ASSOC);    
          if($total==0) {
            if($cpassword==$npassword){
              $statement1=$con->prepare("INSERT INTO user_table(user_name,user_email,user_gender,user_mobile,user_password) VALUES(?,?,?,?,?)");
              $statement1->execute(array($name,$email,$gender,$no,md5($npassword)));
              $success_message='Account has been created . . .';
            }else{
              $error_message="Password does not matches . . .";
            }



          } else {       

            $error_message .= 'Email Address already exisits . . .<br>';
                
              // $row_password = $result['user_password'];
          
              // if( $row_password != md5($password) ) {
              //     $error_message .= 'Password does not match<br>';
              // } else {       
              
              //   $_SESSION['user'] = $result;

              //     header("location: dashboard.php");

              // }
            }
        }
    }

?>


<html>

<head>
  <link rel="stylesheet" href="login_css.css">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
  <title>Log in</title>
</head>

<body>
  <div class="smain">
    <?php
        if($success_message!=''){
          ?>
          <p style="color:green;margin-left:5%;margin-top:20%;"><?php echo $success_message; ?> <a href="login.php">Click Here</a> to login in</p>
        <?php
        }
    ?>
    
    <p class="sign" align="center">Create an Account</p>
    <form class="form1" action="signin.php" method="POST">
      <input class="un" name="name" type="text" align="center" placeholder="Username">
      <input class="un" name="email" type="text" align="center" placeholder="Email-ID">
      <select class="un" name="gender">
        <option value="M">Male</option>
        <option value="F">Female</option>
        <otpion value="O">Others</option>
      </select>
      <input class="un" name="number" type="text" align="center" placeholder="Mobile No">
      <input class="pass" type="password" name="npassword" align="center" placeholder="New Password">
      <input class="pass" type="password" name="cpassword" align="center" placeholder="Confirm Password">
      <input type="submit" class="submit" name="form" align="center" value="Submit">
      <a href="sigin.php"><b><p style="color:green;margin-left:30%;">Do you have an account . . .</p></b></a> 
      <p style="color:red;margin-left:30%;"><?php  if( (isset($error_message)) && ($error_message!='') ) echo $error_message;?></p>
            
                
    </div>
     
</body>

</html>