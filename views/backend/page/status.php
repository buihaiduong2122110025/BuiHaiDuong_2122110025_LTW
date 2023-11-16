<?php

use App\Libraries\MyClass;
use App\Models\Post;

$id = $_REQUEST['id'];
$post=Post::find($id);
if ($post == NULL) {
    MyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại! ']);
    header("location:index.php?option=post");
}
$post->status = ($post->status == 1) ? 2 : 1;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = (isset($_SESSION['post_id'])) ? $_SESSION['post_id'] : 1;
$post->save();

MyClass::set_flash('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công :>']);
    header("location:index.php?option=post");