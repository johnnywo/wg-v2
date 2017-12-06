<?php
// Plugin definition
$plugin = array(
  'title' => t('neubau'),
  'icon' => 'neubau.png',
  'category' => t('Responsive'),
  'theme' => 'neubau',
  'css' => 'neubau.css',
  'regions' => array(
    'page_top' => t('Page Top'),
    'header' => t('Header'),
    'navbar' => t('Navigation'),
    'highlight' => t('Highlight'),
    'sidebar_first' => t('Content Sidebar First'),
    'sidebar_second' => t('Content Sidebar Second'),
    'contentmain' => t('Content'),
    'footer' => t('Footer'),
  ),
);
