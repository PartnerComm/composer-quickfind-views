<?php
/**
 * Created by PhpStorm.
 * User: chadwickcole
 * Date: 7/1/16
 * Time: 10:25 AM
 */

namespace PComm\QuickFind\Transformer;


class WPTerm implements TermInterface
{
    /**
     * @var \WP_Term
     */
    protected $originalTerm;

    public function __construct(\WP_Term $term)
    {
        $this->originalTerm = $term;
    }

    public function getTermID()
    {
        return $this->originalTerm->term_id;
    }

    public function getTermName()
    {
        return $this->originalTerm->name;
    }

    public function getTermSlug()
    {
        return $this->originalTerm->slug;
    }

    public function getTermTaxonomy()
    {
       return $this->originalTerm->taxonomy;
    }

    public function getTermDescription()
    {
       return $this->originalTerm->description;
    }

    public function getTermMeta()
    {
        if(!empty($this->originalTerm->meta)) {
            return $this->originalTerm->meta;
        }

        return [];
    }

    public function getTermParent()
    {
        return $this->originalTerm->parent;
    }

    public function getTermOrder()
    {
        if(!empty($this->originalTerm->term_order)) {
            return $this->originalTerm->term_order;
        }

        return 0;
    }

}