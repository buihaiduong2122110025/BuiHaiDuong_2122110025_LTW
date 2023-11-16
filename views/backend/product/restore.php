<?php
 use App\Models\Product;
 use App\Libraries\MyClass;

 $id = $_REQUEST['id'];
 $product = Product::find($id);
 if ($product == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

     header("location:index.php?option=product");
 }
 //
 $product->status = 2 ;
 $product->updated_at = date('Y-m-d H:i:s');
 $product->updated_by =(isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
 $product->save();
 MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);

 header("location:index.php?option=product");
 