<?php

namespace PComm\QuickFind\Transformer;

class WPOrderLayoutTest extends \PHPUnit_Framework_TestCase
{
    public function testWPPostWorks() {
        $testObj = new \stdClass();

        $testObj->post_id = 6808;
        $testObj->term_id = 8;
        $testObj->term_name = '091-Overview';
        $testObj->term_slug = 'overview';
        $testObj->sort_order = 80;
        $testObj->group_slug = 'medical-overview-resources';
        $testObj->group_order = 13;
        $testObj->layout = 'resource-group';
        $testObj->group_layout = 'resource-download';

        $testWPOrderLayoutInstance = new WPOrderLayout($testObj);

        $this->assertEquals($testObj->post_id, $testWPOrderLayoutInstance->getPostID());
        $this->assertEquals($testObj->term_id, $testWPOrderLayoutInstance->getTermID());
        $this->assertEquals($testObj->term_name, $testWPOrderLayoutInstance->getTermName());
        $this->assertEquals($testObj->term_slug, $testWPOrderLayoutInstance->getTermSlug());
        $this->assertEquals($testObj->sort_order, $testWPOrderLayoutInstance->getSortOrder());
        $this->assertEquals($testObj->group_slug, $testWPOrderLayoutInstance->getGroupSlug());
        $this->assertEquals($testObj->group_order, $testWPOrderLayoutInstance->getGroupOrder());
        $this->assertEquals($testObj->group_layout, $testWPOrderLayoutInstance->getGroupView());
        $this->assertEquals($testObj->layout, $testWPOrderLayoutInstance->getView());

    }



}