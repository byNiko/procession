<?php
$link = get_sub_field('link');
$color = get_sub_field('color_theme');
$style = get_sub_field('style');
$size = get_sub_field('size');
$html = '<a class="button button-' . $color . ' button-' . $style . ' button-' . $size . '" target="' . $link['target'] . '" href="' . $link['url'] . '">' . $link['title'] . '</a>';
echo $html;
