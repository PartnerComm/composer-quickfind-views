<div class="wrap_calout">
    <div class="container">
        <div class="callout_container qf_view col-12">
            <div class="icon_callout"><p>CONSIDER THIS</p></div>
                <?php foreach($posts as $post): ?>
                    <article class="article_content <?php $post->getStructure()->getGroupView();?>">
                        <h2><?php echo $post->getPostTitle();?></h2>
                        <?php echo $post->getPostContent(); ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>