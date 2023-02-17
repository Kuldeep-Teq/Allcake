<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Category Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card col-9">
            <div class="card-header">
                Details
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h1><?= h($category->category_name) ?></h1>
                    <footer class="blockquote-footer">
                        <?php
                        if ($category->status == '0') {
                            echo 'Active';
                        } else {
                            echo 'Deactive';
                        }
                        ?>
                        <p class="card-text my-4"><small class="text-muted"><?= h($category->created_date) ?></small></p>
                    </footer>
                    <?= $this->Html->link(__('Back'), ['action' => 'addcategory'], ['class' => 'btn btn-primary ']) ?>
                </blockquote>
            </div>
        </div>
    </section>

</main><!-- End #main -->