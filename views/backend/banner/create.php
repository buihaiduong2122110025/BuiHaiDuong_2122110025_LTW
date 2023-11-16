<?php require_once "../views/backend/header.php"; ?>

<!-- CONTENT -->
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
               <strong class="text-dark text-lg">THÊM BANNER</strong>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=banner" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button type="submit" class="btn btn-sm btn-primary" type="submit" name="THEM">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Thêm banner
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-7">
                     <div class="mb-3">
                        <label>Tên banner </label>
                        <input type="text" name="name" placeholder="nhập name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Liên kết</label>
                        <input type="text" placeholder="nhập liên kết" name="link" class='form-control'>
                     </div>
                     <div class="col mb-3">
                        <label>Sắp xếp</label>
                        <select name="sort_order" class="form-control" >
                           <option value="1">Chọn vị trí</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Vị trí</label>
                        <select name="position" class="form-control">
                           <option value="slidershow1">slider show 1</option>
                           <option value="slidershow2">slider show 2</option>
                           <option value="slidershow3">slider show 3</option>

                        </select>
                     </div>

                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
   </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>