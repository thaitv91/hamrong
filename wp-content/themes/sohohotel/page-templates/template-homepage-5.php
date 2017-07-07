<?php
	
	/* 
	Template Name: Homepage 5
	*/

	//Display Header
	get_header();
	
	//Get Post ID
	global $wp_query; $post_id = $wp_query->post->ID;
	
	//Get Header Image
	$header_image = page_header(get_post_meta($post_id, 'qns_page_header_image_url', true));
	
	//Get Content ID/Class
	$content_id_class = content_id_class(get_post_meta($post_id, 'qns_page_sidebar', true));
	
	//Reset Query
	wp_reset_query();



/* ------------------------------------------------
	Display Slideshow
------------------------------------------------ */

if ($smof_data['slideshow_display']) { ?>

<!-- BEGIN #slider -->
<div id="slider">

	<?php if ($smof_data['homepage_slider']) { ?>

		<div class="slider">
			<ul class="slides">
				<?php $slides = $smof_data['homepage_slider']; ?>	
				<?php foreach ($slides as $slide) { ?>
					<li>
						<?php if ( $slide['link'] ) { echo '<a href="' . $slide['link'] . '" target="_blank" class="slide-link">'; } ?>
						<img src="<?php echo $slide['url']; ?>" alt="" />
						<?php if ( $slide['description'] ) { 
							echo '<div class="slider-caption-wrapper"><div class="slider-caption">' . $slide['description'] . '</div></div>'; 
						} ?>
						<?php if ( $slide['link'] ) { echo '</a>'; } ?>
					</li>
				<?php } ?>
			</ul>
		</div>

	<?php } else { ?>
		<p><?php _e('No Slides','qns'); ?></p>
	<?php }



/* ------------------------------------------------
	Display Slideshow Booking Form
------------------------------------------------ */

if(is_plugin_active('quitenicebooking/quitenicebooking.php')) {
	if ( $smof_data['display_slideshow_booking'] && empty($quitenicebooking->settings['hide_booking_system']) ) {echo do_shortcode("[booking_form]");}
} ?>

<!-- END #slider -->
</div>

<?php } else { ?>

<?php }



/* ------------------------------------------------
	Display Three Blocks
------------------------------------------------ */
?>




<?php
/* ------------------------------------------------
	Display Testimonials Slider
------------------------------------------------ */
?>



<?php
/* ------------------------------------------------
	Display Blog Slider
------------------------------------------------ */
?>

<hr class="space1" />

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper">

<h3 class="title-style1"><?php _e('Blog','qns'); ?><span class="title-block"></span></h3>

<div class="text-slider-wrapper">

	<!-- BEGIN .slider -->
	<div class="text-slider">
		<ul class="slides">

			<?php $count = 0;
			
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => '10'
			);

			$blog_posts = new WP_Query($args);

			if($blog_posts->have_posts()) : 
				while($blog_posts->have_posts()) : 
					$blog_posts->the_post(); ?>

					<?php $current_num = $blog_posts->current_post + 1; ?>

					<?php if ( $blog_posts->current_post == 0 ) {
						echo '<li>';
					} elseif ( $blog_posts->current_post % 2 == 0 ) {
						echo '<li>';
					} ?>

					<!-- BEGIN .one-half -->
					<div class="one-half blog-event-one-half">
		
						<div class="blog-preview">
							
							<?php if( has_post_thumbnail() ) { ?>		
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'image-style1' ); ?>
									<?php echo '<img src="' . $src[0] . '" alt="" class="blog-image-thumb" />'; ?>
								</a>	
							<?php } ?>
							
							<div class="blog-entry-inner<?php if( !has_post_thumbnail() ) {echo ' blog-no-image';} ?>">	
								<h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span><?php _e('By','qns'); ?> <?php the_author_posts_link(); ?> / <?php the_time('jS F, Y'); ?></span></h4>
								<?php print_excerpt(150); ?>
							</div>
						</div>
		
					<!-- END .one-half -->	
					</div>

					<?php if ( $current_num % 2 == 0 ) {
						echo '</li>';
					} elseif ( $current_num == $blog_posts->post_count ) {
						echo '</li>';
					} ?>

				<?php endwhile; else : ?>
					<p><?php _e('No blog posts have been added yet','qns'); ?></p>
				<?php endif; ?>

		</ul>
		
	<!-- END .text-slider -->
	</div>
	
<!-- END .text-slider -->
</div>

<!-- END .content-wrapper -->
</div>



<?php
/* ------------------------------------------------
	Display Events Slider
------------------------------------------------ */
?>

<hr class="space1" />

<!-- BEGIN .dark-wrapper -->




<?php if ( $smof_data['homepage_photo_slider'] ) { ?>
<hr class="space1" />
<div class="content-wrapper">

<h3 class="title-style1"><?php _e('Photo Gallery','qns'); ?><span class="title-block"></span></h3>

<div class="text-slider-wrapper">

	<!-- BEGIN .slider -->
	<div class="text-slider">
		
		<ul class="slides">
			<?php echo do_shortcode($smof_data['homepage_photo_slider']); ?>
		</ul>
		
	<!-- END .text-slider -->
	</div>
	
<!-- END .text-slider -->
</div>

<!-- END .content-wrapper -->
</div>
<?php } ?>



<?php get_footer(); ?>