<?php 
/* Template Name: Khu du lich	*/
	get_header(); 
?>
<div id="main-content" class="cls">
	
	<div id="khudulich" class="content-wrapper">
		<h4 class="title">Khu du lịch<span class="title-block"></span></h4>
		<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$argskdl = array(
				'posts_per_page' => '8',
				'orderby' => 'date',
				'post_type' => 'khudulich',
				'post_status' => 'publish',
				'paged' => $paged,
			);
			$kdl = new WP_Query( $argskdl );
		?>
		<div class="content">
			<?php if ( $kdl->have_posts() ) : while ( $kdl->have_posts() ) : $kdl->the_post(); ?>
			<div class="sk-item col-md-6">
				<div class="sk-name"><a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo get_the_title( $post->ID ); ?></a></div>
				<div class="sk-left">
					<a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></a>
				</div>
				<div class="sk-right">
					<?php the_excerpt(); ?>
					<div class="readmore"><a href="<?php echo get_permalink( $post->ID ) ?>">Chi tiêt</a></div>
				</div>
			</div>
			<?php endwhile; wp_pagenavi( array( 'query' => $kdl ) ); endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>