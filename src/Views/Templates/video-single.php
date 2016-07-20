<?php
    $video_class = $post->getCustom('video_class');
    $video_class = !empty($video_class[0]) ? $video_class[0] : "";
?>
<div class="container">
    <div class="video_single_container qf_view col-12">
        <div class="icon_video"><p>VIDEO</p></div>
        <article class="<?php echo $view . ' ' . $video_class; ?>">
            <?php echo $post->getPostContent(); ?>
        </article>
    </div>
</div>