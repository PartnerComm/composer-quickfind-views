<?php

namespace PComm\QuickFind;

class ViewOneTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Exception
     */
    public function testExpectsExceptionOnConstruct() {
        $data = [];
        $view = $this->getMockForAbstractClass('\PComm\QuickFind\Views\ViewOne', [$data]);
    }

    public function testRenderView() {
        $data = [
            'title' => 'Test Title',
            'view' => 'default',
            'formatted_content' => '<p>Test content</p>'
        ];

        $view = $this->getMockForAbstractClass('\PComm\QuickFind\Views\ViewOne', [$data]);
        $this->assertEquals(
            $this->loadTemplate(
                $data,
                __DIR__.'/../Views/Templates/default.php'),
            $view->render());
    }

    /**
     * @expectedException \Exception
     */
    public function testExceptionForBadTemplate()
    {
        $data = [
            'title' => 'Test Title',
            'view' => 'foo-monkey',
            'formatted_content' => '<p>Test content</p>'
        ];

        $mockView = $this->getMockForAbstractClass('\PComm\QuickFind\Views\ViewOne', [$data]);
        $mockView->setTemplate('foo-monkey');
    }

    /**
     * @param $data
     * @param $template
     * @return string
     */
    protected function loadTemplate($data, $template)
    {
        ob_start();
        extract($data);
        include($template);
        $output = ob_get_clean();
        return $output;
    }

}