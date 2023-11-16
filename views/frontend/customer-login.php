<?php

use App\Models\User;
use App\Libraries\MyClass;

if (isset($_POST["LOGIN"])) {
   $username = $_POST['username'];
   $password = sha1($_POST['password']);
   $args = [
      ['password', '=', $password],

      ['status', '=', 1],
   ];
   if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $args[] = ['email', '=', $username];
   } else {
      $args[] = ['username', '=', $username];
   }
   $user = User::where($args)->first();
   if ($user !== null) {
      $_SESSION['iscustom'] = $username;
      $_SESSION['user_id'] = $user->id;
      $_SESSION['name'] = $user->name;
      $_SESSION['email'] = $user->email;
      $_SESSION['phone'] = $user->phone;
      $_SESSION['address'] = $user->address;
      $_SESSION['gender'] = $user->gender;
      $_SESSION['password'] = $user->password;

   } else {
      $error = "Tài khoản không hợp lệ";
   }
}
?>
<?php require_once "views/frontend/header.php" ?>


<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active " aria-current="page">
            <a class="text-main">Đăng nhập</a>
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="ttd-maincontent py-2">
   <form action="index.php?option=customer&login=true" method="post" name="logincustomer">
      <div class="container"> 
         <div class="row">
            <div class="col-md-4">
               <p>Để gửi bình luận, liên hệ hay để mua hàng cần phải có tài khoản</p>
            </div>
            <div class="col-md-8">
               <div class="mb-3">
                  <label for="username" class="text-main">Tên tài khoản (*)</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
               </div>
               <div class="mb-3">
                  <label for="password" class="text-main">Mật khẩu (*)</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
               </div>
               <div class="mb-3">
                  <button class="btn btn-main"  type="submit" name="LOGIN">Đăng nhập</button>
               </div>
               
               <p><u class="text-main">Chú ý</u>: (*) Thông tin bắt buộc phải nhập</p>
               <?php echo $error??""; ?>
            </div>
         </div>      
      </div>
   </form>
</section>
<?php require_once "views/frontend/footer.php" ?>