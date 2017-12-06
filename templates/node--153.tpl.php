<!-- Filiale Neubaugasse -->
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
          <div>Klicken/Ziehen Sie für eine Rundum Ansicht:</div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sde!2sat!4v1446475634711!6m8!1m7!1soxXvm-6r_lIAAAQzUGlBwQ!2m2!1d48.19998979204136!2d16.34936294711588!3f43.832427126100114!4f-5.595542894974301!5f0.7820865974627469" width="478" height="358" frameborder="0" style="border:0" allowfullscreen></iframe>
        <?php 
          hide($content['field_bild']);
         ?>
         <h2>Ansprechpartner:</h2>
          <?php print views_embed_view('mitarbeiter_pro_filiale', $display_id = 'panel_pane_1', $node->nid); ?>
            <?php print views_embed_view('foto_show_filiale','block_1', $node->nid); ?>
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
