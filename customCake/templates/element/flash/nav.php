 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">
             <?php echo $this->Html->image('icon.png', ['alt' => 'CakePHP', 'width' => '30px']); ?>
             Navbar
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                 <li class="nav-item mx-3">
                     <?= $this->Html->link(__('Login'), (['action' => 'login', 'class' => 'nav-link'])) ?>
                 </li>
                 <li class="nav-item mx-3">
                     <?= $this->Html->link(__('Register'), (['action' => 'register', 'class' => 'nav-link'])) ?>
                 </li>
                 <li class="nav-item mx-3">
                     <?= $this->Html->link(__('logout'), (['action' => 'logout', 'class' => 'nav-link'])) ?>
                 </li>
             </ul>
         </div>
     </div>
 </nav>