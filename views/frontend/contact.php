<?php

use App\Models\contact;
use App\Libraries\MyClass;

if (isset($_POST['CONTACT'])) {
   $contact = new contact();
   //lấy từ form
   $contact->name = $_POST['name'];
   $contact->email = $_POST['email'];
   $contact->phone = $_POST['phone'];
   $contact->status = $_POST['status'];
   $contact->content  = $_POST['content'];
   $contact->title  = $_POST['title'];
   $contact->replay_id  = $_POST['replay_id'];


   $contact->save();

   $contact->created_at = date('Y-m-d H:i:s');
   var_dump($contact);
   //luu vao csdl
   //ínet
   $contact->save();
   MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Liên Hệ Thành Công']);
   header("location:index.php");
}
?>
<?php require_once 'views/frontend/header.php'; ?>

<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.html">Trang chủ</a>
            </li>
            <li class=" breadcrumb-item active " aria-current="page">
               Liên hệ
            </li>
         </ol>
      </nav>   
   </div>
</section>
<section class="bhd-maincontent py-2">

   <form action="index.php?option=contact" method="post" name="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7609399213206!2d106.77063267462792!3d10.829597989322405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701cbacce21%3A0xc55b53936092d0e1!2zS8O9IFTDumMgWMOhIFRyxrDhu51uZyBDYW8gxJDhurNuZyBDw7RuZyBUaMawxqFuZyBUUC5IQ00!5e0!3m2!1svi!2s!4v1699500845428!5m2!1svi!2s" width="650" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
            
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email" required>
               </div>
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề"required>
               </div>
               <div class="mb-3">
                  <label for="content" class="text-main">Nội dung</label>
                  <textarea name="content" id="content" class="form-control" placeholder="Nhập nội dung liên hệ"required></textarea>
               </div>
               <div class="mb-3">
                  <label for="replay_id">ID LIÊN HỆ</label>
                  <textarea name="replay_id" id="replay_id" class="form-control" placeholder=" Nhập ID  "required></textarea>
               </div>
               <div class="mb-3">
                  <label for="status">TRẠNG THÁI</label>
                  <select id="status" name="status" class="form-control">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3">
                  <button class="btn btn-main" type="submit"name="CONTACT">Gửi liên hệ</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</section>
 <?php require_once 'views/frontend/footer.php'; ?>