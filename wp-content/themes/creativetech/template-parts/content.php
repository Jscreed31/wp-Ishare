<div class="creativetech_post_list">

    <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?> grid-item wobble-vertical-on-hover">

        <!-- post-thumbnail -->
        <?php if(has_post_thumbnail()) { ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div><!-- /post-thumbnail -->
        <?php } ?>


        <h2 class="post_listing_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <?php if ( is_search() OR is_archive() ) { ?>
        <p>
            <?php echo esc_html(get_the_excerpt()); ?>
            <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more&raquo;', 'creativetech' ); ?></a>
        </p>
        <?php } else {
            if ($post->post_excerpt) { ?>

        <p>
            <?php echo esc_html(get_the_excerpt()); ?>
            <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more&raquo;', 'creativetech' ); ?></a>
        </p>

        <?php } else {

            }
        } ?>

    </div>

</div>