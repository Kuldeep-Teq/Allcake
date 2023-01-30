<?= $this->element('flash/header'); ?>
<?= $this->element('flash/nav'); ?>
<?= $this->element('flash/sidebar'); ?>
<main id="main" class="main">

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</main><!-- End #main -->
<?= $this->element('flash/footer'); ?>