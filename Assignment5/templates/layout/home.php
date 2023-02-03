<?= $this->element('flash/header'); ?>
<?= $this->element('flash/nav'); ?>
<?= $this->element('flash/sidebar'); ?>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
<?= $this->element('flash/footer'); ?>