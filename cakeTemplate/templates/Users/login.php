<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card login_card mb-3">

                        <div class="card-body">
                            <?= $this->Flash->render() ?>
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your email & password to login</p>
                            </div>

                            <?= $this->Form->create() ?>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('email', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-2">
                                <?php echo $this->Form->control('password', ['required' => 'false', 'class' => 'form-control']); ?>
                            </div>

                            <div class="col-12 my-3">
                                <?= $this->Form->button(__('Login'), ['class' => 'form-control']) ?>
                            </div>
                            <div class="col-12 my-3">
                                <p class="small mb-0">Don't have account? <?= $this->Html->link("Create an Account", ['action' => 'register']) ?></p>
                            </div>
                            <?= $this->Form->end() ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>