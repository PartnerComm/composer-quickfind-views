<?php
/**
 * Created by PhpStorm.
 * User: chadwickcole
 * Date: 5/18/16
 * Time: 12:35 PM
 */

namespace PComm\QuickFind\Views;


class SinglePostView extends ViewOne
{
    public function build()
    {
        $text = '<div class="container">';
        $text .= '<div class="single_text_container qf_view col-12">';
        $text .= '<article class="text ' . $this->data['layout'] . '">';
        $text .= '<h2>' . $this->data['title'] . '</h2>';
        $text .= $this->data['formatted_content'];
        $text .= '</article></div></div>';

        $this->renderedView = $text;
    }
}