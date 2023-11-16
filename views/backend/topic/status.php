<?php

use App\Models\Topic;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$topic =  Topic::find($id);
if($topic==null){
    header("location:index.php?option=topic");
}
//
$topic->status =($topic->status == 1) ? 2 : 1;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);

header("location:index.php?option=topic");