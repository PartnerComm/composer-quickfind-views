<div class="wrap_tout_group">
    <div class="tout_container qf_view">
        <?php

            $tout_count = count($posts);

            if($tout_count >= 3) {
                $cols = 'col-4';
            }

            else {
                $cols = 'col-6';
            }

            $first_tout = "first_tout";
        ?>
        <?php foreach($posts as $post): ?>
            <div class="article_content <?php echo $cols; ?>">
            <article class="article_content  <?php echo $view . ' ' . $first_tout; ?>">
                <?php

                    $link = $post->getCustom('button_link')[0];
                    $button = $post->getCustom('button_name')[0];

                ?>
                <h3><?php echo $post->getPostTitle(); ?></h3>
                <p><?php echo $post->getPostExcerpt(); ?></p>
                <p class="btn_container btn_center">
                    <a class="button btn_primary" href="<?php echo $link; ?>"><?php echo $button;?></a>
                </p>
            </article>
            </div>
        <?php $first_tout = ""; endforeach; ?>
    </div>
</div>