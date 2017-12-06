<div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
<!-- ______________________ HEADER _______________________ -->
  <header id="header">
    <?php if ($page['first']): ?>
      <div id="first" class="first clearfix">
        <?php print render($page['first']); ?>
      </div>
    <?php endif; ?>
     
    <div id="header-region" class="header-region clearfix">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
        </a>
      <?php endif; ?>
      <?php print render($page['header']); ?>
    </div>

  </header> <!-- /header -->
   <?php if ($main_menu || $secondary_menu || $page['navbar']): ?>
      <nav id="navigation" class="menu <?php !empty($main_menu) ? print "with-primary" : ''; !empty($secondary_menu) ? print " with-secondary" : ''; ?>">
        <?php if ($page['navbar']): ?>
          <div id="navbar" class="clear">
            <?php print render($page['navbar']); ?>
          </div>
        <?php endif; ?>
      </nav>
    <?php endif; ?>
    <?php if ($page['highlight']): ?>
      <div id="highlight"><?php print render($page['highlight']) ?></div>
    <?php endif; ?>
    
  <?php if ($breadcrumb): ?>
    <div id="breadcrumb-slogan" class="clearfix">
        <div class="breadcrumb">
          <?php print $breadcrumb; ?>
        </div>
        <div class="slogan">Parkett ist unsere Welt!</div>
    </div>
  <?php endif; ?>

  <div id="main" class="clearfix" role="main">
    <div id="content">
      <div id="content-inner" class="inner column center">
        <?php if ($page['content_top']): ?>
              <div id="content_top"><?php print render($page['content_top']) ?></div>
        <?php endif; ?>
        <?php if ($title|| $messages || $tabs || $action_links): ?>
          <div id="content-header">
            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php print render($page['help']); ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
          </div> <!-- /#content-header -->
        <?php endif; ?>
        <?php if ($is_front): ?>
          <div class="hotline-mobile"><a href="tel:0800252211"><button>Kostenlose Hotline:<br><b>0800/252211</b></button></a></div>
          <div class="standorte-mobile"><a href="#standorte"><button><b>Filialen</b></button></a></div>
        <?php endif; ?>
        <div id="content-area">
          <?php print render($page['content']) ?>
        </div>
        <?php print $feed_icons; ?>
        <?php if ($page['content_bottom']): ?>
              <div id="content_bottom"><?php print render($page['content_bottom']) ?></div>
        <?php endif; ?>
      </div>
    </div> <!-- /content-inner /content -->
    <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar-first" class="column sidebar first">
        <div id="sidebar-first-inner" class="inner">
          <?php print render($page['sidebar_first']); ?>
        </div>
      </aside>
    <?php endif; ?> <!-- /sidebar-first -->
    <?php if ($page['sidebar_second']): ?>
      <aside id="sidebar-second" class="column sidebar second">
        <div id="sidebar-second-inner" class="inner">
          <?php print render($page['sidebar_second']); ?>
        </div>
      </aside>
    <?php endif; ?> <!-- /sidebar-second -->
    </div> <!-- /main -->
  <!-- ______________________ FOOTER _______________________ -->
  <?php if ($page['footer']): ?>
    <footer id="footer">
      <?php print render($page['footer']); ?>
    </footer> <!-- /footer -->
  <?php endif; ?>

</div> <!-- /page -->
