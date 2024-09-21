<?php 
get_header('small'); ?>
<main>
  <div class="smallHeroContent">
    <h1 class="centeredHeroH1"><?php the_title()?></h1>
  </div>
  <div >
  <img src="<?php the_field('billede_til_lille_hero') ?>" alt="" class="heroImageSmall" />
  </div>

  <section class="textIntroSection">
    <img src="<?php the_field('intro_billede') ?>" alt="" />
    <div class="textIntroSectionText">
      <p>
        <?php the_field('intro_tekst'); ?>
      </p>
    </div>
  </section>
</main>
<?php
get_footer();
?>