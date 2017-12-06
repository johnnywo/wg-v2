<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
  <div class="node-inner">
    <header>
      <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
  
      <?php print $user_picture; ?>
          
      <?php if ($display_submitted): ?>
        <span class="submitted"><?php print $date; ?> — <?php print $name; ?></span>
      <?php endif; ?>
    </header>
    <div class="content container">
      <?php if (!empty($content['field_aktueller_hinweis'])): ?>
        <div class="top messages status"><?php print render($content['field_aktueller_hinweis']); ?></div>
      <?php endif;?>
      <div class="row">
        <div class="column1">
        <?php print views_embed_view('foto_show_filiale','block_1', $node->nid); ?>
        <?php 
          hide($content['field_bild']);
         ?>
         <h2>Ansprechpartner:</h2>
          <?php print views_embed_view('mitarbeiter_pro_filiale', $display_id = 'panel_pane_1', $node->nid); ?>
        </div>
        <div class="column2">          
          <div class="anschrift-tel">
            <?php 
              // We hide the comments and links now so that we can render them later.
              hide($content['comments']);
              hide($content['links']);
              hide($content['body']);
              hide($content['field_anfahrt']);
              
              print render($content['field_adresse']);
              print render($content['field_telefon']);
              print render($content['field_telefax']);
              print render($content['field_e_mail']);
            ?>
          </div>
          <div class="node-type-filiale field-name-body">Sie finden uns in der SCS im Teil der zu IKEA gehört. Wenn Sie die IKEA Garage in den 1. Stock rauffahren dann finden Sie die WOHNGESUND Filiale gleich um die Ecke, vis a vis vom Ikea Restaurant.</div>
          <?php
            print render($content);
            ?>
          <?php
            print render($content['body']);
            print render($content['field_anfahrt']);
            ?>
        </div>
      </div>
      <div class="row">
        <div class="column3">
        
        </div>
        <div class="column4">
          
        </div>
      </div>
    </div>
    <?php if (!empty($content['links']['terms']) || !empty($content['links'])): ?>
      <footer>
      <?php if (!empty($content['links']['terms'])): ?>
        <div class="terms"><?php print render($content['links']['terms']); ?></div>
      <?php endif;?>
      
      <?php if (!empty($content['links'])): ?>
        <div class="links"><?php print render($content['links']); ?></div>
      <?php endif; ?>
      </footer>
    <?php endif; ?>
  </div> <!-- /node-inner -->
</article> <!-- /node-->
<?php print render($content['comments']); ?>
