<?php 
/* Template Name: khach san	*/
	get_header(); 
?>
<div id="main-content" class="cls">
	
	<div id="khachsan" class="content-wrapper">
		<div class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<h4 class="title"><?php the_title(); ?><span class="title-block"></span></h4>
				<div class="content"><?php the_content(); ?></div>
			<?php endwhile; ?>
		</div>
		<div class="sidebar left-sidebar">
			<div class="datphong region-content">
				<h4 class="title">đặt phòng<span class="title-block"></span></h4>
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