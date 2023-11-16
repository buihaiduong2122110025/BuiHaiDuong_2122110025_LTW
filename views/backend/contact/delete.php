<?php

use App\Libraries\MyClass;
use App\Models\Contact;

$id = $_REQUEST['id'];
$contact=Contact:: find($id);
if($contact == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=contact');
}
$contact->status = 0;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by =1;
$contact->save();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa thành công :>']);

header('location:index.php?option=contact');

        