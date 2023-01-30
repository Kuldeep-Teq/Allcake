<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item ">
            <?= $this->Html->link("Dashboard", ['action' => 'index']) ?>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item ">
            <?= $this->Html->link("Profile", ['action' => 'profile']) ?>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item ">
            <?= $this->Html->link("New Post", ['action' => 'addpost']) ?>
        </li>
        <!-- End Profile Page Nav -->

        <!-- <li class="nav-item ">
            <?= $this->Html->link("Register", ['action' => 'register']) ?>
        </li> -->
        <!-- End Register Page Nav -->

        <li class="nav-item ">
            <?= $this->Html->link("Logout", ['action' => 'logout']) ?>
        </li><!-- End Login Page Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li> -->
        <!-- End Error 404 Page Nav -->

    </ul>

</aside><!-- End Sidebar-->