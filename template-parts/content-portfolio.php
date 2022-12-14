<?php
    $origins = get_the_terms($portfolio->ID, 'origin');
    $origin_parent = get_term_by('term_id', $origins[0]->parent, 'origin');
    $origin_string = $origin_parent->name . " > " . $origins[0]->name;
    
    $skills = get_the_terms($portfolio->ID, 'skills');
    $skills_string = "<span class='spaced tag'>" . join("</span><span class='spaced tag'>", wp_list_pluck($skills, 'name')) . "</span>";
    
    $back_card = get_field("back_card");
    $back_template = $back_card["template"];
    $back_img = $back_card["img"];
    
    $card_colors = get_field("card_colors");
    $brand_color = $card_colors["brand_color"];
    $text_color = $card_colors["text_color"];

    $link = get_field("link");
?>
<!-- CONTENT-PORTFOLIO.PHP -->
<section id="main-content">
    <div class="container">
        <div class="single-portfolio-card-container">
            <div class="flip portfolio-card">
                <div class="front<?php echo " " . $text_color;?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                    <div class="front-background-overlay" style="<?php if ($brand_color) : ?>background:<?php echo $brand_color;?>;opacity:0.8;<?php endif; ?>"></div>
                    <p class="date"><?php echo get_the_date("F Y"); ?></p>
                    <h3><?php the_title(); ?></h3>
                    <p class="origin"><?php echo $origin_string; ?></p>
                    <p class="skill-tags"><?php echo $skills_string; ?></p>
                    <p class="cta"> to Read More</p>
                </div>
                <div class="back">
                    <?php if($back_template == "none"): ?>
                        <div class="back-template-none">
                            No Preview Available.
                        </div>
                    <?php else: ?>
                        <div class="back-img-container <?php echo $back_template; ?>">
                            <?php if($back_template == "img") : ?>
                                <div class="back-img-foreground no-mobile-fancybox" data-fancybox-trigger="main" data-src="<?php echo $back_img["url"]; ?>"><img src="<?php echo $back_img["url"]; ?>" /></div>
                                <div class="back-img-background" style='background-image:url(<?php echo $back_img["url"]; ?>);'></div>
                            <?php else : ?>
                                <img src="<?php echo $back_img["url"]; ?>" />
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($back_template == "img") : ?>
                        <button class="btn btn-secondary no-mobile-fancybox" data-fancybox-trigger="main" data-src="<?php echo $back_img["url"]; ?>"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;Enhance Image</button>
                    <?php endif; ?>
                </div>
            </div><!-- end portfolio card -->
        </div><!-- end single portfolio card container -->

        <div class="proj-notebook-container">
            <div class="proj-notes-header">
                <div class="header-paper-bg-img" style="background-image:url(<?php echo get_theme_file_uri('/img/header-paper-bg-blank-circle-left.png'); ?>)">
                    <div class="header-container">
                        <h2>Project Notes</h2>
                    </div>
                </div>
                <?php if($link) : ?>
                    <div class="proj-link">
                        <a href="<?php echo $link["url"]; ?>" target="_blank"><i class="fa-solid fa-link"></i> View Live Website</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="proj-notes-container">
                <?php $GLOBALS["img_num"] = 1; the_content(); ?>
            </div>
        </div>
    </div><!-- end container -->
</section><!-- end section #main-content -->

<?php get_footer(); // grabs Footer.php ?>