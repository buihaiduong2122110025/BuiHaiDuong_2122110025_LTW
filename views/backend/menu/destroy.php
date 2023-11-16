<?php
use App\Models\Menu;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$menu=Menu:: find($id);

if($menu == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=menu');
}
$menu->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=menu&cat=trash');

