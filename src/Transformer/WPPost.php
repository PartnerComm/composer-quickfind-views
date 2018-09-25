<?php

namespace PComm\QuickFind\Transformer;

class WPPost implements PostInterface
{
    protected $original_post;

    /**
     * @var \PComm\QuickFind\Transformer\TermInterface[]
     */
    protected $terms = [];

    /**
     * @var \PComm\QuickFind\Transformer\StructureInterface
     */
    protected $structure;

    /**
     * @var \PComm\Contacts\ContactMethodInterface[]
     */
    protected $methods = [];

    public function __construct(\WP_Post $post)
    {
        $this->original_post = $post;
    }

    public function getPostID()
    {
        return $this->original_post->ID;
    }

    public function getPostTitle()
    {
        return $this->original_post->post_title;
    }

    public function getPostExcerpt()
    {
        return $this->original_post->post_excerpt;
    }

    public function getPostContent()
    {
        if($this->isPrivate()) {
            return "<span class='redacted'>redacted<span>";
        }

        return str_replace(']]>',']]&gt>', apply_filters('the_content', $this->original_post->post_content));
	}
	
	public function getPostContentRaw()
    {
        if($this->isPrivate()) {
            return "<span class='redacted'>redacted<span>";
        }

        return str_replace(']]>',']]&gt>',  $this->original_post->post_content);
    }

    public function isPrivate()
    {
        # TODO: Also make available for roles
        if($this->getCustom('require-login') && !is_user_logged_in()) {
            return true;
        }
    }

    public function getPostSlug()
    {
        return $this->original_post->post_name;
    }

    public function getMenuOrder()
    {
        return $this->original_post->menu_order;
    }

    public function getPostType()
    {
        return $this->original_post->post_type;
    }

    public function getStructure()
    {
        return $this->structure;
    }

    public function setStructure(\PComm\QuickFind\Transformer\StructureInterface $structure)
    {
        $this->structure = $structure;
    }

    public function addTerm(\PComm\QuickFind\Transformer\TermInterface $term)
    {
        $this->terms[$term->getTermID()] = $term;
    }

    public function getTermsByTaxonomy($string)
    {
        $taxonomyTerms = [];
        foreach($this->terms as $term) {
            if($term->getTermTaxonomy() == $string) {
                $taxonomyTerms[] = $term;
            }
        }

        return $taxonomyTerms;
    }

    /**
     * @param $field
     * @return array|null\
     */
    public function getCustom($field) {
        return get_post_custom_values($field, $this->original_post->ID);
    }

    /**
     * @return bool
     */
    public function getPostThumbnail()
    {
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($this->original_post->ID), 'full' );
        return (!empty($thumbnail[0])) ? $thumbnail[0] : FALSE;
    }

    /**
     * @param \PComm\Contacts\ContactMethodInterface $method
     */
    public function addMethod(\PComm\Contacts\ContactMethodInterface $method)
    {
        $this->methods[] = $method;
    }

    /**
     * @return \PComm\Contacts\ContactMethodInterface[]
     */
    public function getMethods()
    {
        return $this->methods;
    }


}