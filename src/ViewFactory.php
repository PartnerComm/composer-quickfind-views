<?php

namespace PComm\QuickFind;

class ViewFactory
{

    protected $alternateTemplateDir = '';

    public function __construct($atd = '')
    {
        if(is_dir($atd)) {
            $this->alternateTemplateDir = $atd;
        }
    }

    public function getView($node, $page_title="")
    {

        $layout = $this->slugToClass($node['view']);

        if(class_exists('\\PComm\\QuickFind\\Views\\' . $layout)) {
            $instanceName = '\\PComm\\QuickFind\\Views\\' . $layout;
            return new $instanceName($node, $page_title, $this->alternateTemplateDir);
        }

        return new \PComm\QuickFind\Views\DefaultView($node, $page_title, $this->alternateTemplateDir);

    }

    /**
     * Takes layout slug and converts to camelcase class name
     *
     * @param string $slug
     * @return string
     */
    protected function slugToClass($slug)
    {
        $slug = str_replace('-', ' ', $slug);
        $slug = ucwords($slug);
        $slug = str_replace(' ', '', $slug);

        return $slug;
    }
}