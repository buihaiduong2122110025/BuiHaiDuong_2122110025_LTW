<?php
use App\Models\Product;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$product=Product:: find($id);

if($product == null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

            header('location: index.php?option=product');
}
$product->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);

header('location: index.php?option=product&cat=trash');

