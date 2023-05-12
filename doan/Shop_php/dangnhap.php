<?php

// if(isset($_GET['btn-sign-up'])){

//     header("Location: index.php?page=sign-up");

// }

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
<style>
   #content {
    width: 100%;
    height: 100%;

    /* background-image: url("b2.jpg");
    background-color: #cccccc;
    background-position: center; 
     background-repeat: no-repeat; 
     background-size: cover;  */
     background-color: #00fcd6; 
    background-image: linear-gradient(to right, #d6f9f9,#aaffaa, #aaffff  ,#d4aaff);
   }

   .container{
    border: 3px solid #878787;
   width: 450px;
   height: 600px;
   padding-top: 50px;
   margin-top: 50px;

   }
   
  .form-group label {
    font-weight: 500;
  }

  .form-group.invalid .form-control {
    border-color: #f33a58;
  }

  

  .form-group.invalid .form-message {
    color: #f33a58;
    font-size: 17px;
  }

  .convert-sign-in a:hover {
    color: crimson;
    text-decoration: none;
  }

  #form-message-error {
    color: red;
    text-align: center;
    font-size: 23px;
    font-weight: 600;
    display: block;
  }

  #form-message-success {
    color: #3ae374;
    text-align: center;
    font-size: 23px;
    font-weight: 600;
    display: block;
  }

  .sub-form {
    position: relative;
  }

  .icon-eye {
    position: absolute;
    right: 20px;
    bottom: 6px;
    padding: 3px;
    z-index: 1;
  }

  .icon-eye:hover {
    cursor: pointer;
  }

  .text-center{
    margin-bottom: 30px;
  }
</style>
<!-- end header -->
<div id="content" class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <h1 class="text-center">Đăng Nhập</h1>

        <form method = "post" action="login.php" class="form" id="form-1">
       

          <div class="form-group form-group-username">
            <label for="username">Tài khoản</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập" />
            <small class="form-message form-message-username"></small>
          </div>

          <div class="form-group form-group-password">
            <label for="password">Mật khẩu</label>
            <div class="sub-form">
              <input type="password" name="userPassword" id="password" class="form-control" placeholder="" />
              <i class="fa-solid fa-eye icon-eye"></i>
            </div>
            <small class="form-message form-message-password"></small>
          </div>

          <div class="form-group form-group-forgotPassword">
          <a href="#">Quên mật khẩu?</a>
          </div>
         
          <input type="submit" name="btn-sign-up" id="btn-sign-up" class="btn btn-info w-100 mt-4 mb-2" value="Đăng nhập"></input>

          <div class="form-group form-group-createAccount">
          <a href="dangky.php">Đăng ký tài khoản mới</a>
          </div>
         
        </form>

       
      </div>
    </div>
    
  </div>
</div>

