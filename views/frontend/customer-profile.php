<?php

use App\Models\User;


?>
<?php require_once "views/frontend/header.php"?>

   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class=" breadcrumb-item active" aria-current="page"><a class="text-main">Thông tin tài khoản<</a></li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="ttd-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-3 order-2 order-md-1">
               <ul class="list-group mb-3 list-category">
                  <li class="list-group-item bg-main py-3">Thông tin tài khoản</li>
                  <li class="list-group-item">
                     <a href="index.php?option=profile">Thông tin tài khoản</a>
                  </li>
                  <li class="list-group-item">  
                     <a href="profile.html">Quản lý đơn hàng</a>
                  </li>
                  <li class="list-group-item">
                     <a href="index.php?option=customer&profile_changepassword">Đổi mật khẩu</a>
                  </li>
                  
               </ul>
            </div>
            <div class="col-md-6 order-1 order-md-2">
               <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Tên tài khoản</td>
                     <td> <?php echo $_SESSION['name']; ?></td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Tên đăng nhập</td>
                     <td> <?php echo $_SESSION['iscustom']; ?> <a href="index.php?option=customer&profile_changepassword">Đổi mật khẩu</a> </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Email</td>
                     <td><?php echo $_SESSION['email']; ?> </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Điện thoại</td>
                     <td><?php echo $_SESSION['phone']; ?> </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Địa chỉ</td>
                     <td><?php echo $_SESSION['address']; ?></td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Giới Tính</td>
                     <td><?php echo $_SESSION['gender']; ?> </td>
                     <td> (*) 1=Nam,2=Nữ  </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </section>
   <?php require_once "views/frontend/footer.php"?>
