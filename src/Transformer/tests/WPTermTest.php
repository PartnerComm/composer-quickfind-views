<?php

namespace PComm\QuickFind\Transformer;


class WPTermTest extends \PHPUnit_Framework_TestCase
{
    public function testWPTermDefaultWorks() {
        $terms = $this->getTerm();

        $testWPTerm = new \WP_Term((object) $terms);

        $testWPTermInstance = new WPTerm($testWPTerm);

        $this->assertEquals($terms['term_id'], $testWPTermInstance->getTermID());
        $this->assertEquals($terms['name'], $testWPTermInstance->getTermName());
        $this->assertEquals($terms['slug'], $testWPTermInstance->getTermSlug());
        $this->assertEquals($terms['taxonomy'], $testWPTermInstance->getTermTaxonomy());
        $this->assertEquals($terms['description'], $testWPTermInstance->getTermDescription());
        $this->assertEquals($terms['parent'], $testWPTermInstance->getTermParent());
        $this->assertEquals([], $testWPTermInstance->getTermMeta());
        $this->assertEquals(0, $testWPTermInstance->getTermOrder());

    }

    protected function getTerm() {
        $testTerm = [
            'term_id' => 11,
            'name' => '077-Compare Plans',
            'slug' => 'compare-plans',
            'taxonomy' => 'keyword',
            'description' => 'This is a keyword term.',
            'parent' => 2
        ];

        return $testTerm;
    }
}
