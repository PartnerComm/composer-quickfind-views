<?php

namespace PComm\QuickFind\Views;


class TextDownload extends ViewOne
{
    public function build() {
        $text = '<div class="container">';
        $text .= '<div class="text_container qf_view col-12">';
        $text .= '<article class="text ' . $this->data['layout'] . '">';
        $text .= '<div class="download_container">';
        $text .= '<h3>' . $this->data['title'] . '</h3>';

        $link = $this->data['custom_content']['button_link'];
        $button = $this->data['custom_content']['button_name'];

        $text .= '<p class="btn_container btn_center">
                        <a class="button btn_primary" href="' . $link . '">' . $button . '</a>
                       </p>';
        $text .= '</div>';

        $text .= '<h2>' . $this->data['title'] . '</h2>';
        $text .= $this->data['formatted_content'];
        $text .= '</article></div></div>';

        $this->renderedView = $text;

    }
}