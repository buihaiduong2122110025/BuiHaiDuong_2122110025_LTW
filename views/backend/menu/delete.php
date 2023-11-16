<?php

use App\Libraries\MyClass;
use App\Models\Menu;

$id = $_REQUEST['id'];

$menu = Menu::find($id);
if ($menu == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location: index.php?option=menu");
}
$menu->status = 0;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = (isset($_SESSION['user id'])) ? $_SESSION['user_ id'] : 1;
$menu->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thành công']);
header("location:index.php?option=menu");
