<?php

namespace PComm\QuickFind\Views;


class LandingBanner extends ViewOne
{
    public function build() {
        $banner_class = $this->data['custom_content']['banner_class'];

        $intro = '<div class="wrap_banner ' . $banner_class . '">';
        $intro .= '<div class="container">';
        $intro .= '<div class="banner_container qf_view col-12">';
        $intro .= '<article class="article_content  ' . $this->data['layout'] . '">';
        $intro .= '<h1>' . $this->data['title'] . '</h1>';
        $intro .= '<p class="intro_border">&nbsp;</p>';
        $intro .= $this->data['formatted_content'];
        $intro .= '</article></div></div></div>';

        $this->renderedView = $intro;
    }
}