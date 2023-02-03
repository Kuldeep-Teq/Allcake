<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Add Products</span></h5>
                        <div class="col-6">
                            <?= $this->Form->create($addproduct, ['id' => 'productForm', 'url' => ['action' => 'addproduct'], 'enctype' => 'multipart/form-data']) ?>

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
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                        <h5 class="card-title">All Products</span></h5>

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">SNo.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Product Discription</th>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Modified On</th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 1;
                                // dd(count($productList));
                                if (count($categoryList) > 0) {
                                    foreach ($productList as $results) :
                                ?>
                                        <tr>
                                            <th scope="row"><?= $sno++ ?></th>
                                            <th scope="row"><?= $this->Html->image(h($results->product_image), array('width' => '60px', 'class' => 'rounded-circle')) ?></th>
                                            <td class="fw-bold"><?= h($results->product_title) ?></td>
                                            <td width='300px' class="fw-bold"><?= h($results->product_description) ?></td>

                                            <td class="fw-bold"><?= h($results->product_tags) ?></td>
                                            <td class="fw-bold"><?= h($results->created_date) ?></td>
                                            <td class="fw-bold"><?= h($results->modified_date) ?></td>
                                            <td class="actions fw-bold">
                                                <?= $this->Html->link(__('View'), ['action' => 'productview', $results->id], ['class' => 'btn btn-info']) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'productedit', $results->id], ['class' => 'btn btn-primary']) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'productdelete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id), 'class' => 'btn btn-danger']) ?>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                } else { ?>
                                    <tr>
                                        <td colspan="9" class="text-center fw-bold">No Results To Show</td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

</main>