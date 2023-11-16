<?php
use App\Models\Menu;

$list = Menu::where('status','!=',0)->orderBy('Created_at','DESC')->get();
$parent_id_html ="";

foreach ($list as $cat)
{
   $parent_id_html .="<option value ='$cat->id'>$cat->name</option>";
}
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$menu =  menu::find($id);
if($menu==null){
    header("location:index.php?option=menu");
}


?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">CẬT NHẬT MENU</strong>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header text-right">                                    
              
                  <a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>  
                  <button class="btn btn-sm btn-primary" type="submit" name ="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu[Cật Nhật]
                     </button>

               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $menu->id; ?>" />
                           <label>Tên Menu</label>
                           <input type="text" value="<?=$menu->name; ?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Link</label>
                           <input type="text" value="<?=$menu->link; ?>" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Vị Trí</label>
                           <input type="text" value="<?=$menu->position; ?>" name="position" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Kiểu</label>
                           <input type="text" value="<?=$menu->type; ?>" name="type" class="form-control">
                        </div>
                      
                        
                         <div class="mb-3">
                           <label>Danh mục cha (*)</label>
                           <select name="parent_id" class="form-control">
                              <option value="0">none</option>
                              <?= $parent_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Sắp Xếp</label>
                           <select name="sort_order" class="form-control">
                              <option value="1">none</option>   
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?= ($menu->status==1)?'selected':''; ?> >Xuất bản</option>
                              <option value="2" <?= ($menu->status==2)?'selected':''; ?> >Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>