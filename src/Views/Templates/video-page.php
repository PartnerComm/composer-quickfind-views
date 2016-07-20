<?php foreach($posts as $post): ?>
    <?php $group_view = $post->getStructure()->getGroupView(); ?>

    <?php if($group_view == 'video-hero'):?>
        <div class="wrap_video_hero">
            <div class="video_hero_container qf_view container">
                <?php
                $video_class = $post->getCustom('video_class');
                $video_class = !empty($video_class[0]) ? $video_class[0] : "video_container";
                ?>
                <div class="col-8">
                    <div class="<?php echo $video_class;?>">
                        <?php echo $post->getPostContent(); ?>
                    </div>
                </div>

                <div class="col-4">
                    <div class="video_text">
                        <article class="<?php echo $post->getStructure()->getGroupView();?>">
                            <h2><?php echo $post->getPostTitle();?></h2>
                            <p><?php echo $post->getPostExcerpt();?></p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endforeach;?>

<?php if(in_array('video-list', $groupViews)): ?>
    <div class="wrap_video_list">
        <div class="video_list_head container">
            <h3>More Videos …</h3>
        </div>

        <div class="video_list_container qf_view container">

            <?php foreach($posts as $post): ?>
                <?php $group_view = $post->getStructure()->getGroupView(); ?>

                <?php if($group_view != 'video-hero'):?>
                    <div class="col-3 article_content video_tile">
                        <article class="<?php echo $group_view;?>">
                            <?php
                            $video_link = $post->getCustom('video_link');
                            $video_link = !empty($video_link[0]) ? $video_link[0] : "#";
                            ?>
                            <figure class="video_thumb">
                                <a href="<?php echo $video_link;?>"><img src="<?php $post->getPostThumbnail();?>" /></a>
                            </figure>

                            <h4><a href="<?php echo $video_link;?>"><?php echo $post->getPostTitle();?></a></h4>

                        </article>
                    </div>
                <?php endif; ?>

            <?php endforeach;?>

        </div>
    </div>
<?php endif; ?>
