<?php
 function findUserById($id){
  global $db;
  $stmt =$db ->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
  $stmt->execute(array($id));
  $user =$stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
 }
 function findUserByEmail($email){
    global $db;
    $stmt =$db ->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->execute(array($email));
    $user =$stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
   }
   //hiển thị tất cả các post trên hệ thống
   function findAllPosts(){
    global $db;
    $stmt =$db ->prepare("SELECT p. *,u.fullname FROM posts AS p LEFT JOIN users AS u ON u.id=p.userId ORDER BY createdA DESC");
    $stmt->execute();
    $posts =$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
   }

   function createUser($email,$fullname,$passwordHash){
    global $db;
    $stmt =$db ->prepare("INSERT INTO users(email,fullname,password) VALUES(?,?,?)");
    $stmt->execute(array($email,$fullname,$passwordHash));
    return $db->lastInsertId();
   }