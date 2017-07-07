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
			<div class="datphong region-content">
				<h4 class="title">Đặt Phòng<span class="title-block"></span></h4>
				<div class="booking-form">
					<?php echo do_shortcode('[contact-form-7 id="73" title="đặt phòng"]'); ?>
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