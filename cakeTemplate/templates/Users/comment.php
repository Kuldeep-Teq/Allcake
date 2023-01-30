<?php
// echo '<pre>';
// print_r($result[0]->post->id);
// die;
?>
<div class="container">
    <div class="col-xxl-12 col-md-6">
        <div class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Add Comment</h5>
                <?= $this->Html->image(h($postcmt->image), ['class' => 'post_image']) ?>
                <p><?= h($postcmt->name) ?></p>
                <?php $id = $postcmt->id ?>


                <?= $this->Form->create($addcmt) ?>
                <div class="col-md-6">
                    <?php echo $this->Form->control('comment', ['rows' => '3', 'cols' => '60', 'type' => 'textarea']); ?>
                    <?= $this->Form->button(__('Comment'), ['class' => 'form-control cmt-btn', 'action' => 'comment',  $id]) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <h5 class="card-title">All Comments</span></h5>

                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S. No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            // print_r(count($puser_cmt));
                            // die;
                            if (count($puser_cmt) > 0) {
                                foreach ($puser_cmt as $results) :
                            ?>
                                    <tr>
                                        <th scope="row"><?= $sno++ ?></th>
                                        <td><?= $results->user->full_name; ?></td>
                                        <td class="fw-bold"><?= $this->Html->image(h($results->user->image), array('width' => '20px')) ?></td>
                                        <td><?= h($results->comment) ?></td>
                                        <td><?= $this->Form->postLink(__('Delete'), ['action' => 'deletecmt', $results->id, $id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->comment), 'class' => 'btn btn-danger']) ?></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center fw-bold">Be the First Person To Comment</td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                        <!-- <tbody>
                            <?php
                            $sno = 1;
                            // print_r(count($comments->comments));
                            // die;
                            if (count($comments->comments) > 0) {
                                foreach ($comments->comments as $results) :
                            ?>
                                    <tr>
                                        <th scope="row"><?= $sno++ ?></th>
                                        <td><?= $results->user->full_name; ?></td>
                                        <td class="fw-bold"><?= $this->Html->image(h($results->user->image), array('width' => '20px')) ?></td>
                                        <td><?= h($results->comment) ?></td>
                                        <td><?= $this->Form->postLink(__('Delete'), ['action' => 'deletecmt', $results->id, $id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->comment), 'class' => 'btn btn-danger']) ?></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center fw-bold">Be the First Person To Comment</td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody> -->
                        <!-- <tbody>
                            <?php
                            $sno = 1;
                            // print_r(count($comments->comments));
                            // die;
                            if (count($result) > 0) {
                                foreach ($result as $results) :
                            ?>
                                    <tr>
                                        <th scope="row"><?= $sno++ ?></th>
                                        <td><?= $results->user->full_name; ?></td>
                                        <td class="fw-bold"><?= $this->Html->image(h($results->user->image), array('width' => '20px')) ?></td>
                                        <td><?= h($results->comment) ?></td>
                                        <td><?= $this->Form->postLink(__('Delete'), ['action' => 'deletecmt', $results->id, $id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->comment), 'class' => 'btn btn-danger']) ?></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center fw-bold">Be the First Person To Comment</td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody> -->
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>