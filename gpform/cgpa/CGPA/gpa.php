<?php 
    session_start();
    include 'header/doctype.php';
?>
<div class="all-login">
   <div class="login-page">
     <div class="form">
      <!-- Registration Form-->
       <form class="register-form" action="database/signupgp.php" method="POST">
        <div class="header">
          <h2>Create Account</h2>
        </div>
         <div class="form-control">
             <input type="text" placeholder="Username" name="username" id="fullname" class="text-input correct">
             <small>Error Message</small>
         </div>
         <div class="form-control">
             <input type="text" placeholder="Name of Institution" name="instname" id="username" class="text-input">
             <small>Error Message</small>
         </div>
         <div class="form-control">
             <input type="text" placeholder="Name of Department" name="deptname" id="dept" class="text-input">
             <small>Error Message</small>
         </div>
         <div class="form-control">
          <input type="text" placeholder="E-mail" id="email" name="email" class="text-input">
          <small>Error Message</small>
        </div>
         <div class="form-control">
            <input type="password" placeholder="password" name="password" id="password" class="text-input">
            <small>Error Message</small>
         </div>
        <button id="signButton" name="signup">Create</button>
        <p class="message">Already Registered? <a href="#">login</a></p>
       </form>

       <!-- Login Form-->
       <form class="login-form" action="database/logingp.php" method="POST">
        <div class="form-control">
            <input type="text" placeholder="username" name="username" id="userlog" class="text-input correct">
            <small>Error Message</small>
        </div>
        <div class="form-control">
            <input type="password" placeholder="password" name="password" id="passlog" class="text-input">
            <small>Error Message</small>
        </div>
        <button id="loginButton" name="login">Login</button>
        <p class="message">Not Registered? <a href="#">Register</a></p>
       </form>

     </div>
   </div>
</div>
<?php 
    include 'foot.php';
?>