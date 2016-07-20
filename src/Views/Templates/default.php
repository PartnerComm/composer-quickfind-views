<div class="container">
    <div class="text_container qf_view col-12">
        Error Loading: <?php echo $view; ?>
        <article class="text">
            <h2><?php echo $post->getPostTitle(); ?></h2>
            <?php echo $post->getPostContent(); ?>
        </article>
    </div>
</div>