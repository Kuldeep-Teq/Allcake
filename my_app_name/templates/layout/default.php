<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake123</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <!-- image('about-bg.png', ['alt' => 'about-bg']) -->
            <!-- image('about.jpg', ['alt' => 'about']) -->
            <!-- image('apple-touch-icon.png', ['alt' => 'apple-touch-icon']) -->
            <!-- image('cta.jpg', ['alt' => 'cta']) -->
            <!-- image('faq.jpg', ['alt' => 'faq']) -->
            <!-- image('favicon.png', ['alt' => 'favicon']) -->
            <!-- image('features-1.svg', ['alt' => 'features-1']) -->
            <!-- image('features-2.svg', ['alt' => 'features-2']) -->
            <!-- image('features-3.svg', ['alt' => 'features-3']) -->
            <!-- image('features-4.svg', ['alt' => 'features-4']) -->
            <!-- image('features-5.svg', ['alt' => 'features-5']) -->
            <!-- image('features-6.svg', ['alt' => 'features-6']) -->
            <!-- image('hero-bg.png', ['alt' => 'hero-bg']) -->
            <!-- image('hero-fullscreen-bg.jpg', ['alt' => 'hero-fullscreen-bg']) -->
            <!-- image('onfocus-content-bg.jpg', ['alt' => 'onfocus-content-bg']) -->
            <!-- image('onfocus-video-bg.jpg', ['alt' => 'onfocus-video-bg']) -->
            <!-- image('pricing-bg.jpg', ['alt' => 'pricing-bg']) -->
            <!-- image('services-1.jpg', ['alt' => 'services-1']) -->
            <!-- image('services-2.jpg', ['alt' => 'services-2']) -->
            <!-- image('services-3.jpg', ['alt' => 'services-3']) -->
            <!-- image('services-4.jpg', ['alt' => 'services-4']) -->
            <!-- image('services-5.jpg', ['alt' => 'services-5']) -->
            <!-- image('services-6.jpg', ['alt' => 'services-6']) -->
            <!-- image('testimonials-bg.jpg', ['alt' => 'testimonials-bg']) -->
            <!-- image('blog-1.jpg', ['alt' => 'blog-1']) -->
            <!-- image('blog-2.jpg', ['alt' => 'blog-2']) -->
            <!-- image('blog-3.jpg', ['alt' => 'blog-3']) -->
            <!-- image('blog-4.jpg', ['alt' => 'blog-4']) -->
            <!-- image('blog-5.jpg', ['alt' => 'blog-5']) -->
            <!-- image('blog-6.jpg', ['alt' => 'blog-6']) -->
            <!-- image('blog-author.jpg', ['alt' => 'blog-author']) -->
            <!-- image('blog-inside-post.jpg', ['alt' => 'blog-inside-post']) -->
            <!-- image('blog-recent-1.jpg', ['alt' => 'blog-recent-1']) -->
            <!-- image('blog-recent-2.jpg', ['alt' => 'blog-recent-2']) -->
            <!-- image('blog-recent-3.jpg', ['alt' => 'blog-recent-3']) -->
            <!-- image('blog-recent-4.jpg', ['alt' => 'blog-recent-4']) -->
            <!-- image('blog-recent-5.jpg', ['alt' => 'blog-recent-5']) -->
            <!-- image('comments-1.jpg', ['alt' => 'comments-1']) -->
            <!-- image('comments-2.jpg', ['alt' => 'comments-2']) -->
            <!-- image('comments-3.jpg', ['alt' => 'comments-3']) -->
            <!-- image('comments-4.jpg', ['alt' => 'comments-4']) -->
            <!-- image('comments-5.jpg', ['alt' => 'comments-5']) -->
            <!-- image('comments-6.jpg', ['alt' => 'comments-6']) -->
            <!-- image('client-1.png', ['alt' => 'client-1']) -->
            <!-- image('client-2.png', ['alt' => 'client-2']) -->
            <!-- image('client-3.png', ['alt' => 'client-3']) -->
            <!-- image('client-4.png', ['alt' => 'client-4']) -->
            <!-- image('client-5.png', ['alt' => 'client-5']) -->
            <!-- image('client-6.png', ['alt' => 'client-6']) -->
            <!-- image('client-7.png', ['alt' => 'client-7']) -->
            <!-- image('client-8.png', ['alt' => 'client-8']) -->
            <!-- image('hero-carousel-1.svg', ['alt' => 'hero-carousel-1']) -->
            <!-- image('hero-carousel-2.svg', ['alt' => 'hero-carousel-2']) -->
            <!-- image('hero-carousel-3.svg', ['alt' => 'hero-carousel-3']) -->
            <!-- image('app-1.jpg', ['alt' => 'app-1']) -->
            <!-- image('app-2.jpg', ['alt' => 'app-2']) -->
            <!-- image('app-3.jpg', ['alt' => 'app-3']) -->
            <!-- image('books-1.jpg', ['alt' => 'books-1']) -->
            <!-- image('books-2.jpg', ['alt' => 'books-2']) -->
            <!-- image('books-3.jpg', ['alt' => 'books-3']) -->
            <!-- image('branding-1.jpg', ['alt' => 'branding-1']) -->
            <!-- image('branding-2.jpg', ['alt' => 'branding-2']) -->
            <!-- image('branding-3.jpg', ['alt' => 'branding-3']) -->
            <!-- image('product-1.jpg', ['alt' => 'product-1']) -->
            <!-- image('product-2.jpg', ['alt' => 'product-2']) -->
            <!-- image('product-3.jpg', ['alt' => 'product-3']) -->
            <!-- image('team-1.jpg', ['alt' => 'team-1']) -->
            <!-- image('team-2.jpg', ['alt' => 'team-2']) -->
            <!-- image('team-3.jpg', ['alt' => 'team-3']) -->
            <!-- image('testimonials-1.jpg', ['alt' => 'testimonials-1']) -->
            <!-- image('testimonials-2.jpg', ['alt' => 'testimonials-2']) -->
            <!-- image('testimonials-3.jpg', ['alt' => 'testimonials-3']) -->
            <!-- image('testimonials-4.jpg', ['alt' => 'testimonials-4']) -->
            <!-- image('testimonials-5.jpg', ['alt' => 'testimonials-5']) -->
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>