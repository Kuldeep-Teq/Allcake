    <main id="main" class="main">
        <?php echo $this->Flash->render()  ?>
        <div class="pagetitle">
            <h1>Users List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                    <li class="breadcrumb-item active">All Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Modal -->
        <div class="modal fade" id="ajaxeditUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    </div>
                    <?= $this->Form->create(null, ['id' => 'useredit', 'type' => 'file']) ?>
                    <div class="modal-body">
                        <!--============= hidden image and id if image is not updated ============ -->
                        <input type="hidden" id="imagedd" name="imagedd">
                        <input type="hidden" id="iddd" name="iddd">
                        <!--============= hidden image and id if image is not updated ============ -->

                        <img src="" alt="" id='showimg' width="100px">
                        <div class="col-12 my-3">
                            <?php echo $this->Form->control('user_profile.profile_image', ['type' => 'file']); ?>
                        </div>

                        <div class="col-12 my-3">
                            <?php echo $this->Form->control('user_profile.first_name'); ?>
                        </div>

                        <div class="col-12 my-3">
                            <?php echo $this->Form->control('user_profile.last_name'); ?>
                        </div>
                        <div class="col-12 my-3">
                            <?php echo $this->Form->control('user_profile.contact'); ?>
                        </div>
                        <div class="col-12 my-3">
                            <?php echo $this->Form->control('user_profile.address'); ?>
                        </div>
                        <div class="col-12 my-3">
                            <?php echo $this->Form->control('email'); ?>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">All Users</span>
                                <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary float-end']) ?>
                            </h5>
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">S. No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Contact No</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created On</th>
                                        <th scope="col">Modified On</th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sno = 1;
                                    // dd(count($users));
                                    if (count($users) > 0) {
                                        foreach ($users as $results) :
                                            if ($results->id == $user->id || $results->delete_status == "1") {
                                                continue;
                                            }
                                    ?>
                                            <tr>
                                                <th scope="row"><?= $sno++ ?></th>
                                                <td class="fw-bold"><?= $this->Html->image(h($results->user_profile->profile_image), array('width' => '40px', 'class' => 'profile_thumb rounded-circle')) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->first_name) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->last_name) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->contact) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->address) ?></td>
                                                <td class="fw-bold"><?= h($results->email) ?></td>
                                                <td class="fw-bold">
                                                    <?php if ($results->status == 0) : ?>
                                                        <?=
                                                        $this->Form->postLink(
                                                            $this->Html->image('toggle-on.png', array('height' => '60px', 'class' => 'toggle')),
                                                            ['action' => 'userStatus', $results->id, $results->status],
                                                            ['confirm' => __('Are You Sure you want to deactivate {0}?', $results->user_profile->first_name . ' ' . $results->user_profile->last_name), 'escape' => false, 'title' => 'Active']
                                                        ) ?>
                                                    <?php else : ?>
                                                        <?=
                                                        $this->Form->postLink(
                                                            $this->Html->image('toggle-off.png', array('height' => '60px', 'class' => 'toggle')),
                                                            ['action' => 'userStatus', $results->id, $results->status],
                                                            ['confirm' => __('Are You Sure you want to Activate {0}?', $results->user_profile->first_name . ' ' . $results->user_profile->last_name),  'escape' => false, 'title' => 'Deactive']
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
                                                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i><span class="sr-only">' . __('View') . '</span>', ['action' => 'userview', $results->id], ['escape' => false, 'title' => __('VIEW'), 'class' => 'btn btn-info']) ?>
                                                    <!-- <?= $this->Html->link('<i class="fa-sharp fa-solid fa-pen-to-square"></i><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'editProfile', $results->id], ['escape' => false, 'title' => __('EDIT'), 'class' => 'btn btn-primary']) ?> -->

                                                    <!-- <?= $this->Html->link('<i class="fa-sharp fa-solid fa-pen-to-square"></i><span class="sr-only">' . __('Edit') . '</span>', ['action' => '', 'id' => $results->id], ['escape' => false, 'title' => __('EDIT'), 'class' => 'btn btn-primary editUser', 'data-toggle' => 'modal', 'data-target' => '#editUser']) ?> -->

                                                    <!--=============== edit button for modal =========== -->
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#ajaxeditUser" class="btn btn-primary editUser" data-id="<?= $results->id ?>">Edit</a>

                                                    <!--======= hard delete ==== -->
                                                    <!-- <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'userdelete', $results->id], ['confirm' => __('Are you sure you want to delete {0}?', $results->user_profile->first_name . ' ' . $results->user_profile->last_name), 'escape' => false, 'title' => __('DELETE'), 'class' => 'btn btn-danger']) ?> -->

                                                    <!--======= delete using Ajax ==== -->
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-delete-user" data-id="<?= $results->id ?>">Delete</a>

                                                    <!-- <?= $this->Form->postLink(
                                                                '<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>',
                                                                ['action' => '#'],
                                                                [
                                                                    'data-id' => $results->id,
                                                                    'escape' => false,
                                                                    'title' => __('DELETE'), 'class' => 'btn btn-danger btn-delete-user',
                                                                    'href' => 'javascript:void(0)'
                                                                ]
                                                            ) ?> -->



                                                    <?php if ($results->delete_status == 0) : ?>
                                                        <?=
                                                        $this->Form->postLink(
                                                            '<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>',
                                                            ['action' => 'softDelete', $results->id, $results->delete_status],
                                                            ['confirm' => __('Are you sure you want to delete {0}?', $results->user_profile->first_name . ' ' . $results->user_profile->last_name), 'escape' => false, 'title' => __('DELETE'), 'class' => 'btn btn-danger']
                                                        ) ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                    } else { ?>
                                        <tr>
                                            <td colspan="5" class="text-center fw-bold">No Users To Show</td>
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


    </main><!-- End #main -->

    <!-- <?= $this->Form->postLink(
                '<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>',
                ['action' => 'javascript:void(0)'],
                [
                    'data-id' => $results->id,
                    'title' => __('DELETE'), 'class' => 'btn btn-danger btn-delete-user'
                ]
            ) ?> -->

    <!-- <a href="javascript:void(0)" class="btn btn-danger btn-delete-user" data-id="<?= $results->id ?>">Delete</a> -->