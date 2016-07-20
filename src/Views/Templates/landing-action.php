<div class="wrap_actions">
    <div class="actions_container qf_view container">

        <?php foreach($posts as $post): ?>

        <div class="col-6 article_content action_tile">
            <article class="' . $post['group_layout'] . '">

                <?php
                    $button_link = $post->getCustom('button_link');
                    $link = (!empty($button_link[0])) ? $button_link[0] : "#";

                    $button_name = $post->getCustom('button_name');
                    $button = (!empty($button_name[0])) ? $button_name[0] : "Learn more";
                ?>

                <figure class="action_icon"><img src="<?php echo $post->getPostThumbnail(); ?>" /></figure>
                <h3><?php echo $post->getPostTitle(); ?></h3>
                <?php echo $post->getPostContent(); ?>
                <p class="btn_container btn_center">
                    <a class="button btn_primary" href="<?php echo $link; ?>"><?php echo $button; ?></a>
                </p>

            </article>
        </div>

        <?php endforeach; ?>
    </div>
</div>