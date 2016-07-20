<div class="wrap_footnotes">
    <div class="container">
        <div class="footnotes_container qf_view col-12">
            <?php foreach($posts as $post): ?>
                <article class="article_content <?php echo $post->getStructure()->getGroupView(); ?>">
                <?php echo $post->getPostContent(); ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>