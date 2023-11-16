<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>D1 Clear Shop</title>
   <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="public/css/fronend.css">
   <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="public/jquery/jquery-3.7.0.min.js"></script>
</head>

<body>
   <section class="bhd-header">
   <?php
use App\Libraries\MyClass;
         
?>
<?php if (MyClass::has_flash('message')):?>
<?php $message = MyClass::get_flash('message');?>
<div class="alert alert-<?=$message['type'];?> alert-dismissible fade show" role="alert">
  <strong>Thông báo! <?=$message['msg'];?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif;?>
      <div class="container">
         <div class="row">
            <div class="col-6 col-sm-6 col-md-2 py-1">
               <a href="index.php">
                  <img class="img-fluid" style="width:120px;" src="public/images/123.jpg" alt="Logo">
               </a>
            </div>
            <div class="col-12 col-sm-9 d-none d-md-block col-md-5 py-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text bg-main" id="basic-addon2">
                     <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
               </div>
               <div class="form-inline">

               </div>
            </div>
            <div class="col-12 col-sm-12 d-none d-md-block col-md-4 text-center py-2">
               
               <div class="call-login--register border-bottom">
                  <ul class="nav nav-fills py-0 my-0">
                     <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&profile">
                              <i class=" bg-main" aria-hidden="true"></i>
                              ID: <?php echo $_SESSION['user_id']; ?>
                           </a>
                        </li>
                     <?php endif; ?>
                     <?php if (isset($_SESSION['name'])) : ?>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&profile">Tên khách hàng: <?php echo $_SESSION['name']; ?></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&logout=true">Đăng xuất</a>
                        </li>
                     <?php else : ?>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&login=true">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&register=true">Đăng ký</a>
                        </li>
                     <?php endif; ?>
                  </ul>
               </div>
               <div class="fs-6 py-2">
                  <span class="text-main"> 1 ĐỔI 3</span> NẾU HÀNG LỖI <span class="text-main">TRONG 7 NGÀY</span>
               </div>
            </div>
            <div class="col-6 col-sm-6 col-md-1 text-end py-4 py-md-2">
               <a href="index.php?option=cart">
                  <div class="box-cart float-end">
                     <i class="fa fa-shopping-bag " aria-hidden="true"></i>
                     <span id="showcart"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </section>
   <section class="bhd-mainmenu bg-main">
      <div class="container">
         <div class="row">
            <div class="col-12 d-none d-md-block col-md-2 d-none d-md-block">
               <?php require_once 'views/frontend/mod-menu-listcategory.php'; ?>
            </div>
            <div class="col-12 col-md-9">
               <?php require_once 'views/frontend/mod-mainmenu.php'; ?>
            </div>
         </div>
      </div>
   </section>