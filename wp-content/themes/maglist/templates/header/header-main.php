<?php
/**
 * Content for header
 *
 * @since 1.0
 *
 * @package Maglist WordPress Theme
 */ 
$bg_img = maglist_get( 'header-background-image' );
?>
<div class="maglist-header-wrapper">
	<?php if( '' != $bg_img ){ ?>
		<div class="maglist-header-image-wrapper">			
			<img src="<?php echo esc_url( $bg_img ); ?>" alt="Header Background Image">
		</div>
	<?php } ?>
	<div class="container maglist-header-inner">
		<section class="maglist-header-top">
			<div class="site-branding">
				<div>
					<?php the_custom_logo(); ?>
					<div>
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :	?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php if( '' != maglist_get( 'advertisement-image' ) ){ ?>
			<div class="maglist-advertisement-image">
				<a href="<?php echo esc_url( maglist_get( 'advertisement-url' ) ); ?>">
					<img src="<?php echo esc_url( maglist_get( 'advertisement-image' ) ) ?>">
				</a>
			</div>
		<?php } ?>
	</div>
</div>
<div class="<?php echo Maglist_Helper::with_prefix( 'navigation-n-options' ); ?>">
	<div class="container">
		<div class="maglist-header-bottom">
			<div class="maglist-header-left">
				<?php if( maglist_get( 'enable-offcanvas' ) ){ ?>
					<div class="maglist-offcanvas-wrapper">
						<a href="#" role="button" aria-label="Trigger Offcanvas" data-trigger="maglist-offcanvas-content">
							<div class="offcanvas-data-trigger">						
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
					</div>
				<?php } ?>
				<div class="<?php echo Maglist_Helper::with_prefix( 'navigation-n-options' ); ?>">
					<nav class="maglist-main-menu" id="site-navigation">
						<?php Maglist_Helper::get_menu( 'primary', true ); ?>
					</nav>
				</div>
			</div>
			<div class="maglist-header-right">	
				<div class="maglist-btns-wrapper">			
					<?php do_action( Maglist_Helper::fn_prefix( 'after_primary_menu' ) ); ?>
				</div> 
				<?php get_template_part( 'templates/header/header', 'search' ); ?>
			</div>	
		</div>
		<?php if( maglist_get( 'enable-offcanvas' ) ){ ?>
			<div class="maglist-offcanvas-content">
				<nav class="maglist-offcanvas-menu">
					<?php Maglist_Helper::get_menu( 'offcanvas', true ); ?>
				</nav>
			</div>
		<?php } ?>
	</div>
</div>
