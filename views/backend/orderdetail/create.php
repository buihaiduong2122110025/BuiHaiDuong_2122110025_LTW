<?php
use App\Models\User;
use App\Models\Order;
$list_user = User::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();

$user_id_html = "";

foreach ($list_user as $user) {
   $user_id_html .= "<option value ='$user->id'>$user->name</option>";
}
?>
<?php require_once "../views/backend/header.php";?>

      <!-- CONTENT -->
      <form action ="index.php?option=orderdetail&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">THÊM ĐƠN HÀNG</strong>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=orderdetail" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-primary" type ="submit"name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Thêm Đơn Hàng
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                       
                        <div class="mb-3">
                              <label>Địa chỉ giao hàng</label>
                              <input type="text" placeholder="Nhập Địa chỉ giao hàng" name="deliveryaddress" class="form-control">
                           </div>
                        <div class="mb-3">
                           <label>Tên giao hàng</label>
                          <textarea name="deliveryname" placeholder="Nhập Tên giao hàng"  class="form-control"></textarea>
                         </div>
                        <div class="mb-3">
                           <label>SDT giao hàng</label>
                          <textarea name="deliveryphone"  placeholder="Nhập SDT giao hàng" class="form-control"></textarea>
                         </div>
                        
                     </div>
                
                     <div class="col-md-3">
                     <div class="mb-3">
                           <label>Email Giao hàng</label>
                           <textarea name="deliveryemail" placeholder="Nhập Email Giao hàng"  class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Note</label>
                           <textarea name="note" placeholder="Nhập note"  class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                        <label>User_id (*)</label>
                        <select name="user_id" class="form-control">
                           <option value="0">None</option>
                           <?= $user_id_html; ?>
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
         </section>
      </div>
      </form>
      <?php require_once "../views/backend/footer.php";?>
