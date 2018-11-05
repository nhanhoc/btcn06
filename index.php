    <?php
    //tách trang
    require_once 'init.php';
    require_once 'funcion.php';
    //xử lý logic
    $page= 'index';
    $posts =  findAllPosts();
    ?>
    <?php include 'header.php'; ?>
    <h1> Trang chủ</h1>
   <p> <?php if($currentUser) : ?>
    Helllo <?php echo $currentUser['fullname']; ?>.Chúc một ngày tốt đẹp.
    <?php else : ?>
    chào mừng bạn đến với mạng xã hội.
    <?php endif; ?>
    </p>
    <?php foreach ($posts as $post) : ?>
   
    <div class="card" >
  <div class="card-body">
    <h5 class="card-title"><?php echo $post['fullname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['createdA']; ?></h6>
    <p class="card-text"> <?php echo $post['content']; ?></p>
  </div>
</div> 
    <?php endforeach; ?>
    <?php include 'footer.php'; ?>