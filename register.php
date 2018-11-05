<?php
    //tách trang
    require_once 'init.php';
    require_once 'funcion.php';
    //xử lý logic
    $page= 'register';
    $success =false;
    if(isset ($_POST['fullname'])&& isset($_POST['email'])&& isset($_POST['password'])){
      $password=$_POST['password'];
       $fullname=$_POST['fullname'];
       $email=$_POST['email'];
       $passwordHash=password_hash($password,PASSWORD_DEFAULT);
       $userId=createUser($email,$fullname,$passwordHash);
       $_SESSION['userId']=$userId;
        header('Location: index.php');
       $success=true;
    }
    ?>
    <?php include 'header.php'; ?>
    <h1> Đăng ký </h1>
    <?php if(!$success) : ?>
    <form action="register.php" method="post">
    <div class="form-group">
    <label for="fullname">Tên Người Dùng</label>
    <input type="text" class="form-control" id="fullname" name="fullname" >
  </div>
  <div class="form-group">
    <label for="email">Địa Chỉ email</label>
    <input type="email" class="form-control" id="email" name="email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="password">Mật Khẩu</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Đăng Ký</button>
</form>
    <?php endif; ?>
    <?php include 'footer.php'; ?>