<?php

namespace PComm\QuickFind;

require_once('mocks/ChadsTestViewClass.php');

class ViewFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testUnkownReturnsDefaultView() {
        $node = [
            'view' => 'default',
            'posts' => [],
            'isGroup' => FALSE,
            'table' => []
        ];

        $viewFactory = new ViewFactory();

        $view = $viewFactory->getView($node);

        $this->assertEquals('PComm\QuickFind\Views\DefaultView', get_class($view));
    }
    
    public function testSlugToClassNameString() {
        $node = [
            'view' => 'chads-test-view-class',
            'posts' => [],
            'isGroup' => FALSE,
            'table' => []
        ];

        $viewFactory = new ViewFactory(__DIR__.'/mocks');

        $view = $viewFactory->getView($node);

        $this->assertEquals('PComm\QuickFind\Views\ChadsTestViewClass', get_class($view));
    }
}