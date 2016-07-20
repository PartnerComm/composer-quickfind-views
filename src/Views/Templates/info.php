<div class="container">
    <div class="info_container qf_view col-12">
        <article class="article_content <?php echo $view; ?>">
            <i class="fa fa-info-circle"></i>
            <h3><?php echo $post->getPostTitle(); ?></h3>
            <?php echo $post->getPostContent(); ?>
        </article>
    </div>
</div>