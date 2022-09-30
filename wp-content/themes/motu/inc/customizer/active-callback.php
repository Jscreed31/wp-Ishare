<?php
/**
 * Motu Customizer Active Callback Functions
 *
 * @package Motu
 */
function motu_overlay_layout_ac( $control ){

    $motu_single_post_layout = $control->manager->get_setting( 'motu_single_post_layout' )->value();
    if( $motu_single_post_layout == 'layout-2' ){

        return true;
        
    }
    
    return false;
}

function motu_header_ad_ac( $control ){

    $ed_header_ad = $control->manager->get_setting( 'ed_header_ad' )->value();
    if( $ed_header_ad ){

        return true;
        
    }
    
    return false;
}