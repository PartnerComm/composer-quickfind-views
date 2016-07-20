<?php

namespace PComm\QuickFind\Views;


class HowPlanWorks extends ViewMany
{
    public function build() {

        //open tab container
        $tab_container = '<div class="wrap_how_works_tabs">';
        $tab_container .= '<div class="qf_view how_works_tabs_container container">';

        //create tab list
        $tab_list = '<ul class="how_works_tabs">';

        //open steps container
        $step_container = '<div class="wrap_how_works_steps">';
        $step_container .= '<div class="qf_view how_works_steps_container container">';

        $close_steps = false;
        $step_btn = "";
        $feature_list = "";
        $step_touts = "";
        $step_count = 1;

        // count steps for columns
        $step_columns = $this->determineColumnCount($this->data['group_post_order']);
        $class_count = 0;

        foreach($this->data['group_post_order'] as $post) {
            $group_layout = $post['group_layout'];

            if($group_layout == 'how-plan-works-title') {
                //debug($post['plan_features']);
                $tab_list .= '<li data-features="' . implode(',', $post['plan_features']) . '">';
                $tab_list .= '<a href="#how_step_' . $step_count . '">' .  $post['title'] . '</a></li>';

                // close previous dev of steps if set
                if($close_steps) {
                    $step_touts .= $feature_list . $step_btn;
                    $step_touts .= '</div>';
                }

                $link = $post['custom_content']['button_link'];
                $button = $post['custom_content']['button_name'];
                $feature_list = $this->getFeatureList($post['plan_features']);
                $step_btn = '<div class="step_btn_container col-12"><p class="btn_container btn_center">
                                <a class="button btn_secondary" href="' . $link . '">' . $button . '</a>
                             </p></div>';

                // open new steps container
                $step_touts .= '<div class="container how_works_steps" id="how_step_' . $step_count . '">';

                // increment steps
                $step_count ++;

                // increment class count
                $class_count++;
            }

            else {
                $step_touts .= '<div class="step_tout ' . $step_columns[$class_count] . '"><h2>' . $post['post_excerpt'] . '</h2>';
                $step_touts .= '<p>' . $post['title'] . '</p></div>';
            }

            $close_steps = true;
        }

        // close the tab list
        $tab_list .= '</ul>';
        // add tabs to tab container and close container and wrap
        $tab_container .= $tab_list . '</div></div>';

        // close the last step touts
        $step_touts .= $feature_list . $step_btn;
        $step_touts .= '</div>';
        // add step touts to step container
        $step_container .= $step_touts . '</div></div>';

        $this->renderedView = $tab_container . $step_container;
    }

    private function getFeatureList(array $features) {
        $feature_terms = get_terms( array(
            'taxonomy' => 'plan_feature',
            'hide_empty' => false,
        ) );

        //debug($feature_terms);

        $feature_list = '<div class="feature_list_container col-12"><ul class="feature_list">';

        foreach($feature_terms as $feature) {
            $active = in_array($feature->slug, $features) ? "active_feature" : "inactive_feature";

            $feature_list .= '<li class="' . $active . ' ' . $feature->slug . '">' . $feature->name . '</li>';
        }

        $feature_list .= '</ul></div>';

        return $feature_list;
    }

    private function determineColumnCount(array $posts) {
        $col_count = 0;
        $step_columns = [];

        foreach($posts as $post) {
            $group_layout = $post['group_layout'];

            if($group_layout == 'how-plan-works-title') {
                $col_class = $this->getColumnClass($col_count);
                array_push($step_columns, $col_class);
                $col_count = 0;
            }

            elseif($group_layout == 'how-plan-works-step') {
                $col_count ++;
            }
        }

        // push final column count
        $col_class = $this->getColumnClass($col_count);
        array_push($step_columns, $col_class);
        //array_shift($step_columns);

        return $step_columns;
    }

    private function getColumnClass($count) {
        if($count == 4) {
            $col_class = 'col-3';
        }

        elseif($count == 3) {
            $col_class = 'col-4';
        }

        else {
            $col_class = '';
        }

        return $col_class;
    }

}