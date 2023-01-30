<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css(['bootstrap.min.css']) ?>
</head>

<body>
    <?= $this->element('flash/nav') ?>
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <?= $this->Html->script(['bootstrap.min.js']) ?>
    <?= $this->Html->script(['bundel.min.js']) ?>
</body>

</html>