<?php

use App\Models\User;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $customer = new user();
    //lấy từ form
    $customer->name = $_POST['name'];
    $customer->username = $_POST['username'];
    $customer->password = $_POST['password'];
    $customer->email = $_POST['email'];
    $customer->gender = $_POST['gender'];
    $customer->phone = $_POST['phone'];
    $customer->roles = $_POST['roles'];
    $customer->address = $_POST['address'];

    $customer->status = $_POST['status'];
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/customer/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $customer->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $customer->image = $filename;
        }
    }
    //tư sinh ra
    $customer->created_at = date('Y-m-d H:i:s');
    $customer->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($customer);
    //luu vao csdl
    //ínet
    $customer->save();
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=customer");
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $customer = User::find($id);
    if ($customer == null) {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

        header("location:index.php?option=customer");
    }
    $customer->name = $_POST['name'];
    $customer->username = $_POST['username'];
    $customer->password = $_POST['password'];
    $customer->email = $_POST['email'];
    $customer->gender = $_POST['gender'];
    $customer->phone = $_POST['phone'];
    $customer->roles = $_POST['roles'];
    $customer->address = $_POST['address'];
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {

        //xóa hình cũ

        //thêm hình mới
        $target_dir = "../public/images/customer/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $customer->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $customer->image = $filename;
        }
    }
    //tư sinh ra
    $customer->updated_at = date('Y-m-d H:i:s');
    $customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($customer);
    //luu vao csdl
    //ínet
    $customer->save();
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cật Nhật thành công']);

    header("location:index.php?option=customer");
}
