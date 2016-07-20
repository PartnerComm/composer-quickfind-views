<?php

namespace PComm\QuickFind\Views;


class LoaList extends ViewMany
{

    public function build() {
        $info = '<div class="wrap_loa_list">';
        $info .= '<div class="container">';
        $info .= '<div class="loa_list_container qf_view col-12">';

        foreach($this->data['group_post_order'] as $post) {
            $info .= '<article class="article_content  ' . $post['group_layout'] . ' ' . $post['post_name'] . '">';
            $info .= '<h2>' . $post['title'] . '</h2>';
            $info .= $post['formatted_content'];
            $info .= '</article>';
        }

        $info .= '</div></div></div>';

        $this->renderedView = $info;
    }

}