<?php
$justify_notes = get_field('justify_notes');
// Check value exists.
if( have_rows('notes') ):?>
    <div class="note-row <?php echo $justify_notes; ?>">
    <?php
    // Loop through rows.
    while ( have_rows('notes') ) : the_row();
        // Case: Text Note layout.
        if( get_row_layout() == 'text_note' ):
            $note_width = get_sub_field('note_width');
            $content = get_sub_field('content');
            $skills = get_sub_field('note_skills'); ?>

            <div class="note text <?php echo $note_width; ?>">
                <div class="inner-note">
                    <?php if ( have_rows( 'note_skills' ) ): ?>
                        <div class="skills-container">
                            <?php while( have_rows( 'note_skills' ) ): the_row(); ?>
                                <span class="tag purple"><?php echo get_sub_field('skill'); ?></span>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php echo $content; ?>
                </div>
            </div>

        <?php
        // Case: Image Note layout.
        elseif( get_row_layout() == 'img_note' ): 
            $note_width = get_sub_field('note_width');
            $use_back_img = get_sub_field('use_back_img');
            $img = get_sub_field('img');
            $back_img = get_field("back_card", get_the_ID())['img'];
            $img_url = ($use_back_img) ? $back_img["url"] : $img["url"];
            
            $trigger = ($use_back_img) ? "-trigger" : "";
            //$data_fancybox = "data-fancybox" . $trigger . "='main'"; 
            $data_fancybox = "data-fancybox='main'"; ?>

            <div class="note img <?php echo $note_width; ?>">
                <div class="inner-note" <?php echo $data_fancybox; ?> data-src="<?php echo $img_url; ?>">
                    <div class="top-left-section">
                        <div class="img-num-tag"><?php echo $GLOBALS["img_num"]++; ?></div>
                        <div class="enhance-btn"><i class="fa-regular fa-magnifying-glass-plus"></i> Enhance</div>
                    </div>
                    <img src="<?php echo $img_url; ?>" />
                </div>
            </div>

        <?php
        // END SWITCH
        endif;
    // End loop.
    endwhile; ?>
    </div><!-- end .note-row -->
<?php endif;