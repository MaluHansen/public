<?php 
get_header('small'); ?>
<main>
    <div class="smallHeroContent">
        <h1 class="centeredHeroH1">BLOG & TIPS</h1>
    </div>
    <div class="blogArkivGrid">
    <img src="<?php echo get_theme_file_uri('/assets/img/blogArkivHero.jpg'); ?>" alt="" class="heroImageSmall"/>

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
                <h3><?php the_title() ?></h3>
                <p class="blogMainText">
                  <?php echo wp_trim_words(get_the_content(), 25);?>
                </p>
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
</main>
<?php
get_footer();
?>