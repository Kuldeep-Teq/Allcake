<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Add Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!--==================== Modal for updating category ================-->
    <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="updateCategory" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="updateCategory">Update Category</h5>
                </div>
                <?= $this->Form->create(null) ?>
                <div class="modal-body">
                    <div class="col-12 my-3">
                        <!-- <?php echo $this->Form->control('category_id', ['class' => 'form-control', 'type' => 'hidden', 'value' => $productCategory->id]); ?> -->
                        <!-- <?php echo $this->Form->control('category_name'); ?> -->
                        <?php echo $this->Form->control('category_name', ['required' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <!--===================== End Modal for updating category ===========================-->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <!--================================= form for adding category ==================== -->

                    <div class="card-body" id="addcategory">
                        <h5 class="card-title">Add Categories</span></h5>
                        <div class="col-6">
                            <?= $this->Form->create(null, ['id' => 'categoryForm', 'url' => ['action' => 'addcategory']]) ?>


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
                        <h5 class="card-title">All Categories</span></h5>

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">S. No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">no of Products </th>
                                    <!-- <th scope="col">Ajax Status </th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Modified On</th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 1;
                                // dd(count($categoryList));
                                if (count($categorycount) > 0) {
                                    foreach ($categoryList as $results) :
                                        $categoryid = $results->id;
                                ?>
                                        <tr>
                                            <th scope="row"><?= $sno++ ?></th>
                                            <td class="fw-bold"><?= h($results->category_name) ?></td>
                                            <?php
                                            $i = 0;
                                            foreach ($results->products as $product) {
                                                $i++;
                                            }
                                            ?>
                                            <th scope="row"><?= $i ?></th>
                                            <!-- <td class="align-middle text-center text-sm">
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="productlist" data-id="<?= $results->id ?>"><img src="/img/toggle-on.png" height='60px' class='toggle'></a>
                                                <input type="hidden" value="<?= $results->status ?>" id='status' name="status" />
                                            </td> -->
                                            <td class="fw-bold">
                                                <?php if ($results->status == 0 && $i > 0) {
                                                    //   Modal for product list 
                                                ?>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="productlist" data-id="<?= $results->id ?>"><img src="/img/toggle-on.png" height='60px' class='toggle'></a>

                                                <?php  } elseif ($results->status == 0 && $i == 0) { ?>
                                                    <?=
                                                    $this->Form->postLink(
                                                        $this->Html->image('toggle-on.png', array('height' => '60px', 'class' => 'toggle')),
                                                        ['action' => 'categoryStatus', $results->id, $results->status],
                                                        ['confirm' => __('Are You Sure you want to deactivate  {0}?', $results->category_name), 'escape' => false, 'title' => 'Active']
                                                    )
                                                    ?>
                                                <?php  } elseif ($results->status == 1 && $i > 0) { ?>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#ModalCenter" class="product" data-id="<?= $results->id ?>"><img src="/img/toggle-off.png" height='60px' class='toggle'></a>

                                                <?php } else { ?>
                                                    <?=
                                                    $this->Form->postLink(
                                                        $this->Html->image('toggle-off.png', array('height' => '60px', 'class' => 'toggle')),
                                                        ['action' => 'categoryStatus', $results->id, $results->status],
                                                        ['confirm' => __('Are You Sure you want to Activate  {0}?', $results->category_name), 'escape' => false, 'title' => 'Deactive']
                                                    ) ?>
                                                <?php } ?>
                                            </td>
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
                                            <td class="actions fw-bold">

                                                <?= $this->Html->link('<i class="fa-solid fa-eye"></i><span class="sr-only">' . __('View') . '</span>', ['action' => 'categoryview', $results->id], ['escape' => false, 'title' => __('VIEW'), 'class' => 'btn btn-info']) ?>

                                                <?= $this->Html->link('<i class="fa-sharp fa-solid fa-pen-to-square"></i><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'editcategory', $results->id], ['escape' => false, 'title' => __('EDIT'), 'class' => 'btn btn-primary']) ?>

                                                <!-- <?= $this->Html->link('<i class="fa-sharp fa-solid fa-pen-to-square"></i><span class="sr-only">' . __('Edit') . '</span>', ['action' => ''], ['escape' => false, 'title' => __('EDIT'), 'class' => 'btn btn-primary categorydata', 'id' => 'editcategory']) ?> -->

                                                <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'categorydelete', $results->id], ['confirm' => __('Are you sure you want to delete {0}?', $results->category_name), 'class' => 'btn btn-danger', 'escape' => false, 'title' => __('DELETE')]) ?>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                } else { ?>
                                    <tr>
                                        <td colspan="5" class="text-center fw-bold">No Categories To Show</td>
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

<!--================== Modal for showing list of active products for Deactivate category =============================-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->create() ?>
            <div class="modal-body">
                <h5>No of active Products :- <span id="countp" name="countp"></span></h5>
                <div id="myproduct">
                </div>
                <input type="hidden" id="cat_id" name="cat_id">
                <input type="hidden" id="cat_status" name="cat_status">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'prod']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!--===================== Modal for showing list of all products for avtivate category =========-->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->create() ?>
            <div class="modal-body">
                <div id="allproduct">
                </div>
                <input type="hidden" id="cate_id" name="cate_id">
                <input type="hidden" id="cate_status" name="cate_status">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'prode']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    //======== showing list of active products related to category for Deactivate ===========
    $(document).on("click", ".productlist", function() {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: "/users/ajaxshowproducts",
            data: {
                id: id
            },
            type: "JSON",
            method: "get",
            success: function(response) {
                product = $.parseJSON(response);
                var myHtml = "";
                var countp = 0;
                $('#cat_id').val(product['id']);
                $('#cat_status').val(product['status']);
                $.each(product, function(k, v) {

                    if (k == 'products') {
                        $.each($(this), function(index, value) {
                            if (value.status != 1) {
                                countp++;
                                myHtml += "<li><span>" + value.product_title + "</span></li>";
                                // console.log(value.product_title);
                            }
                        });
                    }
                });

                $("#myproduct").html(myHtml);
                $('#countp').html(countp);
            },
        });
    });

    //======== showing list of all products related to category for Activate ===========
    $(document).on("click", ".product", function() {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: "/users/ajaxshowproducts",
            data: {
                id: id
            },
            type: "JSON",
            method: "get",
            success: function(response) {
                product = $.parseJSON(response);
                var myproduct = "";
                $('#cate_id').val(product['id']);
                $('#cate_status').val(product['status']);
                $.each(product, function(k, v) {

                    if (k == 'products') {
                        $.each($(this), function(index, value) {
                            myproduct += "<li><input type='checkbox' value='" + value.id + "' name='product' >" + value.product_title + "</li>";
                            // console.log(value.product_title);
                        });
                    }
                });

                $("#allproduct").html(myproduct);
            },
        });
    });

    //======== deactivate category and all related products ===========
    $('body').on('click', '#prod', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        var status = $('#cat_status').val();
        var id = $('#cat_id').val();
        // if (status == 0) {
        //     $(this).val('1');
        // }
        $.ajax({
            url: "/users/ajaxproductStatus",
            type: "JSON",
            method: "POST",
            data: {
                'id': id,
                'status': status,
            },
            success: function(response) {
                alert(response)
            }
        });
        // return false;
    });


    //======== Activate category and selected products ===========
    $('body').on('click', '#prode', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        var status = $('#cate_status').val();
        var id = $('#cate_id').val();
        var pro = [];
        $.each($("input[name='product']:checked"), function() {
            pro.push($(this).val());
        });
        alert("Selected say(s) are: " + pro.join(", "));
        $.ajax({
            url: "/users/ajaxpStatusactive",
            type: "JSON",
            method: "POST",
            data: {
                'id': id,
                'status': status,
                'pro_id': pro,
            },
            success: function(response) {
                // alert(response)
            }
        });
        return false;
    });
</script>