<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item fw-bold my-3 link-dark">
            <?= $this->Html->link("Dashboard", ['action' => 'index']) ?>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item fw-bold my-3 link-dark">
            <?= $this->Html->link("Profile", ['action' => 'profile', 'class' => 'drop-option']) ?>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->