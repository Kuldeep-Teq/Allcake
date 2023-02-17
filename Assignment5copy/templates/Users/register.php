 <main>
     <div class="container">
         <?php echo $this->Flash->render()  ?>
         <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                         <div class="card mb-3">

                             <div class="card-body">

                                 <div class="pt-4 pb-2">
                                     <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                     <p class="text-center small">Enter your personal details to create account</p>
                                 </div>

                                 <?= $this->Form->create($user, ['id' => 'loginForm', 'url' => ['action' => 'register'], 'type' => 'file']) ?>

                                 <div class="col-12 my-3">
                                     <div class="form-group text-center">
                                         <div class="imgdisplay">
                                             <?= $this->Html->image('imageicon.jpg', array('class' => 'rounded-circle img-thumbnail mx-auto d-block mb-2', 'alt' => 'Profile', 'height' => '250px', 'width' => '150px', 'name' => 'imgdisplay', 'id' => 'imgdisplay', 'onclick' => 'imgSelect()')) ?>
                                         </div>
                                         <?php echo $this->Form->control('user_profile.profile_image', ['type' => 'file', 'required' => false, 'class' => 'form-control', 'onchange' => 'showImage(this)', 'id' => 'image']); ?>
                                     </div>
                                 </div>

                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('user_profile.first_name', ['required' => false, 'class' => 'form-control']); ?>
                                 </div>

                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('user_profile.last_name', ['required' => false, 'class' => 'form-control']); ?>
                                 </div>

                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('user_profile.contact', ['required' => false, 'class' => 'form-control']); ?>
                                 </div>

                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('user_profile.address', ['required' => false, 'class' => 'form-control']); ?>
                                 </div>


                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('email', ['required' => false, 'class' => 'form-control']); ?>
                                 </div>

                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('password', ['required' => false, 'class' => 'form-control']); ?>
                                 </div>

                                 <div class="col-12 my-3">
                                     <?php echo $this->Form->control('cnfirm_pswrd', ['required' => 'false', 'class' => 'form-control', 'label' => 'Confirm Password']); ?>

                                 </div>

                                 <!-- <div class="col-12 my-3">
                                     <?php echo $this->Form->control('user_profile.image', ['type' => 'file', 'required' => false, 'class' => 'form-control']); ?>
                                 </div> -->

                                 <div class="col-12 my-3">
                                     <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary form-control', 'id' => 'userbtn']) ?>
                                 </div>



                                 <!-- <div class="col-12 my-3 ">
                                     <div class="form-group text-center">
                                         <div class="imgdisplay">
                                             <?= $this->Html->image('imageicon.jpg', array('class' => 'rounded-circle img-thumbnail mx-auto d-block mb-2', 'alt' => 'Profile', 'height' => '250px', 'width' => '150px', 'name' => 'imgdisplay', 'id' => 'imgdisplay', 'onclick' => 'imgSelect()')) ?>
                                         </div>
                                         <?php echo $this->Form->control('user_profile.image', ['type' => 'file', 'required' => false, 'class' => 'form-control', 'onchange' => 'showImage(this)', 'id' => 'image']); ?>
                                     </div>
                                 </div> -->






                                 <div class="col-12 my-3">
                                     <p class="small mb-0">Already have an account? <?= $this->Html->link("Login", ['action' => 'login']) ?></p>
                                 </div>

                                 <?= $this->Form->end() ?>

                             </div>
                         </div>

                     </div>
                 </div>
             </div>

         </section>

     </div>
 </main><!-- End #main -->
 <?php echo $this->Html->script('script.js'); ?>
 <?php echo $this->Html->script('ajax.js'); ?>