<?php
/* 
Plugin Name: Tinymce Thumbnail Gallery Plugin
Plugin URI: http://www.jamescharlesworth.com/blog/wordpress-thumbnail-gallery-plugin/
Version: v1.0.6
Author: <a href="http://twitter.com/seoatl">James Charlesworth</a>
Description: This plugin allows you to easily add an image gallery to a post or page.
 
Copyright 2010  James Charlesworth  (email : james DOT charlesworth [a t ] g m ail DOT com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributded in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/



if (!class_exists("TinymceThumbnailGallery")) {
	class TinymceThumbnailGallery {
                var $adminOptionsName = "TinymceThumbnailGalleryAdminOptions";
               
              


		function TinymceThumbnailGallery() { //constructor
			
		}

                function init() {
                    $this->getAdminOptions();
                   
                }



                function getAdminOptions() {
                    $TinymceThumbnailGalleryAdminOptions = array(
                        'tinymce_thumbnail_gallery_link' => true,
                        'tinymce_thumbnail_gallery_onclick' => 'colorbox',


                        );
                    

                    $TinymceThumbnailGalleryOptions = get_option($this->adminOptionsName);
                    if (!empty($TinymceThumbnailGalleryOptions)) {
                        foreach ($TinymceThumbnailGalleryOptions as $key => $option)
                           $TinymceThumbnailGalleryAdminOptions[$key] = $option;
                    }
                    update_option($this->adminOptionsName, $TinymceThumbnailGalleryAdminOptions);



                    return $TinymceThumbnailGalleryAdminOptions;


                }



                

                function printAdminPage() {
  
                    global $wpdb;
                    
                    $TinymceThumbnailGalleryOptions = $this->getAdminOptions();
                   
                    if (isset($_POST['update_tinymce_thumbnail_gallery_settings'])) {

 
                            $TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_link'] = $_POST['tinymce_thumbnail_gallery_link'];
                            $TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick'] = $_POST['tinymce_thumbnail_gallery_onclick'];
                           

                        

    
                        update_option($this->adminOptionsName, $TinymceThumbnailGalleryOptions);

                        if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_link']) {
                            $please = null;
                        } else {
                            $please = ' If your not going to link back to my site, consider
                                giving me <a href="http://twitter.com/seoatl" target="_new">tweet</a>, mention a <a href="http://www.jamescharlesworth.com/blog/" target="_new">blog post</a> or <a href="http://www.jamescharlesworth.com/donate" target="_new">something</a> :)';
                        }

                       ?>

                        <div class="updated"><p><strong><?php _e("Settings Updated." . $please, "TinymceThumbnailGallery");?></strong></p></div>

                     <?php
                    }

                    ?>
                        <div class=wrap>
                        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                        <h2>Tinymce Image Editor Thumbnail Gallery</h2>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                         <label for="tinymce_thumbnail_gallery_colorbox">On Clicking Image:</label>
                                    </th>
                                    <td>
                                        <input type="radio"  name="tinymce_thumbnail_gallery_onclick" value="colorbox" <?php if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='colorbox') echo 'CHECKED' ;?> />
                                        <span class="description">Use <a href="http://colorpowered.com/colorbox/" target="_new">Colorbox</a> to view the image (lightbox effect)</span><br />

                                        <input type="radio" name="tinymce_thumbnail_gallery_onclick" value="download" <?php if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='download') echo 'CHECKED' ;?> />
                                        <span class="description">Image downloads to the users computer</span><br />

                                        <input type="radio" name="tinymce_thumbnail_gallery_onclick" value="nothing" <?php if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='nothing') echo 'CHECKED' ;?> />
                                        <span class="description">Just a plain old link to open up the image in a new window</span><br />

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="tinymce_thumbnail_gallery_link">Add link to creator:</label>
                                    </th>
                                    <td>
                                        <input type="checkbox" id="tinymce_thumbnail_gallery_link" name="tinymce_thumbnail_gallery_link" <?php if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_link']=='on') echo 'CHECKED' ;?> />
                                        <span class="description">
                                            This link is a way to thank <a target="_new" href="http://www.jamescharlesworth.com">me</a> for all my hard work in putting this plugin  together. If you like
                        the plugin please consider leaving the link in.
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                       
                        
                        
                        
                        
                        <p><i></i></p>




                        
                        <div class="submit">
                        <input type="submit" name="update_tinymce_thumbnail_gallery_settings" value="<?php _e('Update Settings', 'TinymceThumbnailGallery') ?>" /></div>
                        </form>
                        
                      
                         </div><?php
 
                   

                }


                
                function addHeaderCode() {
                    global $user_ID;
                    $TinymceThumbnailGalleryOptions = $this->getAdminOptions();

                    echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/css/tinymce_thumbnail_gallery.css" />' . "\n";
                    if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='colorbox') {
                        echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/includes/colorbox/colorbox.css" />' . "\n";

                    }

                    if (function_exists('wp_enqueue_script')) {
                       wp_enqueue_script('tinymce_thumbnail_gallery_js', get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/js/tinymce_thumbnail_gallery.js', array('jquery'), '0.1');

                        if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='colorbox') {
                            
                            wp_enqueue_script('tinymce_thumbnail_gallery_js_colorbox', get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/includes/colorbox/jquery.colorbox-min.js', array('jquery'), '0.1');

                        } elseif ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='download') {
                            wp_enqueue_script('tinymce_thumbnail_gallery_download-image', get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/js/jquery.download-image.js.php', array('jquery'), '0.1');

                        }

                    }

                    $TinymceThumbnailGalleryAdminOptions = $this->getAdminOptions();

                    //not sure about this one
                    if ($TinymceThumbnailGalleryAdminOptions['show_header'] == "false") { return; }
                     
                }


                function addFooterCode() {
                      $TinymceThumbnailGalleryOptions = $this->getAdminOptions();
                    if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_onclick']=='colorbox') {
                        ?>
                        <script type="text/javascript">
                        jQuery(document).ready(function(){
                            jQuery("ul.TINYMCE_gallery li a").colorbox({width:"50%"});
                        });
                        </script>
                        <?php

                    }





                }



                function linkFilter($content = '') {
                    $TinymceThumbnailGalleryOptions = $this->getAdminOptions();
                    if ($TinymceThumbnailGalleryOptions['tinymce_thumbnail_gallery_link']) {
                      $link = '<p style="clear:left;font-size:10px;">Gallery by <a href="http://www.jamescharlesworth.com">Atlanta Search Marketing</a></p><p>';
                     
                    } else {
                        $link='<p class="TINYMCE_thumbnail_link" style="clear:left;padding:0;margin:0;"></p>';
                    }

                    //if there is just one instance of <!--[TINYMCE_THUMBNAIL_LINK]--> replace it , then remove others

                 
                     
                     $content = preg_replace('/\<p\ class=\"JC_credit_link\">\<\!\-\-\[TINYMCE_THUMBNAIL_LINK\]\-\-\>/',$link,$content,1);
                    
                    
                    

                     return $content;
                }


                /*mce stuff*/
                function myplugin_addbuttons() {
                   // Don't bother doing this stuff if the current user lacks permissions
                   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
                     return;

                   // Add only in Rich Editor mode
                   if ( get_user_option('rich_editing') == 'true') {

                     add_filter("mce_external_plugins", array(&$this, 'add_myplugin_tinymce_plugin'),1 );
                     add_filter('mce_buttons', array(&$this, 'register_myplugin_button'),1);

                     //need to add filter for external_image_list_url
                     add_filter('tiny_mce_before_init', array(&$this, 'my_change_mce_options'), 1);
                   }
                }

                function my_change_mce_options( $init ) {

                    $init['external_image_list_url'] = get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/tinymce/gallery/js/external_image_list.js.php';
                    $init['select_image'] = get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/tinymce/gallery/img/select_image.jpg';
                    return $init;
                }

                function register_myplugin_button($buttons) {

                   array_push($buttons, "TinymceThumbnailGallery");
                   return $buttons;
                }

                // Load the TinyMCE plugin : editor_plugin.js (wp2.5)
                function add_myplugin_tinymce_plugin($plugin_array) {

                   $plugin_array['TinymceThumbnailGallery'] =  get_bloginfo('wpurl') . '/wp-content/plugins/tinymce-thumbnail-gallery/tinymce/gallery/editor_plugin.js';

                   return $plugin_array;
                }



            

	}

} //End Class TinymceThumbnailGallery

//Initialize the admin panel
if (!function_exists("TinymceThumbnailGallery_ap")) {
    function TinymceThumbnailGallery_ap() {
        
        global $tinymce_thumbnail_gallery_plugin;
        if (!isset($tinymce_thumbnail_gallery_plugin)) {
            return;
        }
       
        if (function_exists('add_options_page')) {
           
            add_options_page('Tinymce Thumbnail Gallery', 'Tinymce Thumbnail Gallery', 9, basename(__FILE__), array(&$tinymce_thumbnail_gallery_plugin, 'printAdminPage'));
            
        }

    }
}



if (class_exists("TinymceThumbnailGallery")) {
	$tinymce_thumbnail_gallery_plugin = new TinymceThumbnailGallery();
}



//Actions and Filters	
if (isset($tinymce_thumbnail_gallery_plugin)) {
	//Actions
        add_action('init',  array(&$tinymce_thumbnail_gallery_plugin, 'myplugin_addbuttons'),1);
    	add_action('wp_head', array(&$tinymce_thumbnail_gallery_plugin, 'addHeaderCode'), 1);
        add_action('wp_footer', array(&$tinymce_thumbnail_gallery_plugin, 'addFooterCode'), 1);
        add_action('admin_menu', 'TinymceThumbnailGallery_ap');
        add_action('activate_tinymce-thumbnail-gallery/tinymce-thumbnail-gallery.php', array(&$tinymce_thumbnail_gallery_plugin, 'init'));
         

        ////Filters
        add_filter( "the_content", array(&$tinymce_thumbnail_gallery_plugin, 'linkFilter'));
        //image download filter
      
}


