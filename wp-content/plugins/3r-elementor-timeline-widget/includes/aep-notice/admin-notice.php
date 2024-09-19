<?php

if( get_option( 'aep_tl_notice' ) != 'tb_tl_never_show' ) {
    add_action( 'admin_notices', 'aep_tl_notice_options' );
}

function aep_tl_notice_options() {
      ?>
      <div class='notice aep-tl-notice'>
          <div class="aep-tl-notice-logo">
              <img src="<?php echo plugins_url( '/', __FILE__ ) .'/img/aep-inf-img.jpg'?>" >
            </div>
        <div class="aep-notice-content">
            <h3>Elementor Timeline Widget</h3>
            <p>Thank you for using <strong>Elementor Timeline Widget</strong>. Thank you for using Elementor Timeline Widget. If you like this plugin please make a small donation or give us a good review for our motivation.</p>
            
			<p class="aep-link">
                <a href=" https://www.paypal.com/donate?hosted_button_id=ZC2N2PY77T9HL" class="donate"> <i class="icon-donation"></i> Donate</a>  | 
            <a target="_blank" href="https://wordpress.org/support/plugin/3r-elementor-timeline-widget/reviews/?filter=5" class="review">
            <i class="icon-star-empty"></i> 
            Leave a Review</a> | 
            <a href="javascript:void()" class="aep-tl-never-show"><i class="icon-cancel-circle"></i> Never Show</a>
            <!--a href="#review_link" class="later">Maybe later</a-->
            </p>
        </div>
      </div>
<?php
}

add_action( 'admin_enqueue_scripts', 'aep_tl_add_script' );
function aep_tl_add_script() {
        wp_register_script( 'aep-tl-notice-update',  plugins_url( '/', __FILE__ ) . '/js/update-notice.js','','1.0', false );
        wp_enqueue_style( 'aep-tl-notice-update-css',  plugins_url( '/', __FILE__ ) . '/css/aep-notice.css',array());
        
        wp_localize_script( 'aep-tl-notice-update', 'aep_tl_notice_params', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        ));
        
        wp_enqueue_script(  'aep-tl-notice-update' );
}

add_action( 'wp_ajax_aep_tl_never_show', 'aep_tl_never_show' );

function aep_tl_never_show() {
      update_option( 'aep_tl_notice', 'tb_tl_never_show' );
}