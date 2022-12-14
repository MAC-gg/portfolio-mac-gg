<?php get_header(); ?>
<!-- page-portfolio.php -->
<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); 
        $selected_header = get_field('header_paper_bg'); ?>
        <section id="page-header">
            <div class="container">
                <div class="header-paper-bg-img" style="background-image:url(<?php echo get_theme_file_uri('/img/header-paper-bg-' . $selected_header . '.png'); ?>)">
                    <div class="header-container">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="container portfolio-card-container">

            <?php $portfolio = new WP_Query(array(
                'post_type' => 'portfolio',
                'order' => 'ASC',
                'posts_per_page' => -1
            ));

            while($portfolio->have_posts()) {
                $portfolio->the_post(); 
                $origins = get_the_terms($portfolio->ID, 'origin');
                $origin_parent = get_term_by('term_id', $origins[0]->parent, 'origin');
                $origin_string = $origin_parent->name . " > " . $origins[0]->name;

                $skills = get_the_terms($portfolio->ID, 'skills');
                $skills_string = "";
                $count = 0;
                foreach ($skills as $skill) {
                    if($count <= 4) { // 4 start at 0 = 5
                        $skills_string .= "<span class='tag'>" . $skill->name . "</span>";
                        $count++;
                    } else {
                        $count++;
                    }
                }
                $skills_string .= ($count > 5 ? "<span class='tag'>+" . $count-5 . "</span>" : "");
                // $skills_string = "<span class='tag'>" . join("</span><span class='tag'>", wp_list_pluck($skills, 'name')) . "</span>";

                $back_card = get_field("back_card");
                $back_template = $back_card["template"];
                $back_img = $back_card["img"];

                $card_colors = get_field("card_colors");
                $brand_color = $card_colors["brand_color"];
                $text_color = $card_colors["text_color"];
                ?>

                <div class="flip portfolio-card">
                    <div class="front<?php echo " " . $text_color;?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                        <div class="front-background-overlay" style="<?php if ($brand_color) : ?>background:<?php echo $brand_color;?>;opacity:0.8;<?php endif; ?>"></div>
                        <p class="date"><?php echo get_the_date("F Y"); ?></p>
                        <h3><?php the_title(); ?></h3>
                        <p class="origin"><?php echo $origin_string; ?></p>
                        <p class="skill-tags"><?php echo $skills_string; ?></p>
                        <p class="cta"> to Preview</p>
                    </div>
                    <div class="back">
                        <?php if($back_template == "none"): ?>
                            <div class="back-template-none">
                                No Preview Available.
                            </div>
                        <?php else: ?>
                            <div class="back-img-container <?php echo $back_template; ?>">
                                <?php if($back_template == "img") : ?>
                                    <div class="back-img-foreground no-mobile-fancybox" data-fancybox="main" data-src="<?php echo $back_img["url"]; ?>"><img src="<?php echo $back_img["url"]; ?>" /></div>
                                    <div class="back-img-background" style='background-image:url(<?php echo $back_img["url"]; ?>);'></div>
                                <?php else : ?>
                                    <img src="<?php echo $back_img["url"]; ?>" />
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <!-- <?php if($back_template == "img") : ?>
                            <button class="btn btn-secondary no-mobile-fancybox" data-fancybox-trigger="main" data-src="<?php echo $back_img["url"]; ?>"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Enhance Image</button>
                        <?php endif; ?> -->
                        <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More&nbsp;&nbsp;<i class="fa-solid fa-angles-right"></i></a>
                    </div>
                </div>
            
            <?php } ?>
        </div>
    <?php endwhile; ?>
</main>
<?php get_footer(); // grabs Footer.php ?>