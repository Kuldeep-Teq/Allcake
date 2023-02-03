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
                                            if ($results->id == $user->id) {
                                                continue;
                                            }
                                    ?>
                                            <tr>
                                                <th scope="row"><?= $sno++ ?></th>
                                                <td class="fw-bold"><?= $this->Html->image(h($results->user_profile->profile_image), array('width' => '40px', 'class' => 'rounded-circle')) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->first_name) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->last_name) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->contact) ?></td>
                                                <td class="fw-bold"><?= h($results->user_profile->address) ?></td>
                                                <td class="fw-bold"><?= h($results->email) ?></td>
                                                <td class="fw-bold">
                                                    <?php
                                                    // if ($results->status == 0) {
                                                    //     // h($results->status);
                                                    //     echo 'ACTIVE';
                                                    // } else {
                                                    //     echo 'INACTIVE';
                                                    // }
                                                    // 
                                                    ?>
                                                    <?php if ($results->status == 0) : ?>
                                                        <?=
                                                        $this->Form->postLink(
                                                            __('Deactivate'),
                                                            ['action' => 'userStatus', $results->id, $results->status],
                                                            ['confirm' => __('Are You Sure you want to deactivate # {0}?', $results->id), 'class' => 'btn btn-primary', 'escape' => false, 'title' => 'Inactive']
                                                        ) ?>
                                                    <?php else : ?>
                                                        <?=
                                                        $this->Form->postLink(
                                                            __('Activate'),
                                                            ['action' => 'userStatus', $results->id, $results->status],
                                                            ['confirm' => __('Are You Sure you want to Activate # {0}?', $results->id), 'class' => 'btn btn-primary', 'escape' => false, 'title' => 'Aactive']
                                                        ) ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="fw-bold"><?= h($results->created_date) ?></td>
                                                <td class="fw-bold"><?= h($results->modified_date) ?></td>
                                                <td class="actions fw-bold">
                                                    <?= $this->Html->link(__('View'), ['action' => 'userview', $results->id], ['class' => 'btn btn-info']) ?>
                                                    <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $results->id], ['class' => 'btn btn-primary']) ?> -->
                                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'userdelete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id), 'class' => 'btn btn-danger']) ?>
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