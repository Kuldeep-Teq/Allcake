<div class="container">
    <?= $this->Form->create(null, ['type' => 'file']); ?>
    <div class="row">
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('image', ['type' => 'file', 'required' => false]); ?>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('first_name', ['required' => false]); ?>
            <?= $this->Form->control('phone_number', ['required' => false]); ?>
            <?= $this->Form->control('password'); ?>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('last_name', ['required' => false]); ?>
            <?= $this->Form->control('email', ['type' => 'email', 'required' => false]); ?>
            <?= $this->Form->control('cnfrm_pswrd', ['type' => 'password', 'label' => 'Comfirm Password', 'required' => false]); ?>
        </div>
        <div class="col-md-12">
            <label>Gender</label>
            <?= $this->Form->radio('gender', ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Other'], ['class' => 'form-error', 'required' => false]); ?>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?= $this->Form->button('submit'); ?>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
    <?= $this->Form->end(); ?>
</div>