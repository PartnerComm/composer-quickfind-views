<?php

namespace PComm\QuickFind\Transformer;

interface PostInterface
{
    public function getPostID();
    public function getPostTitle();
    public function getPostExcerpt();
    public function getPostContent();
    public function getPostSlug();
    public function getMenuOrder();
    public function getPostType();
    public function addTerm(\PComm\QuickFind\Transformer\TermInterface $term);
    public function getTermsByTaxonomy($string);
    public function getStructure();
    public function setStructure(\PComm\QuickFind\Transformer\StructureInterface $structure);
    public function getCustom($field);
    public function getPostThumbnail();

}
