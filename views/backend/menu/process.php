<?php
use App\Models\Category;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Brand;
use App\Models\Page;
use App\Models\Topic;

use App\Libraries\MyClass;
// them danh muc
if(isset($_POST['ADDCATEGORY']))
{
    if(isset($_POST['categoryId']))
    {


            $listid = $_POST['categoryId'];
            foreach($listid as $id) 
            {
                $category= Category::find($id);
                $menu = new Menu;
                $menu->name = $category->name;
                $menu->link = 'index.php?option=product&cat=' .$category->slug;
                $menu->type = 'category';
                $menu->table_id = $category->id;
                $menu->sort_order=1;
                $menu->position= $_POST['position'];
                $menu->sort_order=1;
                $menu->parent_id=0;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by=1;
                $menu->save();
            
            }
            //
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
            header("location:index.php?option=menu");
    }
    else
    {
        MyClass::set_flash('message', ['type' => 'dange', 'msg' => 'Chưa chọn danh mục']);
        header("location:index.php?option=menu");
    }

}

// them brand
if(isset($_POST['ADDBRAND']))
{
    $listid = $_POST['brandId'];
    foreach($listid as $id) 
    {
        $brand= Brand::find($id);
        $menu = new Menu;
        $menu->name = $brand->name;
        $menu->link = 'index.php?option=brand&cat=' .$brand->slug;
        $menu->type = 'brand';
        $menu->table_id = $brand->id;
        $menu->sort_order=1;
        $menu->position= $_POST['position'];
        $menu->sort_order=1;
        $menu->parent_id=0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by=1;
        $menu->save();
       
    }
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=menu");
}
// them post
if(isset($_POST['ADDPAGE']))
{
    $listid = $_POST['pageId'];
    foreach($listid as $id) 
    {
        $post= Post::find($id);
        $menu = new Menu;
        $menu->name = $post->title;
        $menu->link = 'index.php?option=page&cat=' .$post->slug;
        $menu->type = 'page';
        $menu->table_id = $post->id;
        $menu->sort_order=1;
        $menu->status=2;
        $menu->position= $_POST['position'];
        $menu->sort_order=1;
        $menu->parent_id=0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by=1;
        $menu->save();
       
    }
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=menu");
}
//them chu de
 
//

if(isset($_POST['ADDCUSTOM']))
{

   if(isset($_POST['name'], $_POST['link']))
    {
        
        $menu =new Menu;
        $menu->name = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'custom';
        $menu->sort_order=1;
        $menu->position= $_POST['position'];
        $menu->sort_order=1;
        $menu->status=2;
        $menu->parent_id=0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by=1;
        $menu->save();
       
    }
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header("location:index.php?option=menu");
}




if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $menu = Menu::find($id);
    if (!$menu) {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        header("location:index.php?option=menu");
        exit;
    }
    
    $menu->parent_id = $_POST['parent_id'];
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;
    $menu->status = $_POST['status'];
    $menu->save();

    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header("location:index.php?option=menu");
}
