<?php

namespace PComm\QuickFind\Views;


class Testimonial extends ViewMany
{
    public function build() {

        //open steps container
        $steps = '<div class="wrap_testimonial">';
        $steps .= '<div class="qf_view testimonial_container">';

        $step_count = 1;

        foreach($this->data['group_post_order'] as $post) {
            $group_layout = $post['group_layout'];

            if($step_count % 2) {
                $step_class = "quote_left";
            }

            else {
                $step_class = "quote_right";
            }

            $steps .= '<div class="quote_container container ' . $step_class . '">';
            $steps .= '<div class="quote_bubble"><div class="bubble_text"><h3>' . $post['title'] . '</h3></div>';
            $steps .= '<div class="arrow_bg"><p>&nbsp;</p></div></div>';
            $steps .= '<div class="quote_text">';
            $steps .= $post['formatted_content'];
            $steps .= '</div></div>';

            $step_count++;

        }

        $steps .= '</div></div>';

        $this->renderedView = $steps;
    }

}