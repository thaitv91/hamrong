<?php get_header(); ?>

<div id="main-content" class="cls">
	<div class="title-container"><h2 class="single-title"><?php the_title(); ?></h2></div>
	<div class="content-wrapper">
		<div class="main-content">
			<?php 
				$gallery = get_custom_field('gallery_images');
				if ( !is_null($gallery) ) :
			?>
			<h4 class="title">Hình ảnh<span class="title-block"></span></h4>
			<div class="gallery-dp">
				<ul class="list-image">
					<?php foreach ($gallery as $gal) { ?>
					<li><a href="<?php echo $gal; ?>" data-lightbox="roadtrip"><img src="<?php echo $gal; ?>"></a></li>
					<?php }	?>
				</ul>
			</div>
			<?php endif;?>
			<h4 class="title chitiet">Chi tiết<span class="title-block"></span></h4>
			<div class="main-dp">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="sidebar left-sidebar">
			<div class="sukien region-content">
				<h4 class="title">Sự Kiện Mới nhất<span class="title-block"></span></h4>
				<div class="sk-list">
					<ul>
						<?php 
							$args = array(
								'posts_per_page' => '4',
								'orderby' => 'date',
								'post_type' => 'khudulich',
								'post_status' => 'publish',
							);
							$khudulich = new WP_Query( $args );
							if ( $khudulich->have_posts() ) : while ( $khudulich->have_posts() ) : $khudulich->the_post();
						?>
						<li class="item"><a href="<?php the_permalink() ?>" target="_blank"><?php echo get_the_title(); ?></a></li>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>
			<div class="lienhe region-content">
				<h4 class="title">Liên Hệ<span class="title-block"></span></h4>
				<ul class="contact-list">
					<li class="phone"><b>Số điện thoại:</b> <?php echo get_custom('sdt') ?></li>
					<li class="email"><b>Email</b>: <?php echo get_custom('email') ?></li>
					<li class="address"><b>Địa chỉ</b>: <?php echo get_custom('address') ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>