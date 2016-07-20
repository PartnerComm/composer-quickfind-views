<div class="wrap_tout_group">
    <div class="tout_container qf_view">
        <article class="col-12 first_tout article_content <?php echo $view; ?>">
            <?php
                $link = $post->getCustom('button_link')[0];
                $button = $post->getCustom('button_name')[0];
            ?>
            <h3><?php echo $post->getPostTitle(); ?></h3>
            <p><?php echo $post->getPostExcerpt(); ?></p>
            <p class="btn_container btn_center">
                <a class="button btn_primary" href="<?php echo $link; ?>"><?php echo $button; ?></a>
            </p>
        </article>
    </div>
</div>