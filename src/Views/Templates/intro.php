<div class="wrap_intro">
    <div class="container">
        <div class="intro_container qf_view col-12">
            <article class="article_content <?php echo $view; ?>">
                <h1><?php echo $post->getPostTitle();?></h1>
                <?php echo $post->getPostContent(); ?>
                <p class="intro_border">&nbsp;</p>
            </article>
        </div>
    </div>
</div>