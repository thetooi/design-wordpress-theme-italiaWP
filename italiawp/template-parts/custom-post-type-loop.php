<?php
/*
 * ### LOOP ARTICOLO ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
    
    $datapost = get_the_date('j F Y', '', ''); ?>

<div class="u-layout-wide u-layoutCenter u-text-r-l u-padding-r-top u-margin-r-bottom u-layout-r-withGutter">
    <section class="Grid">

        <div class="Grid-cell u-sizeFull u-padding-r-all">
            <div class="Grid Grid--fit u-margin-r-bottom">
                <p class="Grid-cell u-textSecondary"><?php echo $datapost; ?></p>
            </div>
            <div class="u-text-r-l">
                <h2 class="u-text-h2 u-margin-r-bottom">
                    <a class="u-text-h2 u-textClean u-color-black" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <p class="u-textSecondary u-lineHeight-l">
                    <?php the_content(); ?>
                </p>
            </div>
        </div>
    
        <?php
            if ( comments_open() || get_comments_number() ) :
                    comments_template();
            endif;
        ?>
        
    </section>

</div>

<div class="u-layout-wide u-layoutCenter u-text-r-l u-padding-r-top u-margin-r-bottom u-layout-r-withGutter">
    <nav role="navigation" aria-label="Navigazione paginata">
        <ul class="Grid Grid--fit Grid--alignMiddle u-text-r-xxs u-textCenter">
            <li class="Grid-cell u-textCenter">
            <?php
                if (get_adjacent_post(false, '', true)) {
                    previous_post_link('%link', '<span class="Icon-chevron-left u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina precedente</span>');
                }else{
                    $first = new WP_Query('posts_per_page=1&order=DESC');
                    $first->the_post();
                    echo '<a href="'.get_permalink().'"><span class="Icon-chevron-left u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina precedente</span></a>';
                    wp_reset_query();
                };
             ?>
            </li>
            <li class="Grid-cell u-textCenter">
            <?php
                if (get_adjacent_post(false, '', false)) {
                    next_post_link('%link', '<span class="Icon-chevron-right u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina successiva</span>');
                }else{
                    $last = new WP_Query('posts_per_page=1&order=ASC');
                    $last->the_post();
                    echo '<a href="'.get_permalink().'"><span class="Icon-chevron-right u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina successiva</span></a>';
                    wp_reset_query();
                };
             ?>
            </li>
        </ul>
    </nav>
</div>

<?php endwhile;
      else : include('error.php');
      endif; ?>
