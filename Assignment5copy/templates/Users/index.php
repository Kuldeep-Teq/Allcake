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
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-title">All Products</span></h5>
                                        </div>
                                        <div class="col-6 ">
                                            <select class="form-select float-end mt-3" id="select" aria-label="Default select example">
                                                <option selected>Filter</option>
                                                <option value="0">Active</option>
                                                <option value="1">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <table class="table table-responsive" id="datatablesSimple">
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
                                                        <th scope="row"><?= $this->Html->image(h($results->product_image), array('class' => 'rounded-circle myproduct')) ?></th>
                                                        <th scope="row"><?= h($results->product_title) ?></th>
                                                        <td width='260px' class=" fw-bold discription"><?= h($results->product_description) ?></td>
                                                        <td class="fw-bold">
                                                            <?php if ($results->status == 0) : ?>
                                                                <?=
                                                                $this->Form->postLink(
                                                                    $this->Html->image('toggle-on.png', array('height' => '60px', 'class' => 'toggle')),
                                                                    ['action' => 'productStatus', $results->id, $results->status],
                                                                    ['confirm' => __('Are You Sure you want to deactivate {0}?', $results->product_title), 'escape' => false, 'title' => 'Active']
                                                                ) ?>
                                                            <?php else : ?>
                                                                <?=
                                                                $this->Form->postLink(
                                                                    $this->Html->image('toggle-off.png', array('height' => '60px', 'class' => 'toggle')),
                                                                    ['action' => 'productStatus', $results->id, $results->status],
                                                                    ['confirm' => __('Are You Sure you want to Activate {0}?', $results->product_title), 'escape' => false, 'title' => 'Deactive']
                                                                ) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-bold"><?= h($results->product_tags) ?></td>
                                                        <td class="fw-bold"><?= h($results->created_date) ?></td>
                                                        <td class="fw-bold">
                                                            <?php
                                                            if ($results->modified_date == null) {
                                                                echo '<span class="mx-5">---</span>';
                                                            } else {
                                                                echo h($results->modified_date);
                                                            }
                                                            ?>
                                                        </td>
                                                        <td width='160px' class="fw-bold">
                                                            <?= $this->Html->link('<i class="fa-solid fa-eye"></i><span class="sr-only">' . __('View') . '</span>', ['action' => 'productview', $results->id], ['escape' => false, 'title' => __('VIEW'), 'class' => 'btn btn-info']) ?>
                                                            <?= $this->Html->link('<i class="fa-sharp fa-solid fa-pen-to-square"></i><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'productedit', $results->id], ['escape' => false, 'title' => __('EDIT'), 'class' => 'btn btn-primary']) ?>
                                                            <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'productdelete', $results->id], ['confirm' => __('Are you sure you want to delete {0}?', $results->product_title), 'class' => 'btn btn-danger', 'escape' => false, 'title' => __('DELETE')]) ?>
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

                            // dd($categoryList);
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
                                                <p class="card-text">Category : <?= h($results->product_category->category_name) ?></p>
                                                <p class="card-text"><small class="text-muted">Added On : <?= h($results->created_date) ?></small></p>
                                                <p class="card-text">

                                                    <?php
                                                    //========== print like dislike ===========
                                                    $a = 0;
                                                    $b = 0;
                                                    foreach ($results->like_dislike as $count) :
                                                        $a = $a + $count->like_count;
                                                        $b = $b + $count->dislike;
                                                    ?>
                                                    <?php endforeach; ?>

                                                    <?= $this->Html->link('<i class="fa-solid fa-thumbs-up"></i><span class="sr-only">' . __('Like') . '</span>', ['action' => 'likeProducts', $id], ['escape' => false, 'title' => __('Like'), 'class' => 'btn btn-outline-primary', 'id' => 'like', 'data-id' => $results->id]) ?>
                                                    <!-- <div class="like-count"> -->
                                                    <span class="fw-bold text-dark mx-2"><?php echo $a ?></span>
                                                    <!-- </div> -->


                                                    <?= $this->Html->link('<i class="fa-solid fa-thumbs-down"></i><span class="sr-only">' . __('Dislike') . '</span>', ['controller' => 'users', 'action' => 'dislikeProducts', $id], ['escape' => false, 'title' => __('Dislike'), 'class' => 'btn btn-outline-primary']) ?>
                                                    <span class="fw-bold text-dark mx-2"><?php echo $b ?></span>
                                                </p>
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
                            foreach ($categoryDetails as $list) :
                                $i = 0;
                                foreach ($list->products as $product) {
                                    $i++;
                                }
                                if ($i > 0) {
                            ?>
                                    <div class="post-item clearfix">
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 class="my-3 lead fw-bold">
                                                    <!-- <?= h($list->category_name) ?> -->
                                                    <?php
                                                    echo $this->Html->link(
                                                        h($list->category_name) . '(' . $i . ')',
                                                        array('controller' => 'Users', 'action' => 'index', $list->id),
                                                        array('escape' => false)
                                                    );
                                                    ?>
                                                </h4>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="my-3 lead fw-bold">
                                                    <?php
                                                    echo 'Available';
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
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
<!-- <?= $this->Html->script('search') ?> -->

<script>
    // var csrfToken = $('meta[name="csrfToken"]').attr('content');
    // $(document).ready(function() {
    //     $('select').on('change', function() {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': csrfToken
    //             }
    //         });

    //         var data = $(this).val();
    //         // alert(data);
    //         $.ajax({
    //             url: "http://localhost:8765/users/index",
    //             data: {
    //                 'status': data
    //             },
    //             type: "json",
    //             method: "get",
    //             success: function(response) {
    //                 $('#datatablesSimple').html(response);
    //             }
    //         });

    //     });
    // });

    $('body').on('click', '#like', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        var product_id = $(this).attr("data-id");
        $.ajax({
            url: "/users/like-products?id=" + product_id,
            type: "JSON",
            method: "POST",
            success: function(response) {
                likes = $.parseJSON(response);
                var status = likes["status"];
                console.log(status);
                // if (status == "1") {
                //     $('span#like-count').load('/users/index #like-count');
                // } else if (status == "2") {
                //     $('.like-count').load('/users/index #like-count');
                // } else {
                //     $('span#like-count').load('/users/index #like-count');
                // }
            }
        });
        return false;
    });
</script>