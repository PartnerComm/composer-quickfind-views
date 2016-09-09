<?php

namespace PComm\QuickFind\Views;

class DefaultView extends ViewOne {

    public function __construct(array $data, $title='', $atd = FALSE)
    {
        parent::__construct($data, $title, $atd);

        if($data['isGroup']) {
            $this->setTemplate('default-group');

            if(!empty($data['table']['rows'])) {
                $this->setTemplate('default-table');
            }
        }
    }
}