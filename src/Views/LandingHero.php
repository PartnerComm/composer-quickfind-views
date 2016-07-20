<?php

namespace PComm\QuickFind\Views;


class LandingHero extends ViewOne
{
    public function build() {
        $tout = '<div class="wrap_landing_hero">';
        $img_url = isset($this->data['custom_content']['hero_image']) ? $this->data['custom_content']['hero_image'] : "";
        $tout .= '<div class="fill_image"><img src="' . $img_url . '" /></div>';
        $tout .= '<div class="img_screen"></div>';

        $tout .= '<div class="landing_hero_container qf_view">';

        $tout .= '<article class="article_content  ' . $this->data['layout'] . '">';

        $link = isset($this->data['custom_content']['button_link']) ? $this->data['custom_content']['button_link'] : "";
        $button = isset($this->data['custom_content']['button_name']) ? $this->data['custom_content']['button_name'] : "";

        $tout .= '<h2>' . $this->data['title'] . '</h2>';
        $tout .= '<div class="hero_text">' . str_replace(']]>',']]&gt>', apply_filters('the_content', $this->data['post_excerpt'])) . '</div>';

        if(!empty($link) || !empty($button)) {
            $tout .= '<p class="btn_container btn_center">
                    <a class="button btn_primary" href="' . $link . '">' . $button . '</a>
                  </p>';
        }

        $tout .= '</article></div></div>';

        $this->renderedView = $tout;
    }
}