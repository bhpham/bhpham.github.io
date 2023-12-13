<?php
wp_enqueue_script('magnific-popup');
$title    = $instance['title'] ? $instance['title'] : '';
$content    = $instance['content'] ? $instance['content'] : '';
$url_video    = $instance['url_video'] ? $instance['url_video'] : '';
$img_video    = $instance['panel_image'] ? $instance['panel_image'] : '';
?>
<div class="video_popup">
    <?php if($title) {?>
    <h3><?php echo $title;?></h3>
    <?php }?>
    <?php if($content) {?>
    <span><?php echo $content;?></span>
    <?php }?>
    <?php if($img_video) {
        $src = $instance['panel_image'] ? wp_get_attachment_image_src( $instance['panel_image'], 'full' ) : '';
        ?>
        <img src="<?php echo $src[0];?>" alt="">
    <?php } else {?>

    <?php }?>
    <i class="fa fa-caret-right" data-key="video-popup"></i>
    <div class="mfp-hide" data-key="video-popup">
        <object style="max-width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;" data="<?php echo $url_video;?>"></object>
    </div>
</div>
