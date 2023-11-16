
<?php

use App\Models\order;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $order=new order();
    //lấy từ form
    $order -> user_id = $_POST['user_id'];
    $order -> deliveryname = $_POST['deliveryname'];
    $order -> deliveryemail = $_POST['deliveryemail']; 
    $order -> deliveryphone = $_POST['deliveryphone'];
    $order -> note = $_POST['note'];
    $order -> deliveryaddress = $_POST['deliveryaddress'];
    $order -> status = $_POST['status'];
    //tư sinh ra
    $order->created_at = date('Y-m-d H:i:s');
    var_dump($order);
    //luu vao csdl
    //ínet
    $order->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
 
    //
    header("location:index.php?option=order");
}

if(isset($_POST['CAPNHAT']))
{
    $id= $_POST['id'];
    $order=order::find($id);
    if($order == null){
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

        header("location:index.php?option=order");
    }
    //lấy từ form
    $order -> user_id = $_POST['user_id'];
    $order -> deliveryname = $_POST['deliveryname'];
    $order -> deliveryemail = $_POST['deliveryemail']; 
    $order -> deliveryphone = $_POST['deliveryphone'];
    $order -> note = $_POST['note'];
    $order -> deliveryaddress = $_POST['deliveryaddress'];
    $order -> status = $_POST['status'];
    //tư sinh ra
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($order);
    //luu vao csdl
    //ínet
    $order->save();
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cật Nhật thành công']);

    header("location:index.php?option=order");
}





