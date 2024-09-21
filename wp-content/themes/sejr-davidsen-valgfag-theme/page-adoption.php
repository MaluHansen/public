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

  <section class="adoptions-proces">
      <h2>Adoptionsprocessen og vores andre gode råd</h2>
      <div class="adoptions-proces-container">
        <article>
          <p>1.</p>
          <i class="fa-solid fa-paw"></i>
          <h3>Find det rette kæledyr</h3>
          <p>
            Udforsk vores database af katte og hunde. Brug filtre som alder, størrelse og personlighed for at finde det perfekte match til din livsstil.
          </p>
        </article>
        <article>
          <p>2.</p>
          <i class="fa-solid fa-clipboard-list"></i>
          <h3>Ansøgningsprocessen</h3>
          <p>
            Når du har fundet et dyr som passer ind i dit hjem, kan du booke en tid til et møde med dyret.
            Mødet foregår hos os for at se om kemien er der, og skulle i vælge at sige ja,
            udfylder vi sammen adoptinsparpirene og sikre os det bedste hjem for dit nye kæledyr.
          </p>
        </article>
        <article>
          <p>3.</p>
          <i class="fa-solid fa-bone"></i>
          <h3>Forberedelse</h3>
          <p>
            Forbered dit hjem til det nye kæledyr. Sørg for mad, legetøj og en
            tryg atmosfære. Du kan læse mere i vores blog om hvad vi anbefaler 
            Vi tilbyder også rådgivning om integration og pleje.
          </p>
        </article>
      </div>
    </section>

  <section class="cardSliderSectionNoBackground">
    <div class="cardSliderSectionText">
    <h2 class="cardSliderSection-header">Dyr som mangler et hjem</h2>

    </div>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
        //laver et query med et array der holder på alle post der er af postype 'hund'
        $hunde = new WP_Query(array(
          'post_type' => 'hund',
          'posts_per_page' => -1
        ));
        //alle posts af typen 'hund' skal vises på siden
        while ($hunde->have_posts()) {
          $hunde->the_post(); ?>
          <div class="swiper-slide singularAnimalCard">
          <img
          src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?> "
          class="singularAnimalCardImage" />

            <div class="animalInfoCard">
              <h3><?php the_title()?></h3>
              <div class="animalInfoMeta">
                <div class="iconText">
                  <i class="fa-solid fa-paw"></i>
                  <p><?php the_field('race');?></p>
                </div>
                <div class="iconText">
                  <i class="fas fa-birthday-cake"></i>
                  <p><?php the_field('alder');?></p>
                </div>
                <div class="iconText">
                  <i class="fa-solid fa-venus-mars"></i>
                  <p><?php the_field('kon');?></p>
                </div>
              </div>
              <a class="animalInfoCardButton" href="<?php the_permalink(); ?>">LÆS MERE</a>
            </div>
          </div>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>
    

      <a href="<?php echo site_url('/hund') ?>" class="centeredButtonContainer">
        <button class="generalButtonStyling">
          ALLE DYR
        </button>
      </a>
  </section>
</main>
<?php
get_footer();
?>