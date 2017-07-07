<?php 
/* Template Name: Tour	*/
	get_header(); 
?>
<div id="main-content" class="cls">
	
	<div id="sukien" class="content-wrapper">
		<h4 class="title"><?php the_title(); ?><span class="title-block"></span></h4>
		<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'posts_per_page' => '6',
				'orderby' => 'date',
				'post_type' => 'tour',
				'post_status' => 'publish',
				'paged' => $paged,
			);
			$sukien = new WP_Query( $args );
		?>
		<div class="content">
			<?php if ( $sukien->have_posts() ) : while ( $sukien->have_posts() ) : $sukien->the_post(); ?>
			<div class="sk-item col-md-6">
				<div class="sk-name"><a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo get_the_title( $post->ID ); ?></a></div>
				<div class="sk-left">
					<a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></a>
				</div>
				<div class="sk-right">
					<div><b>Thời gian: </b><span><?php echo get_custom_field('thoigian'); ?></span></div>
					<div><b>Khởi hành: </b><span><?php echo get_custom_field('khoihanh'); ?></span></div>
					<div><b>Điểm tham quan: </b><span><?php echo get_custom_field('diadiem'); ?></span></div>
					<div><b>Giá từ: </b><span><?php echo get_custom_field('cost'); ?></span></div>
					<div class="readmore"><a href="<?php echo get_permalink( $post->ID ) ?>">Chi tiêt</a></div>
				</div>
			</div>
			<?php endwhile; wp_pagenavi( array( 'query' => $sukien ) ); endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>