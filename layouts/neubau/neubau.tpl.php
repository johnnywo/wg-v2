<?php
/**
 * @file
 * Template for Panopoly neubau.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>
<div id="page">

  <div class="panel-display neubau clearfix <?php !empty($class) ? print $class : ''; ?>" <?php !empty($css_id) ? print "id=\"$css_id\"" : ''; ?>>
  
    <div id="header" class="clearfix">
     
      <div class="neubau-container neubau-page-top clearfix panel-panel">
        <div class="neubau-container-inner neubau-page-top-inner panel-panel-inner">
          <?php print $content['page_top']; ?>
        </div>
      </div>
      
      <div class="neubau-container neubau-header clearfix panel-panel">
        <div class="neubau-container-inner neubau-header-inner panel-panel-inner">
          <?php print $content['header']; ?>
        </div>
      </div>
      
      <div class="neubau-container neubau-navbar clearfix panel-panel">
        <div class="neubau-container-inner neubau-navbar-inner panel-panel-inner">
          <?php print $content['navbar']; ?>
        </div>
      </div>
      
      <div class="neubau-container neubau-highlight clearfix panel-panel">
        <div class="neubau-container-inner neubau-highlight-inner panel-panel-inner">
          <?php print $content['highlight']; ?>
        </div>
      </div>  
      
    </div>
    
    
    <div id="main" class="clearfix" role="main">
      <div id="content" class="wohngesund-main-content">
        <div id="content-inner" class="inner column center">
            <?php print $content['contentmain']; ?>
        </div>
      </div> <!-- /content-inner /content -->
      <?php if (!empty($content['sidebar_first'])): ?>
        <aside id="sidebar-first" class="column sidebar first">
          <div id="sidebar-first-inner" class="inner">
            <?php print $content['sidebar_first']; ?>
          </div>
        </aside>
      <?php endif; ?> <!-- /sidebar-first -->
      <?php if (!empty($content['sidebar_second'])): ?>
        <aside id="sidebar-second" class="column sidebar second">
          <div id="sidebar-second-inner" class="inner">
            <?php print $content['sidebar_second']; ?>
          </div>
        </aside>
      <?php endif; ?> <!-- /sidebar-second -->
  
    
    <div class="neubau-container neubau-footer clearfix panel-panel">
      <div class="neubau-column-content-region-inner neubau-footer-inner panel-panel-inner">
        <?php print $content['footer']; ?>
      </div>
    </div>
  
  </div><!-- /.neubau -->

</div>
