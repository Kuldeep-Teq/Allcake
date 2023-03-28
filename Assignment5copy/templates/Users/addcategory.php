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

                        <table class="table table-striped table-hover cat-table">
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
            <div class="modal-header bg-dark text-white fw-bold">
                <h5 class="modal-title" id="exampleModalLongTitle">Deactivate Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->create() ?>
            <div class="modal-body">
                <h5>category has <span class="fw-bold text-dark" id="countp" name="countp"></span> active Products</h5>
                <div id="myproduct">
                </div>
                <input type="hidden" id="cat_id" name="cat_id">
                <input type="hidden" id="cat_status" name="cat_status">
            </div>
            <div class="modal-footer">
                <?= $this->Form->button(__('Deactive'), ['class' => 'btn btn-primary', 'id' => 'prod']) ?>
                OR <button class="btn btn-primary MoveProducts" data-id="" id="MoveProducts" data-dismiss="modal" data-toggle="modal" data-target="#MoveToOther">Move Products To Other Category</button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!--===================== Modal for showing list of all products for activate category =========-->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white fw-bold">
                <h5 class="modal-title" id="exampleModalLongTitle">Activate Category</h5>
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

<!-- ====================== Modal for move products to other category =========== -->
<div class="modal fade" id="MoveToOther" tabindex="-1" role="dialog" aria-labelledby="MoveToOtherTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white fw-bold">
                <h5 class="modal-title" id="MoveToOtherTitle">Move Products To Other Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= $this->Form->create() ?>
            <div class="modal-body">
                <div id="allcategory">
                </div>

                <input type="hidden" id="category-id" name="category-id">
                <select class="form-select list" aria-label="Default select example" name="list" id="product-list">
                    <!-- <option selected>Select</option> -->
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" data-dismiss="modal">Back</button>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'add']) ?>
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
                // console.log(product);
                var myHtml = "";
                var countp = 0;
                $('#cat_id').val(product['id']);
                $('#cat_status').val(product['status']);
                $('#MoveProducts').attr('data-id', product['id']);
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
        swal({
            title: "Are you sure?",
            text: "You Want To Deactivate Category Along With Products",
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {

                $.ajax({
                    url: "/users/ajaxproductStatus",
                    type: "JSON",
                    method: "POST",
                    data: {
                        'id': id,
                        'status': status,
                    },
                    success: function(response) {
                        // alert(response)
                        $('#exampleModalCenter').hide();
                        $('.modal-backdrop').remove();
                        // swal("Success!", "Category And All Products Deactive Successfully!");
                        $('.cat-table').load('/users/addcategory .cat-table');
                    }
                });

                swal({
                    title: 'Deactivated!',
                    text: 'Category And All Products Deactive Successfully!',
                    icon: 'success'
                }).then(function() {



                    form.submit(); // <--- submit form programmatically

                });
            } else {
                swal("Cancelled", "Deactivation is cancelled", "error");
                // $('#exampleModalCenter').hide();
                // $('.modal-backdrop').remove();
            }
        })



        return false;
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
        // alert("Selected say(s) are: " + pro.join(", "));

        swal({
            title: "Are you sure?",
            text: "You Want To Activate Category and Selected Products!",
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {

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
                        $('#ModalCenter').hide();
                        $('.modal-backdrop').remove();
                        // swal("Success!", "Category and Selected Products Activated Successfully!");
                        $('.cat-table').load('/users/addcategory .cat-table');
                    }
                });

                swal({
                    title: 'Activated!',
                    text: 'Category and Selected Products Activated Successfully!',
                    icon: 'success'
                }).then(function() {
                    form.submit(); // <--- submit form programmatically
                });
            } else {
                swal("Cancelled", "Activation is cancelled", "error");
                $('#ModalCenter').hide();
                $('.modal-backdrop').remove();
            }
        })


        return false;
    });

    //============= ajax for listing category in modal to add products of deactive category ======
    $(document).on("click", ".MoveProducts", function() {
        var categoryId = $(this).attr('data-id');
        // console.log(categoryId);
        var id = $('#category-id').val(categoryId);
        $.ajax({
            url: "/users/category?id=" + categoryId,
            type: "JSON",
            method: "get",
            success: function(response) {
                category = $.parseJSON(response);
                // var categoryList = "";
                $('#product-list').empty();
                $.each(category, function(k, v) {
                    // console.log(v['category_name']);
                    // if( != "dd")

                    // $('#product-list').append("<option value='" + v["id"] + "' name='product' >" + v["category_name"] + "</option>");

                    $.each($(this), function(index, value) {
                        // console.log(this);
                        if (categoryId != value.id) {
                            $('#product-list').append("<option value='" + value.id + "' name='aad-product' id='aad-product' >" + value.category_name + "</option>");
                        }
                        //categoryList += "<li><input type='radio' value='" + value.id + "' name='product' >" + value.category_name + "</li>";

                    });
                });


                //$("#allcategory").html(categoryList);
            },
        });
    });


    //======== Move Products to Selected Category ===========
    $('body').on('click', '#add', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        var disableId = $('#category-id').val();
        // alert(disableId);
        name = $('#product-list :selected').text();
        var option = '';
        option = $('#product-list :selected').val();
        // console.log(option);
        // alert('selected category is ' + option);
        // return false;


        swal({
            title: "Are you sure?",
            text: "You Want To Add Products to " + name,
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {

                $.ajax({
                    url: "/users/moveProduct?id=" + disableId,
                    type: "JSON",
                    method: "POST",
                    data: {
                        'selected': option,
                    },
                    success: function(response) {
                        // alert(response)
                        $('#MoveToOther').hide();
                        $('.modal-backdrop').remove();
                        $('.cat-table').load('/users/addcategory .cat-table');
                    }
                });

                swal({
                    title: 'Success!',
                    text: 'Products Moved To Selected Category Successfully!',
                    icon: 'success'
                })
                // .then(function() {
                //     form.submit(); // <--- submit form programmatically
                // });
            } else {
                swal("Cancelled", "Category is not Moved", "error");
                // $('#ModalCenter').toggle();
                // $('.modal-backdrop').remove();
            }
        })


        return false;
    });

    // $(document).ready(function() {
    //     $("select.list").change(function() {
    //         var value = $(this).children("option:selected").val();
    //         alert("You have selected the value - " + value);
    //     });
    // });
</script>