<?php
use App\Models\Order;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$order=Order:: find($id);
if($order == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=order');
}
$order->status = 0;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by =1;
$order->save();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa thành công :>']);

header('location: index.php?option=order');

