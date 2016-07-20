<?php

namespace PComm\QuickFind\Views;


class PlanWalkthrough extends ViewMany
{
    public function build() {

        //open steps container
        $steps = '<div class="wrap_how_works_steps">';
        $steps .= '<div class="qf_view how_works_steps_container">';

        $step_count = 1;
        $num_count = 1;

        foreach($this->data['group_post_order'] as $post) {
            $group_layout = $post['group_layout'];

            if($group_layout == 'how-plan-works-title') {
                $steps .= '<div class="walkthrough_title_container container">';
                $steps .= $post['formatted_content'];
                $steps .= '</div>';
            }

            else {
                if($step_count % 2) {
                    $step_class = "step_right";
                }

                else {
                    $step_class = "step_left";
                }

                $steps .= '<div class="step_container container ' . $step_class . '">';
                $steps .= '<div class="step_head"><h3>' . $post['post_excerpt'] . '</h3></div>';
                $steps .= '<div class="num_container"><img src="' . get_stylesheet_directory_uri() . '/images/number-' . $num_count . '.png" /></div>';
                $steps .= '<div class="step_text">';
                $steps .= '<h4>' . $post['title'] . '</h4>';
                $steps .= $post['formatted_content'];
                $steps .= '</div></div>';

                $num_count++;
            }

            $step_count++;

        }

        $steps .= '</div></div>';

        $this->renderedView = $steps;
    }

}