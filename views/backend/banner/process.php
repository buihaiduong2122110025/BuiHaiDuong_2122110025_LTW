<?php

use App\Libraries\MyClass;

use App\Models\Banner;

if (isset($_POST['THEM'])) {
    $banner = new Banner();
    $banner -> name = $_POST['name'];
    $banner -> sort_order =1;
    $banner -> position = $_POST['position'];
    $banner -> link = $_POST['link'];


//upload file
$file = $_FILES['image'];
if(strlen($_FILES['image']['name']) > 0) {
    $target_dir = "../public/images/banner/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (in_array($extension, ['jpg','jpeg','png','gif','webp'])){
    $filname = $banner -> name . "." . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filname);
        $banner -> image = $filname;
}
}
  $banner -> created_at = date ('Y-m-d H:i:s');
  $banner -> created_by = $_SESSION ['user_id'] ?? 1 ;
  $banner -> status=$_POST['status'];
  $banner -> save();
  MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=banner");
}

if (isset($_POST['CAPNHAT'])) {
    $id=$_POST['id'];
    $banner = Banner::find($id);
    $banner -> name = $_POST['name'];
    $banner -> sort_order = 1;
    $banner -> position = $_POST['position'];
    $banner -> link = $_POST['link'];
//upload file
$file = $_FILES['image'];
if(strlen($_FILES['image']['name']) > 0) {
    $target_dir = "../public/images/banner/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (in_array($extension, ['jpg','jpeg','png','gif','webp'])){
    $filname = $banner -> name . "." . $extension;
    //xóa hình cũ
    if(file_exists($target_dir . $banner->image))
    {
        unlink($target_dir . $banner->image);
    }
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filname);
        $banner -> image = $filname;
}
}

  $banner -> updated_at = date ('Y-m-d H:i:s');
  $banner -> updated_by = $_SESSION ['user_id'] ?? 1 ;
  $banner -> status=$_POST['status'];
  $banner -> save();
  MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header("location:index.php?option=banner");
}


if (isset($_POST['CHITIET'])) {
    $id=$_POST['id'];
    $banner = Banner::find($id);
    $banner -> name = $_POST['name'];
    $banner -> sort_order = $_POST['sort_order'];
    $banner -> position = $_POST['position'];
    $banner -> link = $_POST['link'];
//upload file
$file = $_FILES['image'];
if(strlen($_FILES['image']['name']) > 0) {
    $target_dir = "../public/images/banner/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (in_array($extension, ['jpg','jpeg','png','gif','webp'])){
    $filname = $banner -> name . "." . $extension;
    //xóa hình cũ
    if(file_exists($target_dir . $banner->image))
    {
        unlink($target_dir . $banner->image);
    }
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filname);
        $banner -> image = $filname;
}
}
$banner -> metakey=$_POST['meta_key'];
  $banner -> metadesc=$_POST['meta_desc'];
  $banner -> updated_at = date ('Y-m-d H:i:s');
  $banner -> updated_by = $_SESSION ['user_id'] ?? 1 ;
  $banner -> status=$_POST['status'];
  $banner -> save();
  MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header("location:index.php?option=banner");
}