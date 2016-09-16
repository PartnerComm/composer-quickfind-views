<?php

namespace PComm\QuickFind\Views;

class DefaultView extends ViewOne {

    public function __construct(array $data, $title='', $atd = FALSE)
    {
        parent::__construct($data, $title, $atd);
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
            $this->template = __DIR__.'/Templates/default.php';

            if($this->data['isGroup']) {
                $this->template = __DIR__.'/Templates/default-group.php';

                if(!empty($this->data['table']['rows'])) {
                    $this->template = __DIR__.'/Templates/default-table.php';
                }
            }

        }
    }
}