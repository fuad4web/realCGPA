<?php
  session_start();
  require_once('createDBase.php');

    if(isset($_POST['login'])) {
      if(empty($_POST['username']) || empty($_POST['password'])) {
        header("location: ../gpa.php?empty");
        exit();
      } else {
        $userName = mysqli_real_escape_string($conn,$_POST['username']);
        $passWord = mysqli_real_escape_string($conn,$_POST['password']);

        $query = " select * from signupg where user_name='".$userName."' or mail_name='".$userName."'";
        $result = mysqli_query($conn,$query);
        if($row = mysqli_fetch_assoc($result)) {
          $hash = password_verify($passWord,$row['pass_word']);
          if($hash==false) {
            header("location: ../gpa.php?incorrectpassword");
            exit();
          } elseif ($hash==true) {
            //after loggin in this will take all the rows in a particular information that the person used
            $_SESSION['id']=$row['id'];
            $_SESSION['user']=$row['user_name'];
            $_SESSION['inst']=$row['inst_name'];
            $_SESSION['dept']=$row['dept_name'];
            $_SESSION['mail']=$row['mail_name'];
            $_SESSION['pass']=$row['pass_word'];

          header("location: ../qjfknjcfbkjs.php?loginsuccessful");
          exit();
          }
        } else {
          header("location: ../gpa.php?invaliduser");
          exit();
        }
      }
    } else {
      header("location: ../gpa.php?dontknow");
      exit();
    }