<?php
get_header('index'); ?>

<main>
  <div class="heroContent">
    <h1>Sejr & Davidsen</h1>
    <p>Dyrepension og -Internat</p>
    <p>
      Din betroede partner i at give dit kæledyr en tryg og kærlig
      tilværelse.
    </p>
    <p>Vi glæder os til at byde dig og dit kæledyr velkommen!</p>
  </div>

    <img
      src="<?php echo get_theme_file_uri('/assets/img/heroIndexSejrDavidsen.jpg'); ?>"
      alt=""
      class="heroImage"
    />

  <div class="indexEntryPointcontainer">
    <a href="<?php echo site_url('/adoption') ?>" class="indexEntryPoint">
      <div>
        <img
          src="<?php echo get_theme_file_uri('/assets/img/indexFocusedAdoption.jpg'); ?>"
          alt="Adoption"
          class="indexEntryImage"
        />
        <div class="indexoverlayText">
          <div class="indexEntryText">Adoption</div>
        </div>
      </div>
    </a>

    <a href="<?php echo site_url('/pension') ?>" class="indexEntryPoint">
      <div>
        <img
          src="<?php echo get_theme_file_uri('/assets/img/indexFocusedPension.jpg'); ?>"
          alt="Pension"
          class="indexEntryImage"
        />
        <div class="indexoverlayText">
          <div class="indexEntryText">Pension</div>
        </div>
      </div>
    </a>
  </div>

  <section class="cardSliderSection">
    <div class="cardSliderSectionText">
      <h2 class="cardSliderSection-header">Dyr som mangler et hjem</h2>
      <p>
        Hos Sejr & Davidsens Dyrepension og Internat har vi mange dejlige
        dyr, der længes efter et kærligt hjem. Ved at adoptere et af vores dyr,
        giver du dem muligheden for et trygt og kærligt liv.
      </p>
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
              <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?> " class="singularAnimalCardImage" />
                <div class="animalInfoCard">
                  <h3><?php the_title()?></h3>
                  <div class="animalInfoMeta">
                    <div class="iconText">
                      <i class="fa-solid fa-paw"></i>
                      <p><?php echo (get_the_terms($hunde->ID, 'race')[0]->name); ?></p>
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
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <a href="<?php echo site_url('/hunde') ?>" class="centeredButtonContainer">
      <button class="generalButtonStyling centeredButtonStylingWhite">
        ALLE DYR
      </button>
    </a>
  </section>

  <section class="textIntroSection" id="indlevering">
    <div class="textIntroSectionText">
      <h2>Akut indlevering</h2>
      <p>
        Har du fundet en herreløs hund eller kat? Så sørg for at sikre dyret
        og tjek, om det har ID-mærkning.
      </p>
      <br />
      <p>
        Du kan kontakte Sejr & Davidsens dyreinternat eller en anden
        dyrelæge for at få hjælp til at finde ejeren. Det kan også hjælpe at
        dele opslag på sociale medier.
      </p>
      <br />
      <p>
        Er du i tvivl om, hvad du skal gøre? Kontakt os, så hjælper vi dig
        videre.
      </p>
      <a href="#" class="centeredButtonContainer">
        <button class="generalButtonStyling">KONTAKT OS</button>
      </a>
    </div>
    <img src="<?php echo get_theme_file_uri('/assets/img/pensionGoldenRetriever.jpg'); ?>" alt="" />
  </section>

  <section class="cardSliderSection" id="blog">
  <div class="cardSliderSectionText">
          <h2>Seneste blog indlæg</h2>
          <p>Her kan du læse vores seneste blogindlæg!</p>
        </div>
  <div class="swiper mySwiper">
      <div class="swiper-wrapper">
          <?php
          //laver et query med et array der holder på alle post der er af postype 'hund'
          $indlæg = new WP_Query(array(
            'post_type' => 'blog',
            'posts_per_page' => -1
          ));
              
          //alle posts af typen 'hund' skal vises på siden
          while ($indlæg->have_posts()) {
          $indlæg->the_post(); ?>
            <div class="swiper-slide singularBlogCard">
              
              <button class="ButtonStylingBlogPost"><?php the_field('emne');?></button>
              <div class="blogCardContent">
                <h3><?php the_title() ?></h3>
                <p class="blogMainText">
                  <?php echo wp_trim_words(get_the_content(), 25);?>
                </p>
              </div>
                <div class="authorBlogCard">
                  <?php echo get_avatar(get_current_user_id()); ?>
                  <div>
                    <p><?php the_author() ?></p>
                    <p><?php echo get_the_date() ?></p>
                  </div>
                </div>
            </div>
          <?php } wp_reset_postdata(); ?>
      </div>
    </div>
          <a href="<?php echo site_url('/blog') ?>" class="centeredButtonContainer">
            <button class="generalButtonStyling centeredButtonStylingWhite">
              ALLE BLOGS
            </button>
          </a>
        </section>

  <section class="textIntroSection" id="traening">
    <img src="<?php echo get_theme_file_uri('/assets/img/jagt-treaning.jpg'); ?>" alt="" />
    <div class="textIntroSectionText">
      <h2>TRÆNING</h2>
      <p>Velkommen til Sejr & Davidsens dyrepension og -internat.</p>
      <br />
      <p>
        Vi hedder Merete Sejr og Jesper Davidsen og brænder for at hjælpe
        dyr med at finde deres rette hjem, og det er vores mål at forbinde
        kærlige mennesker med deres nye firbenede familiemedlem.
      </p>
      <br />
      <p>
        Hvert dyr fortjener en chance for et liv fyldt med omsorg, og vi er
        her for at gøre den proces så enkel og hjertevarm som muligt. Sammen
        kan vi gøre en forskel for både dyr og mennesker.
      </p>
      <a href="#" class="centeredButtonContainer">
        <button class="generalButtonStyling">MERE OM TRÆNING</button>
      </a>
    </div>
  </section>
</main>

<?php
get_footer();
?>