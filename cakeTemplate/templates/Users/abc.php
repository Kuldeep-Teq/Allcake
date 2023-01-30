<?php
// echo '<pre>';
// foreach ($result as $results) {
//     echo $results->user;
// }
// // print_r($result->comment->user);
// die;
?><div class="container">
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
                                        <td></td>
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

                            // if ($result[0]['user_id'] == $result[0]['user']['id']) {
                            //     echo $result[0]['user']['full_name'] . " " . $result[0]['comment'];
                            // }

                            foreach ($result as $results) {
                                echo $results->user->full_name;
                                echo $results->comment;
                            }

                            ?>
                        </tbody> -->
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>