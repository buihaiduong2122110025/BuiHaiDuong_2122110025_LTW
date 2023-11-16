<?php
use App\Libraries\MyClass;


if (isset($_REQUEST['login'])) {
   require_once 'views/frontend/customer-login.php';
   MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đăng Nhập thành công']);
   header('location:index.php');



}
if (isset($_REQUEST['logout'])) {
      unset($_SESSION['iscustom']);
      unset($_SESSION['user_id'] );
      unset($_SESSION['name'] );
      MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đăng Xuất thành công']);
      header('location:index.php');

}
if (isset($_REQUEST['register'])) 
{
      require_once 'views/frontend/customer-register.php';
      MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đăng Kí thành công']);
      header('location:index.php');
}
if (isset($_REQUEST['profile'])) 
{
      require_once 'views/frontend/customer-profile.php';
}

if (isset($_REQUEST['profile_changepassword'])) 
{
      require_once 'views/frontend/customer-profile_changepassword.php';
      MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi mật khẩu thành công']);
      header('location:index.php');
}

