<?php

namespace PComm\QuickFind\Transformer;

function apply_filters($filter, $content) {
    switch($filter) {
        case 'the_content' :
            return str_replace('the', 'foo', $content);
            break;
    }
}

class WPPostTest extends \PHPUnit_Framework_TestCase
{
    public function testWPPostWorks() {
        $testPost = $this->getTestPost();

        $testWPObj = new \WP_Post((object) $testPost);

        $testWPPostInstance = new WPPost($testWPObj);

        $this->assertEquals($testPost['ID'], $testWPPostInstance->getPostID());
        $this->assertEquals($testPost['post_title'], $testWPPostInstance->getPostTitle());
        $this->assertEquals($testPost['post_excerpt'], $testWPPostInstance->getPostExcerpt());
        $this->assertEquals(str_replace('the', 'foo', $testPost['post_content']), $testWPPostInstance->getPostContent());
        $this->assertEquals($testPost['post_name'], $testWPPostInstance->getPostSlug());
        $this->assertEquals($testPost['menu_order'], $testWPPostInstance->getMenuOrder());
        $this->assertEquals($testPost['post_type'], $testWPPostInstance->getPostType());

    }

    public function testWPPostGetTermsByTaxonomy() {
        $testPost = $this->getTestPost();

        $testWPObj = new \WP_Post((object) $testPost);

        $testWPPostInstance = new WPPost($testWPObj);

        $testTerm = $this->getTestTerm();

        $testWPTerm = new \WP_Term((object) $testTerm);

        $testWPTermInstance = new WPTerm($testWPTerm);

        $testWPPostInstance->addTerm($testWPTermInstance);

        $this->assertEquals([$testWPTermInstance], $testWPPostInstance->getTermsByTaxonomy('keyword'));


    }

    /**
     * @return array
     */
    private function getTestPost() {
        $testPost = [
            'ID' => 6808,
            'post_title' => '2016 medical premiums',
            'post_excerpt' => 'This is the excerpt.',
            'post_content' => 'The only the in the phrase.',
            'post_name' => '2016-medical-premiums',
            'menu_order' => 0,
            'post_type' => 'medical-type'
        ];

        return $testPost;
    }

    private function getTestTerm() {
        $testTerm = [
            'term_id' => 8,
            'name' => "091-Overview",
            'slug' => "overview",
            'term_group' => 0,
            'term_taxonomy_id' => 8,
            'taxonomy' => "keyword",
            'description' => "This is the term description",
            'parent' => 2,
            'count' => 26,
            'filter' => 'raw',
            'term_order' => 0
        ];

        return $testTerm;
    }



}