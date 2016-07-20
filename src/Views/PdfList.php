<?php

namespace PComm\QuickFind\Views;


class PdfList extends ViewMany
{
    public function build() {
        $group = '<div class="wrap_pdf_list">';
        $group .= '<div class="pdf_list_container qf_view container">';

        foreach($this->data['group_post_order'] as $post) {
            $group .= '<div class="article_content col-4">';
            $group .= '<article class="' . $this->data['layout'] . '">';

            $link = $post['custom_content']['button_link'];
            $button = $post['custom_content']['button_name'];

            $group .= '<h3>' . $post['title'] . '</h3>';
            //$group .= '<p>' . $post['post_excerpt'] . '</p>';
            $group .= '<p class="btn_container btn_center">
                        <a class="button btn_primary" href="' . $link . '">' . $button . '</a>
                       </p>';
            $group .= '</article></div>';
        }
        $group .= '</div></div>';

        $this->renderedView = $group;
    }
}