<?php
// Plugin definition
$plugin = array(
  'title' => t('Brenham'),
  'icon' => 'brenham.png',
  'category' => t('Responsive'),
  'theme' => 'brenham',
  'css' => 'brenham.css',
  'regions' => array(
    'page_top' => t('Page Top'),
    'header' => t('Header'),
    'navbar' => t('Navigation'),
    'highlight' => t('Highlight'),
    'sidebar' => t('Content Sidebar'),
    'contentmain' => t('Content'),
    'footer' => t('Footer'),
  ),
);
