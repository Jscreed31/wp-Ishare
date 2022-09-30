<?php
/**
* Sidebar Metabox.
*
* @package Motu
*/
 
add_action( 'add_meta_boxes', 'motu_metabox' );

if( ! function_exists( 'motu_metabox' ) ):


    function  motu_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'motu' ),
            'motu_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'motu' ),
            'motu_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$motu_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'motu' ),
    'layout-2' => esc_html__( 'Banner Layout', 'motu' ),
);

$motu_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'motu' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'motu' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'motu' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'motu' ),
                ),
);

$motu_post_layout_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'motu' ),
    'layout-1' => esc_html__( 'Simple Layout', 'motu' ),
    'layout-2' => esc_html__( 'Banner Layout', 'motu' ),
);

$motu_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'motu' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'motu' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'motu_post_metafield_callback' ) ):
    
    function motu_post_metafield_callback() {
        global $post, $motu_post_sidebar_fields, $motu_post_layout_options,  $motu_page_layout_options, $motu_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'motu_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'motu'); ?>

                        </a>
                    </li>

                    <li>
                        <a id="metabox-navbar-appearance" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'motu'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'motu'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','motu'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $motu_post_sidebar = esc_html( get_post_meta( $post->ID, 'motu_post_sidebar_option', true ) ); 
                            if( $motu_post_sidebar == '' ){ $motu_post_sidebar = 'global-sidebar'; }

                            foreach ( $motu_post_sidebar_fields as $motu_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="motu_post_sidebar_option" value="<?php echo esc_attr( $motu_post_sidebar_field['value'] ); ?>" <?php if( $motu_post_sidebar_field['value'] == $motu_post_sidebar ){ echo "checked='checked'";} if( empty( $motu_post_sidebar ) && $motu_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $motu_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','motu'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $motu_page_layout = esc_html( get_post_meta( $post->ID, 'motu_page_layout', true ) ); 
                                if( $motu_page_layout == '' ){ $motu_page_layout = 'layout-1'; }

                                foreach ( $motu_page_layout_options as $key => $motu_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="motu_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $motu_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $motu_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','motu'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $motu_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'motu_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="motu-header-overlay" name="motu_ed_header_overlay" value="1" <?php if( $motu_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="motu-header-overlay"><?php esc_html_e( 'Enable Header Overlay','motu' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Appearance Layout','motu'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $motu_post_layout = esc_html( get_post_meta( $post->ID, 'motu_post_layout', true ) ); 
                                if( $motu_post_layout == '' ){ $motu_post_layout = 'global-layout'; }

                                foreach ( $motu_post_layout_options as $key => $motu_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="motu_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $motu_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $motu_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','motu'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $motu_header_overlay = esc_html( get_post_meta( $post->ID, 'motu_header_overlay', true ) ); 
                                if( $motu_header_overlay == '' ){ $motu_header_overlay = 'global-layout'; }

                                foreach ( $motu_header_overlay_options as $key => $motu_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="motu_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $motu_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $motu_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>
                    <?php
                    $motu_ed_feature_image = esc_html( get_post_meta( $post->ID, 'motu_ed_feature_image', true ) ); 
                    if (!isset( $_POST['motu_ed_feature_image'] )) {
                        $motu_ed_feature_image = get_theme_mod('ed_post_thumbnail');
                    }
                    ?>

                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Navigation Setting','motu'); ?></h3>

                        <?php $twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php esc_html_e( 'Navigation Type','motu' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php esc_html_e('Global Layout','motu'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php esc_html_e('Disable Navigation','motu'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php esc_html_e('Next Previous Navigation','motu'); ?></option>
                                <option <?php if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php esc_html_e('Ajax Load Next 3 Posts Contents','motu'); ?></option>

                            </select>

                        </div>
                    </div>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $motu_ed_post_views = esc_html( get_post_meta( $post->ID, 'motu_ed_post_views', true ) );
                    $motu_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'motu_ed_post_read_time', true ) );
                    $motu_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'motu_ed_post_like_dislike', true ) );
                    $motu_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'motu_ed_post_author_box', true ) );
                    $motu_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'motu_ed_post_social_share', true ) );
                    $motu_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'motu_ed_post_reaction', true ) );
                    $motu_ed_post_rating = esc_html( get_post_meta( $post->ID, 'motu_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','motu'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-views" name="motu_ed_post_views" value="1" <?php if( $motu_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-views"><?php esc_html_e( 'Disable Post Views','motu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-read-time" name="motu_ed_post_read_time" value="1" <?php if( $motu_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','motu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-like-dislike" name="motu_ed_post_like_dislike" value="1" <?php if( $motu_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','motu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-author-box" name="motu_ed_post_author_box" value="1" <?php if( $motu_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','motu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-social-share" name="motu_ed_post_social_share" value="1" <?php if( $motu_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','motu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-reaction" name="motu_ed_post_reaction" value="1" <?php if( $motu_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','motu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="motu-ed-post-rating" name="motu_ed_post_rating" value="1" <?php if( $motu_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="motu-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','motu' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'motu_save_post_meta' );

if( ! function_exists( 'motu_save_post_meta' ) ):

    function motu_save_post_meta( $post_id ) {

        global $post, $motu_post_sidebar_fields, $motu_post_layout_options, $motu_header_overlay_options,  $motu_page_layout_options;

        if ( !isset( $_POST[ 'motu_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['motu_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $motu_post_sidebar_fields as $motu_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'motu_post_sidebar_option', true ) ); 
                $new = isset( $_POST['motu_post_sidebar_option'] ) ? motu_sanitize_sidebar_option_meta( wp_unslash( $_POST['motu_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'motu_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'motu_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? motu_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $motu_post_layout_options as $motu_post_layout_option ) {  
            
            $motu_post_layout_old = esc_html( get_post_meta( $post_id, 'motu_post_layout', true ) ); 
            $motu_post_layout_new = isset( $_POST['motu_post_layout'] ) ? motu_sanitize_post_layout_option_meta( wp_unslash( $_POST['motu_post_layout'] ) ) : '';

            if ( $motu_post_layout_new && $motu_post_layout_new != $motu_post_layout_old ){

                update_post_meta ( $post_id, 'motu_post_layout', $motu_post_layout_new );

            }elseif( '' == $motu_post_layout_new && $motu_post_layout_old ) {

                delete_post_meta( $post_id,'motu_post_layout', $motu_post_layout_old );

            }
            
        }



        foreach ( $motu_header_overlay_options as $motu_header_overlay_option ) {  
            
            $motu_header_overlay_old = esc_html( get_post_meta( $post_id, 'motu_header_overlay', true ) ); 
            $motu_header_overlay_new = isset( $_POST['motu_header_overlay'] ) ? motu_sanitize_header_overlay_option_meta( wp_unslash( $_POST['motu_header_overlay'] ) ) : '';

            if ( $motu_header_overlay_new && $motu_header_overlay_new != $motu_header_overlay_old ){

                update_post_meta ( $post_id, 'motu_header_overlay', $motu_header_overlay_new );

            }elseif( '' == $motu_header_overlay_new && $motu_header_overlay_old ) {

                delete_post_meta( $post_id,'motu_header_overlay', $motu_header_overlay_old );

            }
            
        }



        $motu_ed_feature_image_old = esc_html( get_post_meta( $post_id, 'motu_ed_feature_image', true ) ); 
        $motu_ed_feature_image_new = isset( $_POST['motu_ed_feature_image'] ) ? absint( wp_unslash( $_POST['motu_ed_feature_image'] ) ) : '';

        if ( $motu_ed_feature_image_new && $motu_ed_feature_image_new != $motu_ed_feature_image_old ){

            update_post_meta ( $post_id, 'motu_ed_feature_image', $motu_ed_feature_image_new );

        }elseif( '' == $motu_ed_feature_image_new && $motu_ed_feature_image_old ) {

            delete_post_meta( $post_id,'motu_ed_feature_image', $motu_ed_feature_image_old );

        }



        $motu_ed_post_views_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_views', true ) ); 
        $motu_ed_post_views_new = isset( $_POST['motu_ed_post_views'] ) ? absint( wp_unslash( $_POST['motu_ed_post_views'] ) ) : '';

        if ( $motu_ed_post_views_new && $motu_ed_post_views_new != $motu_ed_post_views_old ){

            update_post_meta ( $post_id, 'motu_ed_post_views', $motu_ed_post_views_new );

        }elseif( '' == $motu_ed_post_views_new && $motu_ed_post_views_old ) {

            delete_post_meta( $post_id,'motu_ed_post_views', $motu_ed_post_views_old );

        }



        $motu_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_read_time', true ) ); 
        $motu_ed_post_read_time_new = isset( $_POST['motu_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['motu_ed_post_read_time'] ) ) : '';

        if ( $motu_ed_post_read_time_new && $motu_ed_post_read_time_new != $motu_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'motu_ed_post_read_time', $motu_ed_post_read_time_new );

        }elseif( '' == $motu_ed_post_read_time_new && $motu_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'motu_ed_post_read_time', $motu_ed_post_read_time_old );

        }



        $motu_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_like_dislike', true ) ); 
        $motu_ed_post_like_dislike_new = isset( $_POST['motu_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['motu_ed_post_like_dislike'] ) ) : '';

        if ( $motu_ed_post_like_dislike_new && $motu_ed_post_like_dislike_new != $motu_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'motu_ed_post_like_dislike', $motu_ed_post_like_dislike_new );

        }elseif( '' == $motu_ed_post_like_dislike_new && $motu_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'motu_ed_post_like_dislike', $motu_ed_post_like_dislike_old );

        }



        $motu_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_author_box', true ) ); 
        $motu_ed_post_author_box_new = isset( $_POST['motu_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['motu_ed_post_author_box'] ) ) : '';

        if ( $motu_ed_post_author_box_new && $motu_ed_post_author_box_new != $motu_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'motu_ed_post_author_box', $motu_ed_post_author_box_new );

        }elseif( '' == $motu_ed_post_author_box_new && $motu_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'motu_ed_post_author_box', $motu_ed_post_author_box_old );

        }



        $motu_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_social_share', true ) ); 
        $motu_ed_post_social_share_new = isset( $_POST['motu_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['motu_ed_post_social_share'] ) ) : '';

        if ( $motu_ed_post_social_share_new && $motu_ed_post_social_share_new != $motu_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'motu_ed_post_social_share', $motu_ed_post_social_share_new );

        }elseif( '' == $motu_ed_post_social_share_new && $motu_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'motu_ed_post_social_share', $motu_ed_post_social_share_old );

        }



        $motu_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_reaction', true ) ); 
        $motu_ed_post_reaction_new = isset( $_POST['motu_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['motu_ed_post_reaction'] ) ) : '';

        if ( $motu_ed_post_reaction_new && $motu_ed_post_reaction_new != $motu_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'motu_ed_post_reaction', $motu_ed_post_reaction_new );

        }elseif( '' == $motu_ed_post_reaction_new && $motu_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'motu_ed_post_reaction', $motu_ed_post_reaction_old );

        }



        $motu_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'motu_ed_post_rating', true ) ); 
        $motu_ed_post_rating_new = isset( $_POST['motu_ed_post_rating'] ) ? absint( wp_unslash( $_POST['motu_ed_post_rating'] ) ) : '';

        if ( $motu_ed_post_rating_new && $motu_ed_post_rating_new != $motu_ed_post_rating_old ){

            update_post_meta ( $post_id, 'motu_ed_post_rating', $motu_ed_post_rating_new );

        }elseif( '' == $motu_ed_post_rating_new && $motu_ed_post_rating_old ) {

            delete_post_meta( $post_id,'motu_ed_post_rating', $motu_ed_post_rating_old );

        }

        foreach ( $motu_page_layout_options as $motu_post_layout_option ) {  
        
            $motu_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'motu_page_layout', true ) ); 
            $motu_page_layout_new = isset( $_POST['motu_page_layout'] ) ? motu_sanitize_post_layout_option_meta( wp_unslash( $_POST['motu_page_layout'] ) ) : '';

            if ( $motu_page_layout_new && $motu_page_layout_new != $motu_page_layout_old ){

                update_post_meta ( $post_id, 'motu_page_layout', $motu_page_layout_new );

            }elseif( '' == $motu_page_layout_new && $motu_page_layout_old ) {

                delete_post_meta( $post_id,'motu_page_layout', $motu_page_layout_old );

            }
            
        }

        $motu_ed_header_overlay_old = absint( get_post_meta( $post_id, 'motu_ed_header_overlay', true ) ); 
        $motu_ed_header_overlay_new = isset( $_POST['motu_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['motu_ed_header_overlay'] ) ) : '';

        if ( $motu_ed_header_overlay_new && $motu_ed_header_overlay_new != $motu_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'motu_ed_header_overlay', $motu_ed_header_overlay_new );

        }elseif( '' == $motu_ed_header_overlay_new && $motu_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'motu_ed_header_overlay', $motu_ed_header_overlay_old );

        }

    }

endif;   