<?php

use App\Models\Category;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$category = Category::find($id);
if($category==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

    header("location:index.php?option=category");
}
//
$category->status =0;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$category->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công']);

header("location:index.php?option=category");