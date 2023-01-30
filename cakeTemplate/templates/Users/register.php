<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body register-card">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            <?= $this->Form->create($user, ['id' => 'loginForm', 'url' => ['action' => 'register'], 'type' => 'file']) ?>
                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('image', ['type' => 'file', 'required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('full_name', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php
                                echo '<label>Gender</label>';
                                echo $this->Form->radio(
                                    'gender',
                                    [
                                        ['value' => 'Male', 'text' => 'Male', 'class' => 'radio-btn', 'checked' => true],
                                        ['value' => 'Female', 'text' => 'Female', 'class' => 'radio-btn']
                                    ],
                                    ['required' => 'false']
                                );
                                ?>

                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('company', ['required' => 'false', 'class' => 'form-control']); ?>

                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('job', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('country', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('address', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('phone', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('email', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('password', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('cnfirm_pswrd', ['required' => 'false', 'class' => 'form-control', 'label' => 'Confirm Password']); ?>

                            </div>

                            <div class="col-12 my-2">
                                <?= $this->Form->button(__('Submit'), ['class' => 'form-control']) ?>
                            </div>
                            <div class="col-12 my-2">
                                <p class="small mb-0">Already have an account? <?= $this->Html->link("Login in", ['action' => 'login']) ?></p>
                            </div>
                            <?= $this->Form->end() ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>