<?php

use App\Models\User;

$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();
if (isset($_POST['CHANEGPASSWORD'])) {
   $id = $customer->id;
   $user = User::find($id);

   // $user->name = $_POST['name'];
   // $user->username = $_POST['username'];
   $user->password = sha1($_POST['password']);
   // $user->email = $_POST['email'];
   // $user->phone = $_POST['phone'];
   // $user->address = $_POST['address'];
   // $user->gender = $_POST['gender'];
   // $user->status = $_POST['status'];

   $user->save();
   header('location:index.php?option=customer&profile=true');
}





?>
<?php require_once "views/frontend/header.php"; ?>
<form action="index.php?option=customer&profile_changepassword=true" method="post" name="logincustomer">
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.html">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="call-login--register border-bottom">
               <ul class="nav nav-fills py-0 my-0">
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <?= $customer->phone; ?>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="profile.html"><?= $customer->name; ?></a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main">Thay đổi thông tin tài khoản</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Mật khẩu cũ</td>
                     <td>
                        <input type="password" name="password_old" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Mật khẩu</td>
                     <td>
                        <input type="password" name="password" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Xác nhận mật khẩu</td>
                     <td>
                        <input type="password" name="password_re" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Xác nhận thao tác thực hiện </td>
                     <td>
                        <button class="btn btn-main" type="submit" name="CHANEGPASSWORD">
                           Đổi mật khẩu
                        </button>
                     </td>
                  </tr>

               </table>
            </div>
         </div>
      </div>
   </section>
</form>

<?php require_once "views/frontend/footer.php"; ?>