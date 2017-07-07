	<?php if ( get_custom('video_iframe') != "" ) { ?>
		<div class="video-popup">
			<div class="video-container">
				<span class="close">Close</span>
				<span class="minimize">thu nho</span>
				<div class="video"><?php echo get_custom('video_iframe'); ?></div>
			</div>
			<div class="openvideo">Xem Video</div>
		</div>

	 <?php } ?>
	<div id="footer">
		<div class="footer-content">
				<?php get_sidebar( 'footer' ); ?>
				<div id="footer-second">
					<div class="copyright">Copyright ©2015 by HAM RONG RUBBER TOURISM JSC. All rights reserved.</div>
				</div>
		</div>
	</footer> <!-- #main-footer -->

	<?php wp_footer(); ?>
</body>
</html>