<?php
use App\Models\Topic;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$topic=Topic:: find($id);

if($topic == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=topic');
}
$topic->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=topic&cat=trash');

