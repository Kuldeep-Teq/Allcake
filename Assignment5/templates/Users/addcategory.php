<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="card-body">
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
                                ?>
                                        <tr>
                                            <th scope="row"><?= $sno++ ?></th>
                                            <td class="fw-bold"><?= h($results->category_name) ?></td>
                                            <td class="fw-bold">
                                                <!-- <?php
                                                        if ($results->status == 0) {
                                                            // h($results->status);
                                                            echo 'ACTIVE';
                                                        } else {
                                                            echo 'INACTIVE';
                                                        }
                                                        ?> -->
                                                <?php if ($results->status == 0) : ?>
                                                    <?=
                                                    $this->Form->postLink(
                                                        __('Active'),
                                                        ['action' => 'categoryStatus', $results->id, $results->status],
                                                        ['confirm' => __('Are You Sure you want to deactivate # {0}?', $results->id), 'class' => 'btn btn-primary', 'escape' => false, 'title' => 'Deactivate']
                                                    ) ?>
                                                <?php else : ?>
                                                    <?=
                                                    $this->Form->postLink(
                                                        __('Dective'),
                                                        ['action' => 'categoryStatus', $results->id, $results->status],
                                                        ['confirm' => __('Are You Sure you want to Activate # {0}?', $results->id), 'class' => 'btn btn-primary', 'escape' => false, 'title' => 'Activate']
                                                    ) ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="fw-bold"><?= h($results->created_date) ?></td>
                                            <td class="fw-bold">
                                                <?php
                                                if ($results->modified_date == null) {
                                                    echo '---';
                                                } else {
                                                    echo h($results->modified_date);
                                                }
                                                ?>
                                            </td>
                                            <td class="actions fw-bold">
                                                <?= $this->Html->link(__('View'), ['action' => 'categoryview', $results->id], ['class' => 'btn btn-info']) ?>
                                                <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $results->id], ['class' => 'btn btn-primary']) ?> -->
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'categorydelete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id), 'class' => 'btn btn-danger']) ?>
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