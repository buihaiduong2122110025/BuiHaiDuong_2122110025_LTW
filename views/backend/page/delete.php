<?php
use App\Models\Post;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$post=Post:: find($id);
if($post == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=post');
}
$post->status = 0;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by =1;
$post->save();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa thành công :>']);

header('location: index.php?option=post');

