<?php
use App\Models\Category;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$category=Category:: find($id);

if($category == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=category');
}
$category->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=category&cat=trash');

