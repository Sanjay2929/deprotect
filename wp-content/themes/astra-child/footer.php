<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
</div> <!-- ast-container -->
</div><!-- #content -->
<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer();
		
	astra_footer_after(); 
?>
</div><!-- #page -->
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
<script>
jQuery(document).ready(function() {
    function get_elment() {
        return document.querySelectorAll('.elementor-image > img.attachment-full')[1];
    }

    function get_oldSrc() {
        return 'https://deprotect.io/wp-content/uploads/2022/03/main.png';
    }

    function get_newSrc(number) {
        if (number == 1) return 'https://deprotect.io/wp-content/uploads/2022/04/Capital.png';
        if (number == 2) return 'https://deprotect.io/wp-content/uploads/2022/03/Escrow-Process.png';
        if (number == 3) return 'https://deprotect.io/wp-content/uploads/2022/03/Services.png';
    }

    jQuery("div[id='capital']").mouseover(function() {
        var val_element = get_elment();
        var val_newSrc = get_newSrc(1);
        console.log(val_element);
        val_element.src = val_newSrc;
        val_element.srcset = val_newSrc;

        //console.log(document.querySelectorAll('.elementor-image > img.attachment-full')[2]);
    });
    jQuery("div[id='capital']").mouseout(function() {
        var val_oldSrc = get_oldSrc();
        var val_element = get_elment();
        val_element.src = val_oldSrc;
        val_element.srcset = val_oldSrc;
    });
    jQuery("div[id='escrow']").mouseover(function() {
        var val_element = get_elment();
        var val_newSrc = get_newSrc(2);
        val_element.src = val_newSrc;
        val_element.srcset = val_newSrc;

    });
    jQuery("div[id='escrow']").mouseout(function() {
        var val_oldSrc = get_oldSrc();
        var val_element = get_elment();
        val_element.src = val_oldSrc;
        val_element.srcset = val_oldSrc;
    });
    jQuery("div[id='services']").mouseover(function() {
        var val_element = get_elment();
        var val_newSrc = get_newSrc(3);
        val_element.src = val_newSrc;
        val_element.srcset = val_newSrc;

    });
    jQuery("div[id='services']").mouseout(function() {
        var val_oldSrc = get_oldSrc();
        var val_element = get_elment();
        val_element.src = val_oldSrc;
        val_element.srcset = val_oldSrc;
    });

});
</script>
</body>

</html>