<?php
use App\Libraries\MyClass;

   use App\Models\category;
   //status=0--> Rac
   //status=1--> Hiện thị lên trang người dùng
   //
   //SELECT * FROM category wher status!=0 and id=1 order by created_at desc

   $list = category::where('status','=',0)->orderBy('created_at','DESC')->get();
   ?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">THÙNG RÁC DANH MỤC</strong>
                  </div>
               </div>   
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header ">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                  <a class="btn btn-sm btn-info" href="index.php?option=category">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
                  </button>
                  </div>
                </div>
               </div>
               <div class="card-body">

               <?php require_once "../views/backend/message.php";?>

                  <div class="row">
                 
                     <div class="col-md-12">
                     <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th class="text-center" >Tên danh mục </th>
                                 <th class="text-center" >Tên slug</th>
                                 <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
                              </tr>
                           </thead>
                           <tbody>
                          <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item   ):?>
                              <tr class="datarow">  
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                 <img class="img-fluid" src="../public/images/category/<?= $item->image; ?>" alt="<?= $item->image; ?>">                              </td>
                                 </td>
                                 <td class="text-center"></td>
                                         <?= $item->name ; ?> 
                                 </td>
                                 <td class="text-center"><?= $item->slug?></td>
                                 <td class="text-center">
                                 <a href="index.php?option=category&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=category&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 </td>
                                 <td class="text-center" ><?= $item->id?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody> 
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>