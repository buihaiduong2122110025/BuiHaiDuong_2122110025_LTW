<?php
 use App\Models\banner;
 use App\Libraries\MyClass;

 $id = $_REQUEST['id'];
 $banner = banner::find($id);
 if ($banner == null){
     header("location:index.php?option=banner");
 }
 //
 $banner->status = ($banner->status == 1) ? 2 : 1;
 $banner->updated_at = date('Y-m-d H:i:s');
 $banner->updated_by =(isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
 $banner->save();
 MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);

 header("location:index.php?option=banner");
 