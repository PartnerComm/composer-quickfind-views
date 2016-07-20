<div class="wrap_important">
    <div class="container">
        <div class="important_container qf_view col-12">
            <div class="icon_important"><p>IMPORTANT</p></div>
            <article class="article_content <?php echo $view;?>">
                <h2><?php echo $post->getPostTitle(); ?></h2>
                <?php echo $post->getPostContent(); ?>
            </article>
        </div>
    </div>
</div>