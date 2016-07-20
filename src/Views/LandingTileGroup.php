<?php

namespace PComm\QuickFind\Views;


class LandingTileGroup extends ViewMany
{
    public function build() {
        $group = '<div class="wrap_landing_tiles">';
        $group .= '<div class="qf_view container">';

        $intro = "";
        $tiles = "";

        foreach($this->data['group_post_order'] as $post) {
            if($post['group_layout'] == 'landing-tile-intro') {
                $intro = '<div class="intro_container ' . $post['group_layout'] . '">';
                $intro .= $post['formatted_content'];
                $intro .= '</div>';
                continue;
            }

            $tiles .= '<div class="article_content landing_page_tile">';
            $tiles .= '<article class="' . $post['group_layout'] . '">';

            $link = $post['custom_content']['button_link'];
            $tile_title = $post['custom_content']['button_name'];

            $tiles .= '<h3><a href="' . $link . '">' .$tile_title . '</a></h3>';

            $tiles .= '</article></div>';

            $parent_name = $post['parent_name'];

        }

        if(!empty($intro)) {
            $group .= $intro;
        }

        $group .= '<div class="col-4"><div class="landing_title_container">';
        $group .= '<h2><span>More in</span> ' . $parent_name . '</h2>';
        $group .= '</div></div>';

        $group .= '<div class="col-8"><div class="landing_tile_container">';
        $group .= $tiles;
        $group .= '</div></div>';

        $group .= '</div></div>';

        $this->renderedView = $group;
    }
}