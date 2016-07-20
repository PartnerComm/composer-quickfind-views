<?php
/**
 * Created by PhpStorm.
 * User: chadwickcole
 * Date: 5/18/16
 * Time: 11:25 AM
 */

namespace PComm\QuickFind\Views;


abstract class ViewOne implements ViewInterface
{
    protected $data;
    protected $template = FALSE;
    protected $altTemplateDirectory = FALSE;
    protected $renderedView;
    protected $requiredKeys = ['view'];

    public function __construct(array $data, $title='', $atd = FALSE)
    {
        $this->validateData($data);
        $this->data = $data;
        $this->altTemplateDirectory = $atd;
        if(!empty($data['view'])) {
            $this->setTemplate($data['view']);
        }
    }

    public function render()
    {
        if(!$this->template) {
            return "Error Loading Template";
        }

        ob_start();
        extract($this->data);
        if(!empty($posts[0])) {
            $post = $posts[0];
        }
        include($this->template);
        $output = ob_get_clean();
        return $output;
    }

    protected function setTemplate($template)
    {
        if(file_exists(__DIR__.'/Templates/'.$template.'.php')) {
            $this->template = __DIR__.'/Templates/'.$template.'.php';
        }

        if($this->altTemplateDirectory && file_exists($this->altTemplateDirectory.'/'.$template.'.php')) {
            $this->template = $this->altTemplateDirectory.'/'.$template.'.php';
        }

        if(empty($this->template)) {
            throw new \Exception('Error Finding Template : '.$template);
        }
    }

    protected function validateData(array $data)
    {
        foreach($this->requiredKeys as $key) {
            if (empty($data[$key])) {
                throw new \Exception('Missing required fields');
            }
        }
    }
}