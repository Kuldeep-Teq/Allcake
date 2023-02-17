<main id="main" class="main">
    <?php echo $this->Flash->render()  ?>
    <div class="pagetitle">
        <h1>Product Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link("Home", ['action' => 'index']) ?></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3 col-9">
                <?= $this->Html->image(h($product->product_image), array('class' => 'card-img-top pro_image', 'alt' => 'product-image')) ?>
                <div class="card-body">
                    <h5 class="card-title">
                        <?= h($product->product_title) ?>
                    </h5>
                    <p class="card-text">T
                        <?= h($product->product_description) ?>
                    </p>
                    <p class="card-text"><small class="text-muted"><?= h($product->created_date) ?></small></p>
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </section>

</main>