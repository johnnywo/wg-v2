<?php
/**
 * @file
 * Template for Panopoly produkte.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="panel-display produkte clearfix <?php !empty($class) ? print $class : ''; ?>" <?php !empty($css_id) ? print "id=\"$css_id\"" : ''; ?>>

  <div class="produkte-container produkte-header clearfix panel-panel">
    <div class="produkte-container-inner produkte-header-inner panel-panel-inner">
      <?php print $content['header']; ?>
    </div>
  </div>

  <div class="produkte-container produkte-column-content clearfix">

    <div class="produkte-content-container">
      <div class="produkte-content-container-inner">

        <div class="produkte-column-content-region produkte-content-header panel-panel clearfix">
          <div class="produkte-column-content-region-inner produkte-content-header-inner panel-panel-inner">
            <?php print $content['contentheader']; ?>
          </div>
        </div>

        <div class="produkte-content-container-column-container clearfix">
          <div class="produkte-column-content-region produkte-content-column1 produkte-column panel-panel">
            <div class="produkte-column-content-region-inner produkte-content-column1-inner produkte-column-inner panel-panel-inner">
              <?php print $content['contentcolumn1']; ?>
            </div>
          </div>
          <div class="produkte-column-content-region produkte-content-column2 produkte-column panel-panel">
            <div class="produkte-column-content-region-inner produkte-content-column2-inner produkte-column-inner panel-panel-inner">
              <?php print $content['contentcolumn2']; ?>
            </div>
          </div>
        </div><!-- /.produkte-content-container-column-container -->
        
        <div class="produkte-column-content-region produkte-content-footer panel-panel clearfix">
          <div class="produkte-column-content-region-inner produkte-content-footer-inner panel-panel-inner">
            <?php print $content['contentfooter']; ?>
          </div>
        </div>


      </div>
    </div><!-- /.produkte-content-container -->
    
    <div class="produkte-sidebar produkte-column-content-region produkte-column panel-panel">
      <div class="produkte-sidebar-inner produkte-column-content-region-inner produkte-column-inner panel-panel-inner">
        <?php print $content['sidebar']; ?>
      </div>
    </div>

  </div><!-- /.produkte-column-content -->

</div><!-- /.produkte -->
