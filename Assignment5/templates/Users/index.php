<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-9">
                <div class="row">

                    <?php
                    if ($user->user_type == '0') {
                    ?>
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Categories</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <?= $this->Html->image('category-icon-1.jpg', ['alt' => 'product-category', 'width' => '35px']); ?>
                                        </div>
                                        <div class="ps-3">
                                            <?= $this->Html->link(__('Add Categories'), ['action' => 'addcategory'], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Add Products</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </div>
                                        <div class="ps-3">
                                            <?= $this->Html->link(__('Add Products'), ['action' => 'addproduct'], ['class' => 'btn btn-primary']) ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">User Details</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                        <div class="ps-3">
                                            <?= $this->Html->link(__('All Users'), ['action' => 'userlist'], ['class' => 'btn btn-primary px-4']) ?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->





                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">All Products</span></h5>

                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">SNo.</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product Title</th>
                                                <th scope="col">Product Discription</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Tag</th>
                                                <th scope="col">Created On</th>
                                                <th scope="col">Modified On</th>
                                                <th scope="col" colspan='3'>Actions</th>
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
                                                        <th scope="row"><?= $this->Html->image(h($results->product_image), array('width' => '60px', 'class' => 'rounded-circle myprofile')) ?></th>
                                                        <th scope="row"><?= h($results->product_title) ?></th>
                                                        <td width='260px' class=" fw-bold discription"><?= h($results->product_description) ?></td>
                                                        <td class="fw-bold">
                                                            <?php if ($results->status == 0) : ?>
                                                                <?=
                                                                $this->Form->postLink(
                                                                    __('Active'),
                                                                    ['action' => 'productStatus', $results->id, $results->status],
                                                                    ['confirm' => __('Are You Sure you want to deactivate # {0}?', $results->id), 'class' => 'btn btn-primary', 'escape' => false, 'title' => 'Deactivate']
                                                                ) ?>
                                                            <?php else : ?>
                                                                <?=
                                                                $this->Form->postLink(
                                                                    __('Deactive'),
                                                                    ['action' => 'productStatus', $results->id, $results->status],
                                                                    ['confirm' => __('Are You Sure you want to Activate # {0}?', $results->id), 'class' => 'btn btn-primary', 'escape' => false, 'title' => 'Activate']
                                                                ) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-bold"><?= h($results->product_tags) ?></td>
                                                        <td class="fw-bold"><?= h($results->created_date) ?></td>
                                                        <td class="fw-bold"><?= h($results->modified_date) ?></td>
                                                        <td class="fw-bold">
                                                            <?= $this->Html->link(__('View'), ['action' => 'productview', $results->id], ['class' => 'btn btn-info']) ?>
                                                            <?= $this->Html->link(__('Edit'), ['action' => 'productedit', $results->id], ['class' => 'btn btn-primary']) ?>
                                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'productdelete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id), 'class' => 'btn btn-danger']) ?>
                                                        </td>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                            } else { ?>
                                                <tr>
                                                    <td colspan="5" class="text-center fw-bold">No Products To Show</td>
                                                </tr>
                                            <?php
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    <?php
                    } else {
                    ?>

                        <div class="row">
                            <?php

                            // dd(count($productList));
                            if (count($categoryList) > 0) {
                                foreach ($productList as $results) :
                                    $id = $results->id;
                            ?>
                                    <div class="col-6">
                                        <div class="card">
                                            <?php
                                            echo $this->Html->link(
                                                $this->Html->image($results->product_image, array('class' => 'product_card')),
                                                array('controller' => 'Users', 'action' => 'viewproduct', $id),
                                                array('class' => 'text-center mt-3', 'escape' => false)
                                            );
                                            ?>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?php
                                                    echo $this->Html->link(
                                                        $results->product_title,
                                                        array('controller' => 'Users', 'action' => 'viewproduct', $id),
                                                        array('escape' => false)
                                                    );
                                                    ?>
                                                </h5>
                                                <p class="card-text"><?= h($results->product_description) ?></p>
                                                <p class="card-text"><small class="text-muted">Posted On : <?= h($results->created_date) ?></small></p>
                                                <?= $this->Html->link("View", ['action' => 'viewproduct', $id], ['class' => 'btn btn-primary px-5']) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                            } else { ?>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">No Results To Show</p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }

                            ?>
                        </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-3">

                <!-- News & Updates Traffic -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Categories</h5>

                        <!-- <div class="news"> -->
                        <?php
                        // dd(count($categoryList));
                        if (count($categoryList) > 0) {
                        ?>
                            <h4 class="my-3 lead fw-bold">
                                <?= $this->Html->link(
                                    h('All Products'),
                                    array('controller' => 'Users', 'action' => 'index'),
                                    array('escape' => false)
                                ); ?>
                            </h4>
                            <?php
                            foreach ($categoryList as $list) :
                                if ($list->status == '1') {
                                    continue;
                                }
                            ?>
                                <div class="post-item clearfix">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="my-3 lead fw-bold">
                                                <!-- <?= h($list->category_name) ?> -->
                                                <?php
                                                echo $this->Html->link(
                                                    h($list->category_name),
                                                    array('controller' => 'Users', 'action' => 'index', $list->id),
                                                    array('escape' => false)
                                                );
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="my-3 lead fw-bold">
                                                <?php
                                                if ($list->status == 0) {
                                                    echo 'Available';
                                                } else {
                                                    echo 'Out Of Stock';
                                                }
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            endforeach;
                        } else { ?>
                            <div class="post-item clearfix">
                                <h4>No Categories To Show</h4>
                            </div>
                        <?php
                        }

                        ?>
                        <!-- </div> -->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->
        <?php
                    }
        ?>
        </div>
    </section>

</main><!-- End #main -->