<?php

namespace PComm\QuickFind\Transformer;

interface StructureInterface
{
    public function getPostID();
    public function getTermID();
    public function getTermName();
    public function getTermSlug();
    public function getSortOrder();
    public function getGroupSlug();
    public function getGroupOrder();
    public function getView();
    public function getGroupView();
}