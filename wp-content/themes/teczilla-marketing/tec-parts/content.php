<?php 
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>


<div class="blog-wraped">
	<?php if(has_post_thumbnail()) : ?>
    <a class="image-sec">
		<?php the_post_thumbnail(); ?>
    </a>
    <?php endif; ?>
    <div class="con-sec">
        <h3 class="title-head mb-10"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
        <ul class="blog-meta">
            <?php teczilla_posted_by(); ?>
            <?php teczilla_posted_on(); ?>
        </ul>
        <div class="con-part">
		    <?php the_excerpt(); ?>
            <a class="read-sec" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','teczilla-marketing');?></a>
        </div>
    </div>
</div>