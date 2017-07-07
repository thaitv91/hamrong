<?php
add_shortcode( 'WRG', 'image_gallery_premium_short_code' );
function image_gallery_premium_short_code( $Id ) {
	ob_start();
	if(!isset($Id['id'])) {
	$Id['id'] = "";
	}
	/**
     * Load Responsive Gallery Settings
     */
    
	$WL_RG_Settings  = unserialize( get_option("WL_IGP_Settings") );
	if(count($WL_RG_Settings)) {
        $WL_Hover_Animation     = $WL_RG_Settings['WL_Hover_Animation'];
        $WL_Gallery_Layout      = $WL_RG_Settings['WL_Gallery_Layout'];
        $WL_Hover_Color         = $WL_RG_Settings['WL_Hover_Color'];
        $WL_Hover_Color_Opacity = 1;
        $WL_Font_Style          = $WL_RG_Settings['WL_Font_Style'];
        $WL_Image_View_Icon     = $WL_RG_Settings['WL_Image_View_Icon'];
		$WL_Gallery_Title       =  $WL_RG_Settings['WL_Gallery_Title'];
		$WL_Hover_Color_Opacity = $WL_RG_Settings['WL_Hover_Color_Opacity'];
    } else {
		$WL_Hover_Color_Opacity = 1;
		$WL_Hover_Animation     = "fade";
        $WL_Gallery_Layout      = "col-md-6";
        $WL_Hover_Color         = "#74C9BE";
        $WL_Font_Style          = "Arial";
        $WL_Image_View_Icon     = "fa-picture-o";
		$WL_Gallery_Title       = "yes";
		$WL_Hover_Color_Opacity = "1";
    }
	$RGB = RPGhex2rgbWeblizar($WL_Hover_Color);
    $HoverColorRGB = implode(", ", $RGB);
	?>

    <?php
    /**
     * Load All Image Gallery Custom Post Type
     */
    $IG_CPT_Name = "responsive-gallery";
    $IG_Taxonomy_Name = "category";
	$all_posts = wp_count_posts( 'responsive-gallery')->publish;
	$AllGalleries = array( 'p' => $Id['id'], 'post_type' => $IG_CPT_Name, 'orderby' => 'ASC','posts_per_page' =>$all_posts);

    $loop = new WP_Query( $AllGalleries );
    ?>
    <div id="gallery-home" class="gal-container">
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <!--get the post id-->
        <?php $post_id = $Id['id']; ?>
        <ul class="slides">
			<div id="gal-container-<?php echo $post_id; ?>" style="display: block; overflow:hidden;">
				<!-- gallery photos-->
				<div style="max-width:100%;" class="master-slider-parent ms-staff-carousel ms-parent-id-1" id="P_MS558a1eec15846">
					<div class="master-slider ms-skin-metro" id="MS558a1eec15846">
					<?php

					/**
					 * Get All Photos from Gallery Post Meta
					 */
					$rpg_all_photos_details = unserialize(get_post_meta( get_the_ID(), 'rpg_all_photos_details', true));
					//print_r(($rpg_all_photos_details)); echo "<br><br>";
					$TotalImages =  get_post_meta( get_the_ID(), 'rpg_total_images_count', true );
					$i = 1;

					foreach($rpg_all_photos_details as $rpg_single_photos_detail) {
						$name = $rpg_single_photos_detail['rpg_image_label'];
						$url = $rpg_single_photos_detail['rpg_image_url'];
						?>
	                        <div data-fill-mode="fill" data-delay="3" class="ms-slide">
	                            <img data-src="<?php echo $url; ?>" title="" alt="" src="images/blank.gif">
	                            <div class="ms-info">&nbsp;</div>
	                        </div> 

						<?php } ?>
					</div>
				</div>
			</div>
		</ul>
    <?php endwhile; ?>
    </div>
   <?php wp_reset_query(); 
    return ob_get_clean();
}
?>