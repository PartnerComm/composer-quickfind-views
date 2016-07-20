<?php

namespace PComm\QuickFind\Views;


class VideoPage extends ViewMany
{
    protected $categories = [];

    public function build() {

        // Start hero block
        $hero = '<div class="wrap_video_hero">';
        $hero .= '<div class="video_hero_container qf_view container">';

        // Start list block
        $list = '<div class="wrap_video_list">';
        $list .= '<div class="video_list_head container"><h3>More Videos …</h3></div>';
        $list .= '<div class="video_list_container qf_view container">';

        foreach($this->data['group_post_order'] as $post) {

            if($post['group_layout'] == 'video-hero') {
                $video_class = isset($post['custom_content']['video_class']) ? $post['custom_content']['video_class'] : "video_container";
                $hero .= '<div class="col-8"><div class="' . $video_class . '">';
                $hero .= $post['formatted_content'];
                $hero .= '</div></div>';

                $hero .= '<div class="col-4"><div class="video_text">';
                $hero .= '<article class="' . $post['group_layout'] . '">';
                $hero .= '<h2>' . $post['title'] . '</h2>';
                $hero .= '<p>' . $post['post_excerpt'] . '</p>';
                $hero .= '</article></div></div>';
            }

            else {
                $list .= '<div class="col-3 article_content video_tile">';
                $list .= '<article class="' . $post['group_layout'] . '">';

                $link = isset($post['custom_content']['video_link']) ? $post['custom_content']['video_link'] : "#";

                $list .= '<figure class="video_thumb"><a href="' . $link . '"><img src="' . $post['thumb_url'] . '" /></a></figure>';

                //debug($post);
                $list .= '<h4><a href="' . $link . '">' . $post['title'] . '</a></h4>';

                $list .= '</article></div>';
            }



        }

        // close hero block
        $hero .= '</div></div>';

        // close list block
        $list .= '</div></div>';

        $this->renderedView = $hero . $list;
    }

}