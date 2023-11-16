<?php
use App\Models\Brand;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$brand=Brand:: find($id);

if($brand == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=brand');
}
$brand->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=brand&cat=trash');

