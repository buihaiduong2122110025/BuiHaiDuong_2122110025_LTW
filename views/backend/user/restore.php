<?php
 use App\Models\User;
 use App\Libraries\MyClass;

 $id = $_REQUEST['id'];
 $user = User::find($id);
 if ($user == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

     header("location:index.php?option=user");
 }
 //
 $user->status = 2 ;
 $user->updated_at = date('Y-m-d H:i:s');
 $user->updated_by =(isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
 $user->save();
 MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);

 header("location:index.php?option=user");
 