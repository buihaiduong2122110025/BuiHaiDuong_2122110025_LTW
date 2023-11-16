<?php
use App\Models\Topic;

//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM topic wher status!=0 and id=1 order by created_at desc

$list = topic::where('status','!=',0)->orderBy('Created_at','DESC')->get();
$parent_id_html ="";//tạo Khởi tạo biến $parent_id_html thành chuỗi rỗng.

foreach ($list as $cat)//Bắt đầu một vòng lặp, lặp qua mỗi phần tử trong danh sách $list với biến lặp là $cat.
{
   $parent_id_html .="<option value ='$cat->id'>$cat->name</option>";
   //Mỗi vòng lặp sẽ thêm một option mới vào chuỗi $parent_id_html 
//với giá trị là ID của chủ đề và nội dung là tên của chủ đề, định dạng theo cú pháp của HTML.
}
///cài này dùng để  lấy danh sách chủ đề từ CSDL, sau đó tạo một chuỗi HTML chứa các tùy chọn (options)
?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">TẤT CẢ CHỦ ĐỀ</strong>
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
                  <a href="index.php?option=brand&cat=all" class="btn btn-success btn-sm">  <i class="fas fa"></i>Tất Cả</a>

                  <a href="index.php?option=topic&cat=trash" class="btn btn-danger btn-sm">  <i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                  <button class="btn btn-sm btn-primary " type="submit" name ="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                   Thêm chủ đề
                  </button>
                </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php";?>

                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên chủ đề (*)</label>
                           <input type="text" name="name"placeholder="Nhập name"  class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>slug</label>
                           <input type="text" name="slug"  placeholder="Nhập slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Danh mục cha (*)</label>
                           <select name="parent_id" class="form-control">
                              <option value="0">None</option>
                              <?= $parent_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Sắp Xếp</label>
                           <select name="sort_order" class="form-control">
                              <option value="1">1</option>   
                           </select>
                        </div>   
                      
                        <div class="mb-3">
                           <label>Từ khóa SEO</label>
                          <textarea name="metakey"   placeholder="Nhập từ khóa SEO" class="form-control"></textarea>
                         </div>
                         <div class="mb-3">
                           <label>Mô tả SEO</label>
                          <textarea name="metadesc"   placeholder="Nhập mô tả SEO"class="form-control"></textarea>
                         </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                  </div>
                  
                     <div class="col-md-8 ">
                     <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center">Tên chủ đề</th>
                                 <th class="text-center">Tên slug</th>
                                 <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php if (count($list) > 0) : ?>
                              <?php foreach ($list as $item) : ?>
                                    <tr>
                                       <td class="text-center">
                                          <input type="checkbox" />
                                       </td>
                                       <td class="text-center">
                                          <?= $item->name; ?>
                                       </td>
                                       <td class="text-center"> <?= $item->slug; ?></td>
                                       <td class="text-center">
                                          <?php if ($item->status == 2) : ?>
                                             <a href="index.php?option=topic&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                                <i class="fas fa-toggle-off"></i>
                                             </a>
                                          <?php else : ?>
                                             <a href="index.php?option=topic&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-toggle-on"></i>
                                             </a>
                                          <?php endif; ?>
                                          <a href="index.php?option=topic&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                             <i class="far fa-eye"></i>
                                          </a>
                                          <a href="index.php?option=topic&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                             <i class="far fa-edit"></i>
                                          </a>
                                          <a href="index.php?option=topic&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                             <i class="fas fa-trash"></i>
                                          </a>
                                       <td class="text-center"><?= $item->id; ?></td>
                                    </tr>
                                 <?php endforeach; ?>
                              <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
                     </div>
                
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>