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
                    <label for="race">Race</label>
                    <select id="select" name="race">
                        <option value="alle">Alle</option>
                        <option value="bomuldshund">Bomuldshund</option>
                        <option value="husky">Husky</option>
                        <option value="golden retriever">Golden Retriever</option>
                        <option value="border collie">Border Collie</option>  
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
        );

        // If filters are applied, modify the query
        if ($has_filters) {
            foreach ($filter_navne as $filter) {
                if (isset($_GET[$filter]) && $_GET[$filter] !== 'alle') {
                    $hundeData['meta_query'][] = array(
                        'key' => $filter,
                        'value' => sanitize_text_field($_GET[$filter]),
                        'compare' => 'LIKE'
                    );
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
                                <p><?php the_field('race'); ?></p>
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