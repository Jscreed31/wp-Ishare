<?php
/**
 * The template part for displaying content
 * @package Artist Portfolio
 * @subpackage artist_portfolio
 * @since 1.0
 */
?>

<?php $artist_portfolio_theme_lay = get_theme_mod( 'artist_portfolio_post_layouts','Layout 2');
if($artist_portfolio_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($artist_portfolio_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($artist_portfolio_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}