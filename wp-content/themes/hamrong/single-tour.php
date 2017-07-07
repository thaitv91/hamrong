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
				<h4 class="title">Đặt Tour<span class="title-block"></span></h4>
				<div class="booking-form">
					<?php echo do_shortcode('[contact-form-7 id="126" title="đặt tour"]'); ?>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.et_pb_blurb_content a').each(function() {
			$(this).attr('href','javascript:void(0)');
		});
        $('.et_pb_blurb_content a').click(function() {
            $('.cs-buttons').hide();
            setTimeout(function() {
                var _id = $('.cs-buttons').attr('id');
                var _class = _id.replace('buttons', 'button');
                var _cl = new Array();
                $('#' + _id + ' .' + _class).each(function(index) {
                    if (_cl.indexOf($(this).attr('id')) == -1) {
                        _cl.push($(this).attr('id'));
                    }
                });
                var c = _cl.length;
                for (var i = c / 2; i < c; i++) {
                    $('#' + _cl[i]).remove();
                }
                for (var i = 0; i < (c / 2); i++) {
                    $('#' + _cl[i]).remove();
                }
                $('.cs-buttons a').removeClass('cs-active');
                $('#' + _cl[0]).addClass('cs-active');
                $('.cs-buttons').show();
            }, 1000);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
        });
        $('.cs-buttons a').live('click',function() {
            $('.cs-buttons a').removeClass('cs-active');
            $(this).addClass('cs-active');
        });
    });
</script>

<?php get_footer(); ?>