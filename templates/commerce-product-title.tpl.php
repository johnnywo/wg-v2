<?php

/**
 * @file
 * Default theme implementation to present the title on a product page.
 *
 * Available variables:
 * - $title: The title to render.
 * - $label: If present, the string to use as the title label.
 *
 * Helper variables:
 * - $product: The fully loaded product object the title belongs to.
 */
?>
<?php if ($title): ?>
  <div class="commerce-product-title">
    <b><?php print $title; ?></b>
  </div>
<?php endif; ?>
