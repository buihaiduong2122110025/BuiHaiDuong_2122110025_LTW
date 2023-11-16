<?php

use App\Models\user;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $user=new user();
    //lấy từ form
    $user->name = $_POST['name'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    $user->address = $_POST['address'];
    $user->roles = $_POST['roles'];
    $user->gender = $_POST['gender'];


    $user->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$user->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $user->image =$filename;
        }
    }
    //tư sinh ra
    $user->created_at = date('Y-m-d H:i:s');
    $user->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    //ínet
    $user->save();
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);

    header("location:index.php?option=user");
}


if(isset($_POST['CAPNHAT']))
{
    $id= $_POST['id'];
    $user=User::find($id);
    if($post == null){
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

        header("location:index.php?option=user");
    }
    $user->name = $_POST['name'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    $user->address = $_POST['address'];
    $user->roles = $_POST['roles'];
    $user->gender = $_POST['gender'];

    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){

        //xóa hình cũ

        //thêm hình mới
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$user->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $user->image =$filename;
        }
    }
    //tư sinh ra
    $user->updated_at = date('Y-m-d H:i:s');
    $user->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($user);
    //luu vao csdl
    //ínet
    $user->save();
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cật Nhật thành công']);

    header("location:index.php?option=user");
}


