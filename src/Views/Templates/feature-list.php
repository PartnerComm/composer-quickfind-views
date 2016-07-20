<div class="wrap_features">
    <div class="container">
        <div class="features_container qf_view col-12">
            <div class="icon_features"><p>FEATURES</p></div>
            <?php foreach($posts as $post): ?>
            <article class="article_content <?php echo $post->getStructure()->getGroupView(); ?>">
                <h2><?php echo $post->getPostTitle(); ?></h2>
                <?php echo $post->getPostContent(); ?>
            </article>
        </div>
    </div>
</div>