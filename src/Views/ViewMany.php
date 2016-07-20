<?php

namespace PComm\QuickFind\Views;


abstract class ViewMany implements ViewInterface
{
    protected $data;
    protected $renderedView;
    protected $requiredKeys = [];
    protected $chart = false;

    public function __construct(array $data)
    {
        //debug($data);
        $this->validateData($data);
        $this->validateChart($data);
        $this->data = $data;
    }

    public function render()
    {
        return $this->renderedView;
    }

    public function build()
    {
        if($this->chart) {
            $this->buildChart();
        }

        else {
            $this->buildGroup();
        }
    }

    public function chart()
    {
        return (bool) $this->chart;
    }

    protected function buildChart()
    {
        // set control to either rows or cols
        $row_control = $this->data['rows_sorted'];
        $col_control = $this->data['cols_sorted'];

        //debug($col_control);

        // set content by row or column slug
        $row_content = $this->data['row_order'];

        $col_count = count($col_control) + 1;

        if($col_count == 3) {
            $col_width = 'width="33%"';
        }
        elseif($col_count == 2) {
            $col_width = 'width="50%"';
        }
        else {
            $col_width = '';
        }

        // start table
        $chart = '<div class="container">
                    <div class="chart_container qf_view col-12">
                        <div class="chart article respondtable">
                            <table class="table_rendered">';

        // create thead and add blank first cell
        $chart .= '<thead><tr><th ' . $col_width . ' class="empty_head">&nbsp;</th>';

        $subhead = false;

        // add content for column heads using col_heads array as control
        foreach($col_control as $head)
        {
            //debug($head);
            if(!empty($head['slug'])) {
                $chart .= '<th class="' . $head['slug'] . '" '. $col_width . ' >' . $head['name'] . '</th>';
            }

            if(!empty($head['subhead'])) {
                $subhead = true;
            }
        }

        if($subhead) {
            // create subhead row
            $chart .= '</tr><tr class="table_sub"><th class="empty_head">&nbsp;</th>';

            // add content for column subheads using col_heads array as control
            foreach($col_control as $subhead)
            {
                $chart .= '<th class="' . $subhead['slug'] . '">' . $subhead['subhead'] . '</th>';
            }
        }

        // close thead and start tbody
        $chart .= '</tr></thead><tbody>';

        // create each row using row_heads array as control
        $alt_count = 1;
        foreach($row_control as $row)
        {
            //debug($row);
            if($alt_count % 2) {
                $row_class = "alt_row";
            } else {
                $row_class = "row";
            }
            // start row
            $chart .= '<tr class="' . $row_class . '">';

            // add row headers using row_heads name
            $chart .= '<th><span>' . $row['name'] . '</span></th>';

            // grab all content by plan using the row slug as control
            $content = $row_content[$row['slug']];

            // use col heads for control again to populate cells with plan content
            foreach($col_control as $col)
            {
                //debug($col);
                if(!empty($col['slug'])) {
                    // populate table content using plan slug as control
                    $post_name = isset ( $content[$col['slug']]['post_name'] ) ? $content[$col['slug']]['post_name'] : '';
                    $post_content = isset ( $content[$col['slug']]['formatted_content'] ) ? $content[$col['slug']]['formatted_content'] : '';

                    $chart .= '<td data-title="' . $col['name'] . ' ' . $col['subhead'] . '" class="' . $col['slug'] . ' ' . $post_name . '">' . $post_content . '</td>';
                }
            }

            // close row
            $chart .= '</tr>';

            $alt_count ++;
        }

        // close tbody and table
        $chart .= '</tbody></table></div></div></div>';

        $this->renderedView = $chart;
    }

    protected function buildGroup() {
        $group = '<div class="container">';
        $group .= '<div class="group_container qf_view col-12">';
        $group .= '<div class="group article">';
        $group .= '<div class="article_content">';

        foreach($this->data['group_post_order'] as $post) {
            $group .= '<h3>' . $post['title'] . '</h3>';
            $group .= $post['formatted_content'];
        }
        $group .= '</div></div></div></div>';

        $this->renderedView = $group;
    }

    protected function validateData(array $data)
    {
        foreach($this->requiredKeys as $key) {
            if (empty($data[$key])) {
                throw new \Exception('Missing required fields');
            }
        }
    }

    protected function validateChart(array $data)
    {
        if(isset($data['rows_sorted']) || isset($data['cols_sorted'])) {
            $this->chart = true;
        }
    }
}