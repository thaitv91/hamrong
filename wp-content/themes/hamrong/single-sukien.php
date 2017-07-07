<?php get_header(); 

?>

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
					<div>
					<span class="next"><?php next_posts_link( 'Older posts', $post->max_num_pages ); ?></span>
					<span class="prev"><?php previous_posts_link( 'Newer posts', $post->max_num_pages ); ?>
					</div>
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
								'post_type' => 'sukien',
								'post_status' => 'publish',
							);
							$sukien = new WP_Query( $args );
							if ( $sukien->have_posts() ) : while ( $sukien->have_posts() ) : $sukien->the_post();
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