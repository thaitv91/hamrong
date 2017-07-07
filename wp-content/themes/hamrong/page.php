<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div id="main-content" class="cls">
	<div id="slider" class="content-wrapper">
		<?php echo do_shortcode('[metaslider id=29]'); ?>
	</div>
	<div id="sukien" class="content-wrapper">
		<h4 class="title">Tin tức<span class="title-block"></span></h4>
		<?php 
			
			$args = array(
				'posts_per_page' => '4',
				'orderby' => 'date',
				'post_type' => 'sukien',
				'post_status' => 'publish',
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
					<?php the_excerpt(); ?>
					<div class="readmore"><a href="<?php echo get_permalink( $post->ID ) ?>">Chi tiêt</a></div>
				</div>
			</div>
			<?php endwhile; /*wp_pagenavi( array( 'query' => $sukien ) );*/ endif; wp_reset_postdata(); ?>
		</div>
		<div class="viewall"><a href="<?php echo get_permalink(93); ?>" target="_blank">Xem thêm</a></div>
	</div>

	<div id="sukien" class="content-wrapper">
		<h4 class="title">Tour<span class="title-block"></span></h4>
		<?php 
			
			$args = array(
				'posts_per_page' => '4',
				'orderby' => 'date',
				'post_type' => 'tour',
				'post_status' => 'publish',
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
			<?php endwhile; /*wp_pagenavi( array( 'query' => $sukien ) );*/ endif; wp_reset_postdata(); ?>
		</div>
		<div class="viewall"><a href="<?php echo get_permalink(127); ?>" target="_blank">Xem thêm</a></div>
	</div>

	<div id="khudulich" class="content-wrapper">
		<h4 class="title">Khu du lịch<span class="title-block"></span></h4>
		<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$argskdl = array(
				'posts_per_page' => '2',
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
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
		<div class="viewall"><a href="<?php echo get_permalink(100); ?>" target="_blank">Xem thêm</a></div>
	</div>

	<div id="phong" class="content-wrapper">
		<h4 class="title">Phòng<span class="title-block"></span></h4>
		<?php 
			$argsp = array(
				'posts_per_page' => '6',
				'orderby' => 'date',
				'post_type' => 'room',
				'post_status' => 'publish',
			);
			$phong = new WP_Query( $argsp );
		?>
		<div class="content">
			<?php if ( $phong->have_posts() ) : while ( $phong->have_posts() ) : $phong->the_post(); ?>
			<div class="room-item">
				<div class="room-content">
					<a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></a>
					<div class="room-rate"><b>Loại phòng: </b><span><?php echo get_the_title( $post->ID ); ?></span></div>
					<div class="room-price"><b>Giá: </b><span><?php echo get_custom_field('cost'); ?></span></div>
					<div class="readmore"><a href="<?php echo get_permalink( $post->ID ) ?>">Đặt phòng</a></div>
				</div>
			</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
	<div id="giaithuong" class="content-wrapper">
		<h4 class="title">Giải Thưởng<span class="title-block"></span></h4>
		<?php 
			$argsgt = array(
				'posts_per_page' => '4',
				'orderby' => 'date',
				'post_type' => 'post',
				'cat'	=> '4',
				'post_status' => 'publish',
			);
			$giaithuong = new WP_Query( $argsgt );
		?>
		<div class="content">
			<ul>
				<?php if ( $giaithuong->have_posts() ) : while ( $giaithuong->have_posts() ) : $giaithuong->the_post(); ?>
				<li class="gt-item"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></li>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
	<div id="gallery" class="content-wrapper">
		<h4 class="title">Photo Gallery<span class="title-block"></span></h4>
		<?php echo do_shortcode('[WRG id=58]'); ?>
	</div>
	<!-- End -->

</div>

<?php get_footer(); ?>