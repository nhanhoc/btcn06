<?php
    //tách trang
    require_once 'init.php';
    require_once 'funcion.php';
    //xử lý logic
    $page= 'login';
    $success =false;
    if(isset($_POST['email'])&& isset($_POST['password'])){
      $password=$_POST['password'];
       $email=$_POST['email'];
       $user = findUserByEmail($email);
       if($user){
           $check=password_verify($password,$user['password']);
           if($check){
        $_SESSION['userId']=$user['id'];
        header('Location: index.php');
       $success=true;
       }
    }
}
    ?>
    <?php include 'header.php'; ?>
    <h1> Đăng Nhập </h1>
    <?php if(!$success) : ?>
    <form action="login.php" method="post">
  <div class="form-group">
    <label for="email">Địa Chỉ email</label>
    <input type="email" class="form-control" id="email" name="email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="password">Mật Khẩu</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Đăng Nhập</button>
</form>
    <?php endif; ?>
    <?php include 'footer.php'; ?>