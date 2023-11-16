<?php
use App\Models\Order;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$order=Order:: find($id);

if($order == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=order');
}
$order->delete();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa khỏi CSDL thành công']);

header('location: index.php?option=order&cat=trash');

