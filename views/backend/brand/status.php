<?php
 use App\Models\Brand;
 use App\Libraries\MyClass;

 $id = $_REQUEST['id'];
 $brand = Brand::find($id);
 if ($brand == null){
     header("location:index.php?option=brand");
 }
 //
 $brand->status = ($brand->status == 1) ? 2 : 1;
 $brand->updated_at = date('Y-m-d H:i:s');
 $brand->updated_by =(isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
 $brand->save();
 MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);

 header("location:index.php?option=brand");
 