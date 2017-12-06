<?php
/**
 * @file
 * Template for Panopoly tueren.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display tueren clearfix <?php !empty($class) ? print $class : ''; ?>" <?php !empty($css_id) ? print "id=\"$css_id\"" : ''; ?>>

  <div class="tueren-container tueren-header clearfix panel-panel">
    <div class="tueren-container-inner tueren-header-inner panel-panel-inner">
      <?php print $content['header']; ?>
    </div>
  </div>

  <div class="tueren-container tueren-column-content clearfix">

    <div class="tueren-content-container">
      <div class="tueren-content-container-inner">

        <div class="tueren-column-content-region tueren-content-header panel-panel clearfix">
          <div class="tueren-column-content-region-inner tueren-content-header-inner panel-panel-inner">
            <?php print $content['contentheader']; ?>
          </div>
        </div>

        <div class="tueren-content-container-column-container clearfix">
          <div class="tueren-column-content-region tueren-content-column1 tueren-column panel-panel">
            <div class="tueren-column-content-region-inner tueren-content-column1-inner tueren-column-inner panel-panel-inner">
              <?php print $content['contentcolumn1']; ?>
            </div>
          </div>
          <div class="tueren-column-content-region tueren-content-column2 tueren-column panel-panel">
            <div class="tueren-column-content-region-inner tueren-content-column2-inner tueren-column-inner panel-panel-inner">
              <?php print $content['contentcolumn2']; ?>
            </div>
          </div>
        </div><!-- /.tueren-content-container-column-container -->
        
        <div class="tueren-column-content-region tueren-content-footer panel-panel clearfix">
          <div class="tueren-column-content-region-inner tueren-content-footer-inner panel-panel-inner">
            <?php print $content['contentfooter']; ?>
          </div>
        </div>


      </div>
    </div><!-- /.tueren-content-container -->
    
    <div class="tueren-sidebar tueren-column-content-region tueren-column panel-panel">
      <div class="tueren-sidebar-inner tueren-column-content-region-inner tueren-column-inner panel-panel-inner">
        <?php print $content['sidebar']; ?>
      </div>
    </div>

  </div><!-- /.tueren-column-content -->

</div><!-- /.tueren -->
