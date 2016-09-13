<div class="wrap_default_group">
    <div class="container">
        <div class="default_group_container qf_view col-12">
            <p class="error">Required view: <strong><?php echo $view; ?></strong></p>
            <?php foreach($posts as $post): ?>
                <article class="article_content <?php $post->getStructure()->getGroupView();?>">
                    <h2><?php echo $post->getPostTitle();?></h2>
                    <?php echo $post->getPostContent(); ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>