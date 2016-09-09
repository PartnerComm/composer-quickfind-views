<?php $contact = new \PCommContacts(); ?>
<div class="wrap_contact_group">
<div class="container"><h2>Contacts for <?php //echo $page_title; ?></h2></div>
    <div class="container"><h2>Contacts</h2></div>
    <div class="contacts_container qf_view container">
        <?php foreach($posts as $post) : ?>

            <div class="contact_tile <?php echo $post->getStructure()->getGroupView(); ?>">
                <article class="article_content">
                    <h3> <?php echo $post->getPostTitle(); ?></h3>
                    <?php $pc_administrator = $post->getCustom('pc_administrator'); ?>
                    <?php if(!empty($pc_administrator[0])): ?>
                        <div class="administrators"><?php echo $contact->output_administrator(unserialize($pc_administrator[0])); ?></div>
                    <?php endif; ?>
                    <?php $pc_phone_number = $post->getCustom('pc_phone_number'); ?>
                    <?php if(!empty($pc_phone_number[0])): ?>
                        <div class="contact_phones"><?php echo $contact->output_phone_numbers(unserialize($pc_phone_number[0])); ?></div>
                    <?php endif; ?>

                    <?php $pc_url = $post->getCustom('pc_url'); ?>
                    <?php if(!empty($pc_url[0])): ?>
                        <div class="contact_urls">
                            <div class="handle_breaks"> <?php echo $contact->output_urls(unserialize($pc_url[0]))); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php $pc_mailing_address = $post->getCustom('pc_mailing_address'); ?>
                    <?php if(!empty($pc_mailing_address[0])): ?>
                        <div class="contact_addresses"><?php echo $contact->output_mailing_address(unserialize($pc_mailing_address[0])); ?> </div>
                    <?php endif; ?>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>