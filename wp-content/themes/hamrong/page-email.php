<?php
/* Template Name: Email */ 
get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
?>

<div id="main-content" class="video-page">
    <?php echo do_shortcode('[cfdb-datatable form="đặt phòng" edit="true"]'); ?>
</div>
<?php get_footer(); ?>