<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <?= $this->Form->create($post, ['enctype' => 'multipart/form-data']) ?>
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Share Your Memories</span></h5>

                    <div class="d-flex align-items-center">
                        <?php echo $this->Form->control('image_file', ['type' => 'file', 'required' => 'false', 'class' => 'form-control']); ?>
                    </div>

                    <div class="d-flex align-items-center">
                        <?php echo $this->Form->control('name', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-4 my-2 mx-2">
                    <?= $this->Form->button(__('Submit'), ['class' => 'form-control']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>

        <div class="col-lg-4"></div>
    </div>
</section>