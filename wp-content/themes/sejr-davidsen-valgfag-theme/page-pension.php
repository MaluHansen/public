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
      <a href="#" class="centeredButtonContainer">
        <button class="generalButtonStyling">BOOK OPHOLD</button>
      </a>
    </div>
  </section>

  <section>
    <div class="erfaring-sektion">
      <h2>De ansattes erfaring</h2>
      <div class="erfaring-container">
        <div class="erfaring-card">
          <div class="erfaring-card-header">
            <i class="fa-solid fa-user"></i>
            <h3>Merete Sejr</h3>
            <h4>Ejer</h4>
          </div>
          <div class="erfaring-card-body">
            <h4>Erfaring:</h4>
            <hr />
            <ul>
              <li>- Uddannet dyrelæge</li>
              <li>
                - Fagdyrelæge med speciale i sygdomme hos hunde og katte
              </li>
            </ul>
          </div>
          <div class="erfaring-card-knap">
            <button>LÆS MERE OM MERETE</button>
          </div>
        </div>
        <div class="erfaring-card">
          <div class="erfaring-card-header">
            <i class="fa-solid fa-user"></i>
            <h3>Jesper Davidsen</h3>
            <h4>Ejer</h4>
          </div>
          <div class="erfaring-card-body">
            <h4>Erfaring:</h4>
            <hr />
            <ul>
              <li>- Uddannet veterinærsygeplejerske</li>
              <li>- Specialist inden for dyreadfærd</li>
            </ul>
          </div>
          <div class="erfaring-card-knap">
            <button>LÆS MERE OM JESPER</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="priser-sektion">
    <h2>Priser og betingelser</h2>
    <div class="priser-container">
      <div class="priser-indhold">
        <h3>Hunde</h3>
        <hr />
        <div class="emne-og-priser">
          <div class="priser-emne">
            <p>1 hund (Boksstørrelse 8 m2)</p>
            <p>2 hunde i samme boks (Boksstørrelse 12 m2)</p>
            <p>3 hunde i samme boks (Boksstørrelse 16 m2)</p>
            <p>Dagpleje</p>
          </div>
          <div class="pension-priser">
            <p>210 DKK</p>
            <p>375 DKK</p>
            <p>510 DKK</p>
            <p>100 DKK</p>
          </div>
        </div>
        <h3>Katte</h3>
        <hr />
        <div class="emne-og-priser">
          <div class="priser-emne">
            <p>1 kat (Boksstørrelse 6 m2)</p>
            <p>2 katte i samme boks (Boksstørrelse 9 m2)</p>
            <p>3 katte i samme boks (Boksstørrelse 12 m2)</p>
            <p>Dagpleje</p>
          </div>
          <div class="pension-priser">
            <p>210 DKK</p>
            <p>375 DKK</p>
            <p>510 DKK</p>
            <p>100 DKK</p>
          </div>
        </div>
        <div class="pension-betingelser">
          <h4>Læs mere om vores betingelser <a href="#">her</a></h4>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="pension-galleri-header">
      <h2>Billeder fra stedet</h2>
    </div>
    <div class="pension-galleri-wrapper">
      <div class="pension-galleri-sektion">
        
          <div class="image-grid">
            <div class="main-image">
            <img src="<?php the_field('billede_1') ?>" alt="" />
            </div>
            <div class="small-images">
            <img src="<?php the_field('billede_2') ?>" alt="" />
            <img src="<?php the_field('billede_3') ?>" alt="" />
            <img src="<?php the_field('billede_4') ?>" alt="" />
            </div>
          </div>
        
        <button class="generalButtonStyling">Se flere billeder</button>
      </div>
    </div>
  </section>


</main>
    

<?php
get_footer();
?>