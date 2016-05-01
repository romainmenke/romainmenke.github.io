<?php header('Content-Type: text/javascript'); ?>
<?php                               //current file       //tinymce-thumbnail-galler   plugins/                 wp-content/               wordpress dir/
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR. 'wp-config.php');
?>
jQuery(document).ready(function(){
    jQuery("UL.TINYMCE_gallery a").each(function(){
        var href = jQuery(this).attr("href");
        jQuery(this).click(function(){
            var iframe = jQuery('<iframe style="display:none" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/plugins/tinymce-thumbnail-gallery/php/download-image.php?href='+href+'"></iframe>');
            jQuery("body").append(iframe);
            return false;
        })

    })
})
