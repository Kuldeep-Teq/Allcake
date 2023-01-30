<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use function PHPSTORM_META\type;

?>
<?php
$session = $this->request->getSession();
echo $session->read('name');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                echo $this->Form->control('image', ['type' => 'file']);
                echo $this->Form->control('full_name');
                echo $this->Form->control('gender');
                echo $this->Form->control('company');
                echo $this->Form->control('job');
                echo $this->Form->control('country');
                echo $this->Form->control('address');
                echo $this->Form->control('phone');
                echo $this->Form->control('email');
                echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>