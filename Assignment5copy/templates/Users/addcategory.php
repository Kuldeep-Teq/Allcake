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

                    <!--=========================== form for update category ============================ -->

                    <!-- <div class="card-body" id="updatecategory">
                        <h5 class="card-title">Update Categories</span></h5>
                        <div class="col-6">
                            <?= $this->Form->create(null) ?>


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
                                <?= $this->Html->link(__('Back'), ['action' => 'addcategory'], ['class' => 'btn btn-primary'], ['id' => 'addform']) ?>
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?= $this->Form->end() ?>
                        </div>
                    </div> -->

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
                                if (count($categoryList) > 0) {
                                    foreach ($categoryList as $results) :
                                        $categoryid = $results->id;
                                ?>
                                        <tr>
                                            <th scope="row"><?= $sno++ ?></th>
                                            <td class="fw-bold"><?= h($results->category_name) ?></td>
                                            <td class="fw-bold">
                                                <?php if ($results->status == 0) :
                                                ?>
                                                    <?=
                                                    $this->Form->postLink(
                                                        $this->Html->image('toggle-on.png', array('height' => '60px', 'class' => 'toggle')),
                                                        ['action' => 'categoryStatus', $results->id, $results->status],
                                                        ['confirm' => __('Are You Sure you want to deactivate  {0}?', $results->category_name), 'escape' => false, 'title' => 'Active']
                                                    ) ?>
                                                <?php else : ?>
                                                    <?=
                                                    $this->Form->postLink(
                                                        $this->Html->image('toggle-off.png', array('height' => '60px', 'class' => 'toggle')),
                                                        ['action' => 'categoryStatus', $results->id, $results->status],
                                                        ['confirm' => __('Are You Sure you want to Activate  {0}?', $results->category_name), 'escape' => false, 'title' => 'Deactive']
                                                    ) ?>
                                                <?php endif; ?>
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


<!-- <script>
    $(document).ready(function() {
        $(".categorydata").click(function(e) {
            $("#updateCategory").show();
        });
    });
</script> -->