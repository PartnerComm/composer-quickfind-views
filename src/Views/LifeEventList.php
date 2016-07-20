<?php

namespace PComm\QuickFind\Views;


class LifeEventList extends ViewMany
{
    protected $categories = [];

    public function build() {
        $temp_array = [];

        $group = '<div class="wrap_life_event_tiles">';
        $group .= '<div class="life_event_tile_container qf_view container">';

        foreach($this->data['group_post_order'] as $post) {
            $group .= '<div class="article_content life_event_tile ' . $post['life_event'] . '">';
            $group .= '<article class="' . $this->data['layout'] . ' ' . $post['life_event'] . '">';

            $link = isset($post['custom_content']['button_link']) ? $post['custom_content']['button_link'] : "#";
            $name = isset($post['custom_content']['button_name']) ? $post['custom_content']['button_name'] : "#";

            $group .= '<h3><a href="' . $link . '">' . $name . '</a></h3>';

            $group .= '</article></div>';

            $life_array = ['name' => $post['life_event_name'], 'slug' => $post['life_event']];

            array_push($temp_array, $life_array);
        }
        $group .= '</div></div>';

        $this->categories = array_map("unserialize", array_unique(array_map("serialize", $temp_array)));
        $menu = $this->buildMenu();

        $this->renderedView = $menu . $group;
    }

    private function buildMenu() {
        $menu = '<div class="wrap_life_event_menu"><div class="container"><div class="life_event_filter button-group">';

        foreach($this->categories as $cat) {
            if($cat['slug'] != 'all-life-events') {
                $menu .= '<button data-filter=".all-life-events, .' . $cat['slug'] . '" class="btn-' . $cat['slug'] . '">' . $cat['name'] . '</button>';
            } else {
                $menu .= '<button data-filter=".all-life-events,
                                                .yourself-life-event,
                                                .your-spouse-partner-life-event,
                                                .your-child-life-event"
                                                class="btn-' . $cat['slug'] . '">' . $cat['name'] . '</button>';
            }

        }

        $menu .= '</div></div></div>';

        return $menu;
    }
}