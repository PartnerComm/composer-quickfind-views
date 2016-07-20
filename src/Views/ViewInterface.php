<?php
/**
 * Created by PhpStorm.
 * User: chadwickcole
 * Date: 5/18/16
 * Time: 11:16 AM
 */

namespace PComm\QuickFind\Views;


interface ViewInterface
{
    /**
     * ViewInterface constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data);

    /**
     * @return string   HTML block for view
     */
    public function render();
}