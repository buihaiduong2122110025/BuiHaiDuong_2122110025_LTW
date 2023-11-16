<?php
use App\Models\banner;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$banner=banner:: find($id);

if($banner == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=banner');
}
$banner->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=banner&cat=trash');

