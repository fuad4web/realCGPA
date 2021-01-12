<?php
  require_once('createDBase.php');
  session_start();

  if(isset($_POST['signup'])) {
    if(empty($_POST['username']) || empty($_POST['instname']) || empty($_POST['deptname']) || empty($_POST['email']) || empty($_POST['password'])) {
      header("location: ../gpa.php?empty");
      exit();
    } else {
      $user = mysqli_real_escape_string($conn,$_POST['username']);
      $inst = mysqli_real_escape_string($conn,$_POST['instname']);
      $dept = mysqli_real_escape_string($conn,$_POST['deptname']);
      $mail = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);

      if(!preg_match("/^[a-zA-Z]*$/",$user) || !preg_match("/^[a-zA-Z]*$/",$inst) || !preg_match("/^[a-zA-Z]*$/",$dept) || $user === $password) {
        header("location: ../gpa.php?invalid");
        exit();
      } else {
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          header("location: ../gpa.php?invalidemail");
          exit();
        } else {
          // we check whether the username input is equal to the one in database
          $query = " select * from signupg where user_name='".$user."'";
          $result = mysqli_query($conn,$query);
          if(mysqli_fetch_assoc($result)) {
            header("location: ../gpa.php?usertaken");
            exit();
          } else {
            $query = " select * from signupg where mail_name='".$mail."'";
            $result = mysqli_query($conn,$query);
            if(mysqli_fetch_assoc($result)) {
              header("location: ../gpa.php?emailtaken");
              exit();
            } else {
              $hash = password_hash($password, PASSWORD_DEFAULT);
              $query = " insert into signupg (user_name,inst_name,dept_name,mail_name,pass_word) values ('$user', '$inst', '$dept', '$mail', '$hash')";
              $result = mysqli_query($conn,$query);
              header("location: ../qjfknjcfbkjs.php?signupsuccessful");
              exit();
            }
          }
        }
      }
    }
  } else {
    header("location: ../gpa.php?unknownlink");
    exit();
  }