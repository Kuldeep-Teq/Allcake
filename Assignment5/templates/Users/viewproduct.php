<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Product Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php $pid = $product->id; ?>
                                <?= $this->Html->image(h($product->product_image), array('class' => 'img-fluid rounded-start product_image')) ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title"><?= h($product->product_title) ?></h2>
                                    <p class="card-text"><?= h($product->product_description) ?></p>
                                    <p class="card-text"><small class="text-muted"><?= h($product->created_date) ?></small></p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Add Comment</span></h5>
                            <div class="col-6">
                                <?= $this->Form->create(null, ['id' => 'commentForm', 'url' => ['action' => 'comment', $pid]]) ?>

                                <div class="col-12 my-3">
                                    <?php echo $this->Form->control('product_id', ['class' => 'form-control', 'type' => 'hidden', 'value' => $product->id]); ?>
                                    <?php echo $this->Form->control('comment', ['rows' => '3', 'cols' => '66', 'type' => 'textarea', 'required' => false]); ?>
                                </div>

                                <div class="col-12 my-3">
                                    <?= $this->Form->button(__('Comment'), ['class' => 'btn btn-primary', 'action' => 'viewproduct']) ?>
                                </div>

                                <?= $this->Form->end() ?>
                            </div>


                        </div>

                        <div class="row d-flex">
                            <div class="col-md-8 col-lg-6">
                                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                    <div class="card-body p-4">
                                        <?php

                                        // dd(count($comments));
                                        if (count($comments) > 0) {
                                            foreach ($comments as $results) :
                                        ?>
                                                <div class="card mb-4">

                                                    <div class="card-body">
                                                        <p class="text-dark fw-bold"><?= h($results->comment) ?></p>

                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <?= $this->Html->image($results->user->user_profile->profile_image, array('height' => '25px')) ?>
                                                                <p class="small mb-0 ms-2"><?php echo h($results->user->user_profile->first_name) . ' ' . h($results->user->user_profile->last_name); ?></p>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <p class="small text-muted mb-0">Upvote?</p>
                                                                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                                                <p class="small text-muted mb-0">3</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php
                                            endforeach;
                                        } else { ?>
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text text-dark fw-bold">Be The First To Comment</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


</main>