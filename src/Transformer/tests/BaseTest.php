<?php

namespace PComm\QuickFind\Transformer;

class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testBuildNodes()
    {
        $structure1 = $this->getStructure(['postID'=>1,'sortOrder'=>1]);
        $structure2 = $this->getStructure(['postID'=>2,'sortOrder'=>2]);
        $structure3 = $this->getStructure(['postID'=>3,'sortOrder'=>2]);
        $post1 = $this->getPost(['postID'=>1]);
        $post2 = $this->getPost(['postID'=>2]);
        $post3 = $this->getPost(['postID'=>3]);

        $base = new Base();
        $base->addPost($post1)
             ->addPost($post2)
             ->addPost($post3)
             ->addStructure($structure1)
             ->addStructure($structure2)
             ->addStructure($structure3);

        $nodes = $base->buildNodes()->getNodes();
        $this->assertEquals([$post2, $post3], $nodes[2]['posts']);

    }

    protected function getStructure(array $structureData)
    {
        $structure = $this->getMockBuilder('\PComm\QuickFind\Transformer\StructureInterface')
                          ->setMethods([
                              'getSortOrder',
                              'getPostID',
                              'getTermID',
                              'getTermName',
                              'getTermSlug',
                              'getGroupSlug',
                              'getGroupOrder',
                              'getView',
                              'getGroupView'
                          ])
                          ->getMock();

        $structure->method('getSortOrder')->willReturn($structureData['sortOrder']);
        $structure->method('getPostID')->willReturn($structureData['postID']);
        return $structure;
    }

    protected function getPost(array $postData)
    {
        $post = $this->getMockBuilder('\PComm\QuickFind\Transformer\PostInterface')
            ->setMethods([
                'getPostID',
                'getPostTitle',
                'getPostExcerpt',
                'getPostContent',
                'getPostSlug',
                'getMenuOrder',
                'getPostType',
                'getStructure',
                'setStructure',
                'addTerm',
                'getTermsByTaxonomy',
                'getCustom',
                'getPostThumbnail'
            ])
            ->getMock();

        $post->method('getPostID')->willReturn($postData['postID']);
        return $post;
    }
}