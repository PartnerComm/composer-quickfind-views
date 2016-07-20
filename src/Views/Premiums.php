<?php

namespace PComm\QuickFind\Views;


class Premiums extends ViewMany
{

    protected $requiredKeys = [];

    public function build()
    {
        // debug($this->data);
        $col_heads = $this->data['col_heads'];
        $col_count = count($col_heads);

        // manually setting coverage level for multi-column display
        // this feels pretty dirty but it's quick.

        $coverage_levels = array(
            'pcpqf_each_paycheck' => array(
                'slug' => 'pcpqf_each_paycheck',
                'label' => 'Each paycheck'
            )
        );

        // start table
        $chart = '<div class="chart_container qf_view">';
        $chart .= '<div class="chart article respondtable premiums_chart post_type">';

        $chart .= '<table class="table_rendered table-premiums">';

        // create thead and add blank first cell
        $chart .= '<thead><tr>'; // <th>&nbsp;</th>

        // add content for column heads using col_heads array as control

        foreach ($col_heads as $col) {
            $chart .= '<th class="' . $this->data[$col]['plan']['plan_slug'] . '">' . $this->data[$col]['plan']['term_data']['term_display_name'] . '</th>';
        }

        $chart .= '</tr>';

        // close thead and start tbody

        $chart .= '</thead><tbody>';

        // create each row using row_heads array as control
        // foreach($group as $plan) {
        // $row_heads = $plan->custom_keys;
        foreach ($this->data['coverage_types'] as $coverage_type => $value) {
            // start row
            $chart .= '<tr class="chart-rowhead">';
            // add row headers using row_heads name spanning across all columns
            $chart .= '<th colspan="' . $col_count . '"><span>' . $this->data['coverage_types'][$coverage_type]['label'] . '</span></th>';
            // close head row
            $chart .= '</tr>';

            // start cell row
            $chart .= '<tr>';

            foreach ($col_heads as $col) {

                $chart .= '<td data-title="' . $this->data[$col]['plan']['term_data']['term_display_name'] . '" class="' . $col . '">';
                foreach ($coverage_levels as $coverage_level) {
                    $chart .= '<p class="' . $coverage_level['slug'] . '"><strong>' . $this->data[$col]['custom_content'][$coverage_level['slug'] . '_' . $this->data['coverage_types'][$coverage_type]['slug']]['value'] . '</strong></p>';
                }
                $chart .= '</td>';
            }

            $chart .= '</tr>';

        }

        // close tbody and table
        $chart .= '</tbody></table>';

        $chart .= '</div></div>';

        $this->renderedView = $chart;
    }
}