<?= $this->element('flash/header'); ?>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>