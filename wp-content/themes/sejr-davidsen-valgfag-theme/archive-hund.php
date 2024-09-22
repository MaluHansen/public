<?php get_header('small'); ?>
<main>
    <div class="smallHeroContent">
        <h1 class="centeredHeroH1">GIV VORES DYR ET HJEM</h1>
    </div>
    <img src="<?php echo get_theme_file_uri('/assets/img/dyreArkivHero.jpg'); ?>" alt="" class="heroImageSmall"/>
    <div class="dyreArkivContainer">
        <div class="dyreArkivFilterContainer">
            <div class="buttonCatDogContainer">
                <button
                class="buttonCatDog"
                id="button1"
                onclick="selectButton('button1')"
                >
                <div class="iconCircle">
                    <i class="fas fa-dog"></i>
                </div>
                <span>Hunde</span>
                </button>
                <button
                class="buttonCatDog"
                id="button2"
                onclick="selectButton('button2')"
                >
                <div class="iconCircle">
                    <i class="fas fa-cat"></i>
                </div>
                <span>Katte</span>
                </button>
            </div>
            <div class="arkivDyrfilter">
                <h2>Filtrer din søgning</h2>
                <form id="filter-form" method="GET" action="<?php echo esc_url(home_url('/hunde')); ?>">
                    <div class="arkivFilterItem">
                    <!-- race filteret skal være dynamisk og bruge en taxonimi istedte for at være et stykke tekst
                     race filer knappen som brugeren ser skal også opdatere automatisk så man ikke skla ind og opdatere options i html
                     hver gang der kommer en ny hund med en race som ikke findes i forvejen
                     -->
                    <label for="race">Race</label>
                    <select id="select" name="race">
                        <option value="alle">Alle</option>
                        <?php
                        // alle racerne fra taksonomien 'race' gemmes i racer
                        $racer = get_terms(array(
                            'taxonomy' => 'race',
                        ));

                        // loop igennem racer og for hver race skal der oprettes en ny option
                        if ($racer) {
                            foreach ($racer as $race) {
                                //valuen af optionen skal være racens slug, som er angivet i taxonimien, det er forskelligt for hver race
                                //det som skal vises i filteret er racens navn som er det som også er i taxonimien
                                //punktummer her bruges til at sammenkæde sen statiske html (option tag) og mine variabler, uden dem kan php ikke vide at html og variable skal sættes sammen til et 
                                echo '<option value="' . ($race->slug) . '">' . ($race->name) . '</option>';
                            }
                        }
                        ?>
                    </select>


                    <label for="kon">Køn</label>
                    <select id="select" name="kon">
                        <option value="alle">Alle</option>
                        <option value="han">Han</option>
                        <option value="hun">Hun</option>   
                    </select>

                    <label for="allergivenlig">Allergivenlig</label>
                    <select id="select" name="allergivenlig">
                        <option value="alle">Alle</option>
                        <option value="ja">Ja</option>
                        <option value="nej">Nej</option>   
                    </select>

                    <label for="familievenlig">Kan med børn</label>
                    <select id="select" name="familievenlig">
                        <option value="alle">Alle</option>
                        <option value="ja">Ja</option>
                        <option value="nej">Nej</option>   
                    </select>

                    <label for="pelspleje">Pelspleje</label>
                    <select id="select" name="pelspleje">
                        <option value="alle">Alle</option>
                        <option value="lidt">Lidt</option>
                        <option value="medium">Medium</option>  
                        <option value="meget">Meget</option> 
                    </select>

                    <label for="energi_niveau">Energi Niveau</label>
                    <select id="select" name="energi_niveau">
                        <option value="alle">Alle</option>
                        <option value="lavt">Lavt</option>
                        <option value="medium">Medium</option>  
                        <option value="højt">Højt</option>
                        <option value="meget højt">Meget Højt</option>
                    </select>

                    <label for="adoptionsklar">Adoptionsklar</label>
                    <select id="select" name="adoptionsklar">
                        <option value="alle">Alle</option>
                        <option value="ja">Ja</option>
                        <option value="nej">Nej</option>
                    </select>

                    <label for="kon">Vægt</label>
                    <select id="select" name="kon">
                        <option value="alle">Alle</option>
                        <option value="han">Han</option>
                        <option value="hun">Hun</option>   
                    </select>

                    <label for="kon">Højde</label>
                    <select id="select" name="kon">
                        <option value="alle">Alle</option>
                        <option value="han">Han</option>
                        <option value="hun">Hun</option>   
                    </select>
                    </div>
            
                    <div class="filterButtonContainer">
                        <button type="submit" class="filterButton">Filtrer</button>
                        <button class="filterButton"><a href="<?php echo esc_url(home_url('/hunde')); ?>">Fjern alle filtre</a></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="dyreArkivGrid">
        <?php
        // array med filternavne
        $filter_navne = ['race', 'kon', 'allergivenlig', 'familievenlig', 'pelspleje', 'energi_niveau'];

        // checker om der er nogen filtre som passer den enkelte hund
        $has_filters = false;
        foreach ($filter_navne as $filter) {
            if (isset($_GET[$filter])) {
                $has_filters = true;
                break; //stopper når et filter bliver fundet
            }
        }

        // laver et array med data om posttypen hund
        $hundeData = array(
            'post_type' => 'hund',
            'posts_per_page' => '18',
            'meta_query' => array('relation' => 'AND'),
            'tax_query' => array()
        );

        //hvis et filter matcher skal tax/meta-query opdateres med den nye data
        if ($has_filters) {
            foreach ($filter_navne as $filter) {
                if (isset($_GET[$filter]) && $_GET[$filter] !== 'alle') {
                    
                    if ($filter === 'race') {
                        // Tilføj tax_query for racen
                        $hundeData['tax_query'][] = array(
                            'taxonomy' => 'race',
                            'field'    => 'slug',
                            'terms'    => sanitize_text_field($_GET[$filter]),
                        );
                    } else {
                        // Tilføj meta_query for de andre filtre
                        $hundeData['meta_query'][] = array(
                            'key'     => $filter,
                            'value'   => sanitize_text_field($_GET[$filter]),
                            'compare' => 'LIKE'
                        );
                    }
                }
            }
        }

        
        $hunde = new WP_Query($hundeData);//laver et nye query og bruger hundedata som argument for data

        if ($hunde->have_posts()) {
            while ($hunde->have_posts()) {
                $hunde->the_post(); ?>
                <div class="singularAnimalCardArchive">
                    <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?> " class="singularAnimalCardArchiveImg" />
                    <div class="animalInfoCardArchive">
                        <h3><?php the_title(); ?></h3>
                        <div class="animalInfoMeta">
                            <div class="iconText">
                                <i class="fa-solid fa-paw"></i>
                                <p><?php echo (get_the_terms($hunde->ID, 'race')[0]->name); ?></p>
                            </div>
                            <div class="iconText">
                                <i class="fas fa-birthday-cake"></i>
                                <p><?php the_field('alder'); ?></p>
                            </div>
                            <div class="iconText">
                                <i class="fa-solid fa-venus-mars"></i>
                                <p><?php the_field('kon'); ?></p>
                            </div>
                        </div>
                        <a  class="animalInfoCardGridButton" href="<?php the_permalink(); ?>">LÆS MERE</a>
                       
                        
                    </div>
                </div>
                <?php }
                } else {
                    echo '<p>No results found.</p>';
                }
                wp_reset_postdata(); //efter at have loopet igennem alle
                ?>
                <a href="#" class="centeredButtonContainer">
            <button class="generalButtonStyling">INDLÆS FLERE</button>
          </a>
        </div>
    </div>
</main>
<?php get_footer();