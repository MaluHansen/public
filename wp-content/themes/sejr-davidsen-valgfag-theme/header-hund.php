<!DOCTYPE html>
<html lang="en">
  <head>
  <?php wp_head();?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sejr & Davidsen</title>
    <meta name="description" content="" />
    <!-- Link Swiper's CSS -->
    <!-- https://swiperjs.com/  -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  </head>
  <body>
    <header class="header-animal">
      <div class="navbar-animal">
        <a href="./index.html" class="headerLogo-animal">Sejr & Davidsen</a>
        <nav class="navbarItems">
          <ul class="nav-ul-animal">
          <li><a href="<?php echo site_url('/index') ?>">Forside</a></li>
            <li><a href="<?php echo site_url('/adoption') ?>">Adopter</a></li>
            <li><a href="<?php echo site_url('/pension') ?>">Pension</a></li>
            <li><a href="#">Træning</a></li>
            <li><a href="#">Hvem er vi</a></li>
            <li><a href="<?php echo site_url('/blog') ?>">Blog & Tips</a></li>
            <li><a href="#">Indlever</a></li>
            <li><a href="#">Kontakt</a></li>
          </ul>
        </nav>
        <a href="#"><button class="generalButtonStyling">Donér</button></a>
      </div>

      <div class="breadcrumbs">
        <a href="<?php echo site_url('/adoption') ?>">Adopter </a>
        <a href="<?php echo site_url('/hunde') ?>">/ Alle dyr</a>
        <a href="<?php echo the_permalink()?>">/ <?php the_title()?></a>
      </div>
    </header>