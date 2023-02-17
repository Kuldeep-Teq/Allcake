    <main id="main" class="main">
        <?php echo $this->Flash->render()  ?>
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <?= $this->Html->image(h($user->user_profile->profile_image), array('class' => 'rounded-circle', 'alt' => 'Profile')) ?>
                            <h2><?= $user->user_profile->first_name . ' ' . $user->user_profile->last_name; ?></h2>
                            <h3>
                                <?php
                                if ($user->user_type == 0) {
                                    echo $user_type = '<h3>ADMIN</h3>';
                                } else {
                                    echo $type = '<h3>USER</h3>';
                                }
                                ?>
                            </h3>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button> -->
                                    <!-- <?= $this->Html->link(__('Edit Profile'), ['action' => 'editprofile', $user->id], ['class' => 'nav-link', 'data-bs-toggle' => 'tab', 'data-bs-target' => '#profile-edit']) ?> -->
                                    <?= $this->Html->link(__('Edit Profile'), [$user->id], ['class' => 'nav-link userdetail']) ?>
                                    <?php echo $this->Form->control('hidden', ['id' => 'hidden', 'class' => 'form-control', 'type' => 'hidden', 'value' => $user->id]); ?>
                                </li>
                            </ul>

                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">First Name</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?= $user->user_profile->first_name; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Last Name</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?= $user->user_profile->last_name; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact No</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?= $user->user_profile->contact; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?= $user->user_profile->address; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?= $user->email; ?>
                                        </div>
                                    </div>

                                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary ']) ?>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9">
                                            <?php echo $this->Form->control('user_profile.profile_image', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9">
                                            <?php echo $this->Form->control('user_profile.first_name', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9">
                                            <?php echo $this->Form->control('user_profile.last_name', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9">
                                            <?php echo $this->Form->control('user_profile.contact', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9">
                                            <?php echo $this->Form->control('user_profile.address', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-lg-9">
                                            <?php echo $this->Form->control('email', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>

                                    <?= $this->Form->button(__('Update'), ['class' => 'btn btn-primary']) ?>

                                    <?= $this->Form->end() ?>
                                    <!-- End Profile Edit Form -->

                                </div>


                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <script>
        $(document).ready(function() {
            $('.userdetail').click(function(e) {
                e.preventDefault();
                // alert('dddddddddd');
                var uid = $(this).next('input').val();
                $.ajax({});
            });
        });
    </script>