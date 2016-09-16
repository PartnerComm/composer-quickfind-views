<div class="wrap_contact_group">
<div class="container"><h2>Contacts for <?php //echo $page_title; ?></h2></div>
    <div class="container"><h2>Contacts</h2></div>
    <div class="contacts_container qf_view container">
        <?php foreach($posts as $post) : ?>

            <div class="contact_tile <?php echo $post->getStructure()->getGroupView(); ?>">
                <article class="article_content">
                    <h3> <?php echo $post->getPostTitle(); ?></h3>

                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>