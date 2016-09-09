<div class="wrap_default">
    <div class="container">
        <div class="default_container qf_view col-12">
            <p class=error">Error Loading: <?php echo $view; ?></p>
            <article class="text">
                <h2><?php echo $post->getPostTitle(); ?></h2>
                <?php echo $post->getPostContent(); ?>
            </article>
        </div>
    </div>
</div>