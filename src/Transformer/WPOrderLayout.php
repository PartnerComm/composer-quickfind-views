<?php

namespace PComm\QuickFind\Transformer;

class WPOrderLayout implements StructureInterface
{
    protected $structure;

    public function __construct(\stdClass $dbObject)
    {
        $this->structure = $dbObject;
    }

    public function getPostID()
    {
        return $this->structure->post_id;
    }

    public function getTermID()
    {
        return $this->structure->term_id;
    }

    public function getTermName()
    {
        return $this->structure->term_name;
    }

    public function getTermSlug()
    {
        return $this->structure->term_slug;
    }

    public function getSortOrder()
    {
        return $this->structure->sort_order;
    }

    public function getGroupSlug()
    {
        return $this->structure->group_slug;
    }

    public function getGroupOrder()
    {
        return $this->structure->group_order;
    }

    public function getView()
    {
        return $this->structure->layout;
    }

    public function getGroupView()
    {
        return $this->structure->group_layout;
    }

}