<?php
if( !function_exists('motu_custom_taxonomy_field') ):

	// Add term page
    function motu_custom_taxonomy_field(){

        // this will add the custom meta field to the add new term page ?>

        <div class="form-field">
            
            <label><?php esc_html_e('Feature Image', 'motu'); ?></label>

            <div class="twp-img-fields-wrap">
                <div class="attachment-media-view">
                    <div class="twp-img-fields-wrap">
                        <div class="twp-attachment-media-view">

                            <div class="twp-attachment-child twp-uploader">

                                <button type="button" class="twp-img-upload-button">
                                    <span class="dashicons dashicons-upload twp-icon twp-icon-large"></span>
                                </button>

                                <input class="upload-id" name="twp-term-featured-image" type="hidden"/>

                            </div>

                            <div class="twp-attachment-child twp-thumbnail-image">

                                <button type="button" class="twp-img-delete-button">
                                    <span class="dashicons dashicons-no-alt twp-icon"></span>
                                </button>

                                <div class="twp-img-container">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="form-field">
                
            <label><?php esc_html_e('Category Color', 'motu'); ?></label>
            
            <input type="text" name="motu-cat-color" id="motu-cat-color" value="">

        </div>

    <?php
    }

endif;

add_action('category_add_form_fields', 'motu_custom_taxonomy_field', 10, 2);


if( !function_exists('motu_taxonomy_edit_meta_field') ):

	// Edit term page
    function motu_taxonomy_edit_meta_field($term){

        // retrieve the existing value(s) for this meta field. This returns an array
        $twp_term_image = get_term_meta( $term->term_id, 'twp-term-featured-image', true );
        $twp_term_color = get_term_meta( $term->term_id, 'motu-cat-color', true ); ?>

        <tr>
            
            <th scope="row" valign="top"><label><?php esc_html_e('Feature Image', 'motu'); ?></label></th>

            <td>

                <div class="twp-img-fields-wrap">
                    <div class="attachment-media-view">
                        <div class="twp-img-fields-wrap">
                            <div class="twp-attachment-media-view">

                                <div class="twp-attachment-child twp-uploader">

                                    <button type="button" class="twp-img-upload-button">
                                        <span class="dashicons dashicons-upload twp-icon twp-icon-large"></span>
                                    </button>

                                    <input class="upload-id" name="twp-term-featured-image" type="hidden" value="<?php echo esc_url( $twp_term_image ); ?>"/>

                                </div>

                                <div class="twp-attachment-child twp-thumbnail-image">

                                    <button type="button" class="twp-img-delete-button <?php if( $twp_term_image ) { echo 'twp-img-show'; } ?>">
                                        <span class="dashicons dashicons-no-alt twp-icon"></span>
                                    </button>

                                    <div class="twp-img-container">

                                        <?php if( $twp_term_image ){ ?>

                                            <img src="<?php echo esc_url( $twp_term_image ); ?>" style="width:200px;height:auto;">

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </td>

        </tr>

        <tr>
            
            <td><label><?php esc_html_e('Category Color', 'motu'); ?></label></td>

            <td><input type="text" name="motu-cat-color" id="motu-cat-color" value="<?php echo esc_attr( $twp_term_color ); ?>"></td>

        </tr>
        <?php
    }

endif;

add_action('category_edit_form_fields', 'motu_taxonomy_edit_meta_field', 10, 2);


if( !function_exists('motu_save_taxonomy_color_class_meta') ):

	// Save extra taxonomy fields callback function.
    function motu_save_taxonomy_color_class_meta( $term_id ){

        if( isset( $_POST['twp-term-featured-image'] ) ){

            update_term_meta(
                $term_id,
                'twp-term-featured-image',
                esc_url_raw( wp_unslash( $_POST[ 'twp-term-featured-image' ] ) )
            );


        }

        if( isset( $_POST['motu-cat-color'] ) ){

            update_term_meta(
                $term_id,
                'motu-cat-color',
                sanitize_hex_color( wp_unslash( $_POST[ 'motu-cat-color' ] ) )
            );


        }



    }

endif;

add_action('edited_category', 'motu_save_taxonomy_color_class_meta', 10, 2);
add_action('create_category', 'motu_save_taxonomy_color_class_meta', 10, 2);