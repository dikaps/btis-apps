 <div class="container-fluid">
   <div class="row">
     <div class="col-md-6 col-12 bg-white">
       <div class="d-flex justify-content-center align-items-center hv-100">
         <div class="login-box">
           <div class="logo">
             <img src="<?= base_url('assets/img/BTis.png') ?>" alt="logo">
           </div>

           <div class="main">
             <h3 class="pb-3">Lupa Password.</h3>

             <form method="POST" autocomplete="off" action="<?= base_url('auth/lupaPassword'); ?>">
               <div class="form-group mb-4">
                 <input type="text" name="email" id="email" placeholder="Email Akun Anda" class="form-control" autofocus>
                 <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
               </div>

               <div class="form-group">
                 <button type="submit" class="btn btn-dark btn-block bg-darkMedium">Submit</button>
               </div>
             </form>

           </div>
         </div>
       </div>

     </div>
     <div class="col-md-6 overflow-hidden">
       <div class="people-login"></div>
     </div>
   </div>
 </div>