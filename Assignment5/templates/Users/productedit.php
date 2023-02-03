<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Update Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Update Products</span></h5>
                        <div class="col-6">
                            <?= $this->Form->create($product, ['id' => 'productForm', 'enctype' => 'multipart/form-data']) ?>

                            <div class="col-12 my-3">
                                <?php echo $this->Form->control('product_image', ['type' => 'file', 'required' => false, 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-3">
                                <?php echo $this->Form->control('product_title', ['required' => false, 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-3">
                                <?php echo $this->Form->control('product_description', ['rows' => '3', 'cols' => '66', 'type' => 'textarea', 'required' => false]); ?>
                            </div>

                            <div class="col-12 my-3">
                                <label for="product_category">Product Category</label>
                                <select class="form-select" name="product_category" id="product_category" aria-label="Default select example">
                                    <option value="">--Select Category--</option>
                                    <?php foreach ($categoryList as $list) : ?>
                                        <option value="<?php echo $list->id ?>"><?= $list->category_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12 my-3">
                                <?php echo $this->Form->control('product_tags', ['required' => false, 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-3">

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
                                <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?= $this->Form->end() ?>

                            <!-- <div class="row">
                                <div class="column-responsive column-80">
                                    <div class="users form content">
                                        <?= $this->Form->create($product, ['enctype' => 'multipart/form-data']) ?>
                                        <fieldset>
                                            <?php
                                            echo $this->Form->control('product_image', ['type' => 'file']);
                                            echo $this->Form->control('product_title');
                                            echo $this->Form->control('product_description');
                                            echo $this->Form->control('product_category');
                                            echo $this->Form->control('job');
                                            echo $this->Form->control('country');
                                            echo $this->Form->control('address');
                                            echo $this->Form->control('phone');
                                            echo $this->Form->control('email');
                                            echo $this->Form->control('password');
                                            ?>
                                        </fieldset>
                                        <?= $this->Form->button(__('Submit')) ?>
                                        <?= $this->Form->end() ?>
                                    </div>
                                </div>
                            </div> -->

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</main>