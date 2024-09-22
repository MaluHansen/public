<?php
get_header('hund'); ?>

<main>
  <div class="animalPadding">
    <div class="single-animal">
      <div class="single-animal-img">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>"/>
      </div>
      <div class="single-animal-content">
        <div class="single-animal-header">
          <h1><?php the_title();?></h1>
          <?php 
            //skal vise køn symbol ved siden af navn, bruger acf til at se hvilket køn der er valgt til den enkelte hund
            $konSymbol = get_field('kon');
            if ($konSymbol == 'Han') {
            echo '<i class="fa-solid fa-mars header-icon"></i>';
            } else {
            echo '<i class="fa-solid fa-venus header-icon"></i>'; 
            }
          ?>
        </div>
        <div class="single-animal-data">
          <div id="col-left">
            <p>Race: 
            <span>
              <?php 
                $race = wp_get_post_terms(get_the_ID(), 'race'); //henter de taxonimier (race) som er knyttet til post typen med det id som er den aktuelle side
                //wp_get_post_terms returnere altid et array med 'term' objekter med properties
                if ($race) {
                    echo $race[0]->name; //fordi $race er et array skal man bruge [0] for at tilgå den første 
                    //name er en properti fra term objektert som er det navn på selve taxonomien som jeg gerne vil have vist på siden
                 }
              ?>
            </span>

            </p>
            <p>Alder: <span><?php the_field('alder');?></span></p>
            <p>Vægt: <span><?php the_field('vaegt');?></span></p>
            <p>Højde: <span><?php the_field('hojde');?></span></p>
            <p>Vaccineret: <span><?php the_field('vaccineret');?></span></p>
            <p>Adoptions klar: 
              <span>
              <?php 
              //skal kun vise den valgte acf dato hvis den er højere end den aktuelle dato og dermed ikke er klar til at blive adopteret, ellers vis 'ja'
              $datoIdag = date('Ymd');
              $adoptionsklar = get_field('adoptionsklar');
      
              if ($adoptionsklar <= $datoIdag) {
              echo "<span>Ja</span>";
              } else {
              echo $adoptionsklar; 
              }
              ?>
              </span>
            </p>
          </div>
          <div id="col-right">
            <p>Kan med børn: <span><?php the_field('familievenlig');?></span></p>
            <p>Pelspleje: <span><?php the_field('pelspleje');?></span></p>
            <p>Energi niveau: <span><?php the_field('energi_niveau');?></span></p>
            <p>Allergi venlig: <span><?php the_field('allergivenlig');?></span></p>
            <p>Specialbehov: <span><?php the_field('specialbehov');?></span></p>
            <p>Pris: <span><?php the_field('pris');?></span></p>
          </div>
        </div>
      </div>
    </div>

    <div class="single-animal-under">
      <div class="single-animal-description">
      <?php echo the_content(); ?>
      </div>

      <div class="animal-meeting-book">
        <h2 class="animal-h2">Book et møde med <?php the_title();?></h2>
        <div class="calendar-form-section">
          <div class="form-section">
            <input type="text" id="name" placeholder="Navn" />
            <input type="email" id="email" placeholder="Email" />
            <input type="tel" id="phone" placeholder="Telefon" />
            <p>
              Vælg en af de ledige datoer. Vi vender tilbage med bekræftelse
            </p>
            <div class="checkboxes">
              <p>Hvor kan vi kontakte dig:</p>
              <label class="checkbox-container">
                Mobil
                <input type="checkbox" id="contact-phone" />
                <span class="checkbox-style"></span>
              </label>
              <label class="checkbox-container">
                Email
                <input type="checkbox" id="contact-email" />
                <span class="checkbox-style"></span>
              </label>
            </div>
          </div>

          <div class="calendar-section">
            <h3 class="calendar-header"></h3>
            <div class="calendar">
              <div class="days">
                <p>Man</p>
                <p>Tirs</p>
                <p>Ons</p>
                <p>Tors</p>
                <p>Fre</p>
                <p>Lør</p>
                <p>Søn</p>
              </div>
              <div class="dates" id="dates-grid"></div>
            </div>
            <div class="bottom-bar">
              <div class="selectedDate"><p>Valgt Dato</p></div>
              <button class="generalButtonStyling">Bekræft</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
            
    <a href="<?php echo site_url('/hunde') ?>" class="centeredButtonContainer">
      <button class="generalButtonStyling">
        ALLE DYR
      </button>
    </a>
  </section>
</main>
<?php get_footer(); ?>