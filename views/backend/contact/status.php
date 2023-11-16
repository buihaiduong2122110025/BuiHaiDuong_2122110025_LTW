<?php

use App\Libraries\MyClass;
use App\Models\Contact;

$id = $_REQUEST['id'];
$contact=Contact::find($id);
if ($contact == NULL) {
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại! ']);
    header("location:index.php?option=contact");
}
$contact->status = ($contact->status == 1) ? 2 : 1;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$contact->save();


//$contact = brand::where([['id', '=', $id], ['status', '!=', 0]])->first();


//$contact=new brand();
// $contact=brand::find($id);
MyClass::set_flash('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công :>']);
//$_SESSION['message']='Thay đổi trạng thái thành công :>';

//if (!is_numeric($id)) {
    header("location:index.php?option=contact");