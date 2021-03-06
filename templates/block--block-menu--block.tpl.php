<?php $tag = $block->subject ? 'section' : 'div'; ?>
<<?php print $tag; ?> id="block-<?php print $block->module .'-'. $block->delta ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="block-inner">
    <?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
      <h2 class="block-title"<?php print $title_attributes; ?>><span><i class="fa fa-bars"></i> </span><?php print $block->subject ?></h2>    
    <?php endif;?>
    <?php print render($title_suffix); ?>
    <div class="content" <?php print $content_attributes; ?>>
      <?php print $content; ?>
    </div>
  </div>
</<?php print $tag; ?>> <!-- /block-inner /block -->