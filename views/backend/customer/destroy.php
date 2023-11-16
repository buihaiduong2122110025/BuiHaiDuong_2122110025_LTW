<?php
use App\Models\User;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$user=User:: find($id);

if($user == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=user');
}
$user->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=user&cat=trash');

