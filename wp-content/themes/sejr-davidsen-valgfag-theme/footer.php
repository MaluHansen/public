
<footer>
      <div class="footer-upper-row">
        <div class="footer-socialeMedia">
          <p class="footer-header">Sejr & Davidsen</p>
          <i class="fa-brands fa-square-instagram footer-icon"></i>
          <i class="fa-brands fa-square-facebook footer-icon"></i>
          <i class="fa-brands fa-square-x-twitter footer-icon"></i>
          <i class="fa-brands fa-square-youtube footer-icon"></i>
        </div>
        <div class="openinghours">
          <p>Mandag - Fredag: 8:30 - 16:00</p>
          <p>Lørdag - Søndag: 11:00 - 15:00</p>
        </div>
        <div class="footer-links-container">
          <div class="footer-links">
            <a href="<?php echo site_url('/index')?>">Forside</a>
            <a href="<?php echo site_url('/adopter')?>">Adopter</a>
            <a href="<?php echo site_url('/pension')?>">Pension</a>
            <a href="#">Hvem er vi</a>
            <a href="#">Træning</a>
          </div>
          <div class="footer-links">
            <a href="<?php echo site_url('/blog')?>">Blog & tips</a>
            <a href="<?php echo site_url('/hunde')?>">Alle Dyr</a>
            <a href="#">Indlever</a>
            <a href="#">Kontakt</a>
            <a href="#">Doner</a>
          </div>
        </div>
      </div>
      <hr />
      <div class="footer-bottom-row">
        <p><i class="fa-regular fa-copyright"></i> 2024. Sejr og Davidsen</p>
        <p>CVR: 12345678</p>
        <div>
          <p>Handelsbetingelser</p>
          <p>Brugsvilkår</p>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    <!-- Swiper JS cdn-->
    <!-- https://swiperjs.com/ -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/swiper.js"></script>
</body>
</html>