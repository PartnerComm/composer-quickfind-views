<div class="wrap_resource_group">
    <div class="resource_container qf_view container">
        <h2>Resources</h2>
        <div class="article_content">
            <ul class="resource_list">
                <?php foreach($posts as $post): ?>
                <?php $link = $post->getCustom('button_link'); ?>
                <?php $link = !empty($link[0]) ? $link[0] : ""; ?>
                <li class="<?php echo $post->getStructure()->getGroupView(); ?>">
                    <a href="<?php echo $link; ?>"><?php echo $post->getPostTitle(); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>