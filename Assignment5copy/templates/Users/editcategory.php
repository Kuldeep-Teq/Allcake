 <main id="main" class="main">
     <?php echo $this->Flash->render()  ?>
     <div class="pagetitle">
         <h1>Categories</h1>
         <nav>
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                 <li class="breadcrumb-item active">Update Categories</li>
             </ol>
         </nav>
     </div><!-- End Page Title -->

     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="card top-selling overflow-auto">

                     <!--=========================== form for update category ============================ -->

                     <div class="card-body" id="addcategory">
                         <h5 class="card-title">Update Categories</span></h5>
                         <div class="col-6">
                             <?= $this->Form->create($productCategory) ?>


                             <div class="col-12 my-3">
                                 <?php echo $this->Form->control('category_name', ['required' => false, 'class' => 'form-control']); ?>
                             </div>

                             <div class="col-12 my-3">
                                 <?php
                                    echo '<label>Status</label>';
                                    echo $this->Form->radio(
                                        'status',
                                        [
                                            ['value' => '0', 'text' => 'Active', 'class' => 'radio-btn mx-2', 'checked' => true],
                                            ['value' => '1', 'text' => 'Inactive', 'class' => 'radio-btn mx-2']
                                        ],
                                        ['required' => 'false']
                                    );
                                    ?>

                             </div>

                             <div class="col-12 my-3">
                                 <?= $this->Html->link(__('Back'), ['action' => 'addcategory'], ['class' => 'btn btn-primary']) ?>
                                 <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                             </div>

                             <?= $this->Form->end() ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </main>