   <div class="pagetitle">
       <h1>Dashboard</h1>
       <nav>
           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.html">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
           </ol>
       </nav>
   </div><!-- End Page Title -->




   <section class="section dashboard">
       <div class="row">

           <!-- Left side columns -->
           <div class="col-lg-8">
               <div class="row">
                   <?php
                    foreach ($posts as $post) :
                    ?>

                       <div class="col-xxl-6 col-md-6">
                           <div class="card info-card sales-card post-card">

                               <div class="card-body">
                                   <h5 class="card-title">
                                       <div class="row">
                                           <div class="col-md-2"><?= $this->Html->image(h($post->user->image), array('width' => '25px', 'class' => 'rounded')) ?></div>
                                           <div class="col-md-10"><?= h($post->user->full_name) ?></div>
                                       </div>
                                   </h5>
                                   <?= $this->Html->image(h($post->image), ['class' => 'post_image']) ?>
                                   <h5 class="card-title"><?= h($post->name) ?></h5>

                                   <!-- <div class="ps-3">
                                       <h6>About</h6>
                                       <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                   </div> -->
                                   <?= $this->Html->link("Comments", ['action' => 'comment', $post->id], ['class' => 'btn btn-primary cmt_btn']) ?>
                               </div>

                           </div>
                       </div>
                   <?php endforeach; ?>
               </div>
           </div><!-- End Left side columns -->

           <!-- Right side columns -->
           <div class="col-lg-4">

               <!-- News & Updates Traffic -->
               <div class="card">
                   <div class="card-body pb-0">
                       <h5 class="card-title">My Posts</span></h5>

                       <div class="news">
                           <?php
                            foreach ($mypost->posts as $mypost) :
                            ?>
                               <div class="post-item clearfix">
                                   <?= $this->Html->image(h($mypost->image), ['class' => 'my_post']) ?>
                                   <h4><?= h($mypost->name) ?></h4>
                                   <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                   <?= $this->Form->postLink(__('Delete Post'), ['action' => 'postdelete', $post->id, 'class' => 'post_delete'], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'btn btn-danger']) ?>
                               </div>
                           <?php endforeach; ?>
                       </div><!-- End sidebar recent posts-->

                   </div>
               </div><!-- End News & Updates -->

           </div><!-- End Right side columns -->

       </div>
       <div class="paginator">
           <ul class="pagination">
               <?= $this->Paginator->first('<< ' . __('first')) ?>
               <?= $this->Paginator->prev('< ' . __('previous')) ?>
               <?= $this->Paginator->numbers() ?>
               <?= $this->Paginator->next(__('next') . ' >') ?>
               <?= $this->Paginator->last(__('last') . ' >>') ?>
           </ul>
           <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
       </div>
   </section>