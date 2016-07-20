<?php

namespace PComm\QuickFind\Transformer;


class Base
{
    /**
     * @var \PComm\QuickFind\Transformer\PostInterface[]
     */
    protected $posts = [];

    /**
     * @var \PComm\QuickFind\Transformer\StructureInterface[]
     */
    protected $structures = [];
    protected $nodes = [];

    /**
     * add a post
     *
     * @param PostInterface $post
     * @return $this
     */
    public function addPost(\PComm\QuickFind\Transformer\PostInterface $post) {
        $this->posts[$post->getPostID()] = $post;
        return $this;
    }

    /**
     * Add a structure
     *
     * @param StructureInterface $structure
     * @return $this
     */
    public function addStructure(\PComm\QuickFind\Transformer\StructureInterface $structure) {
        $this->structures[] = $structure;
        return $this;
    }

    /**
     * Build the nodes for output
     *
     * @return $this
     */
    public function buildNodes() {
        foreach($this->structures as $structure) {
            if(empty($this->nodes[$structure->getSortOrder()])) {
                $this->nodes[$structure->getSortOrder()] = [
                    'view' => $structure->getView(),
                    'posts' => []
                ];
            }

            if(!empty($this->posts[$structure->getPostID()])) {
                $this->posts[$structure->getPostID()]->setStructure($structure);
            }

            /**
             * \PComm\QuickFind\Transformer\PostInterface[]
             */
            $this->nodes[$structure->getSortOrder()]['posts'][] = $this->posts[$structure->getPostID()];

            $this->nodes[$structure->getSortOrder()]['isGroup'] = (count($this->nodes[$structure->getSortOrder()]['posts']) > 1) ? true : false;
        }

        foreach($this->nodes as &$node) {
            $node['table'] = $this->buildTableStructure($node);
            $node['groupViews'] = $this->getGroupViews($node);
        }

        return $this;
    }

    protected function getGroupViews($node) {
        $groupViews = [];

        foreach($node['posts'] as $post) {
            $groupViews[] = $post->getStructure()->getGroupView();
        }

        return $groupViews;
    }

    protected function buildTableStructure($node)
    {
        $table = [
            'rows' => [],
            'cols' => []
        ];
        $postIndex = [];

        foreach($node['posts'] as $post) {
            $gheads = $post->getTermsByTaxonomy('group_head');
            $grows = $post->getTermsByTaxonomy('group_row');
            $rowHeadId = 0;
            $colHeadId = 0;

            if(count($grows) == 1) {
                $table['rows'][$grows[0]->getTermOrder()] = $grows[0];
                $rowHeadId = $grows[0]->getTermID();
            }
            if(count($gheads) == 1) {
                $table['cols'][$gheads[0]->getTermOrder()] = $gheads[0];
                $colHeadId = $gheads[0]->getTermID();
            }

            $postIndex[$rowHeadId.'-'.$colHeadId] = $post;
        }

        //Build By Rows
        foreach($table['rows'] as $row) {
            $cols = [];
            foreach($table['cols'] as $col) {
                $post = FALSE;
                if(!empty($postIndex[$row->getTermID().'-'.$col->getTermID()])) {
                    $post = $postIndex[$row->getTermID().'-'.$col->getTermID()];
                }
                $cols[] = [
                  'column' => $col,
                  'post' => $post
                ];
            }

            $table['byRows'][] = [
                'row' => $row,
                'cols' => $cols
            ];
        }

        //Build By Cols
        foreach($table['cols'] as $col) {
            $rows = [];
            foreach($table['rows'] as $row) {
                $post = FALSE;
                if(!empty($postIndex[$row->getTermID().'-'.$col->getTermID()])) {
                    $post = $postIndex[$row->getTermID().'-'.$col->getTermID()];
                }
                $rows[] = [
                    'row' => $row,
                    'post' => $post
                ];
            }

            $table['byCols'][] = [
                'col' => $col,
                'rows' => $rows
            ];
        }

        return $table;
    }

    /**
     * return the nodes from build
     *
     * @return array
     */
    public function getNodes() {
        return $this->nodes;
    }
}