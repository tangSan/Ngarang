<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
  <div id="page-wrapper">
    <div id="page">
      <div id="header">
        <div class="section clearfix">
          <?php if ($logo): ?>
            <div id="logo" class="grid">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            </div>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <div id="name-and-slogan" class="grid">
              <?php if ($site_name): ?>
                <?php if ($title): ?>
                  <div id="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                      <strong><?php print $site_name; ?></strong>
                    </a>
                  </div>
                <?php else: /* Use h1 when the content title is empty */ ?>
                  <h1 id="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                      <span><?php print $site_name; ?></span>
                    </a>
                  </h1>
                <?php endif; ?>
              <?php endif; ?>
              <?php if ($site_slogan): ?>
                <div id="site-slogan"><?php print $site_slogan; ?></div>
              <?php endif; ?>
            </div> <!-- /#name-and-slogan -->
          <?php endif; ?>

          <?php print render($page['header']); ?>
        </div> <!-- /.section -->
      </div> <!-- /#header -->

      <?php if ($main_menu || $secondary_menu): ?>
        <div id="navigation">
          <div class="section clearfix">
            <div class="navig grid">
              <?php print theme('links__system_main_menu', array(
                'links' => $main_menu,
                'attributes' => array(
                  'id' => 'main-menu',
                  'class' => array(
                    'links',
                    'clearfix'
                  )
                ),
                'heading' => array(
                  'text' => t('Main menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )); ?>
              <?php print theme('links__system_secondary_menu', array(
                'links' => $secondary_menu,
                'attributes' => array(
                  'id' => 'secondary-menu',
                  'class' => array(
                    'links',
                    'clearfix'
                  )
                ),
                'heading' => array(
                  'text' => t('Secondary menu'),
                  'level' => 'h2',
                  'class' => array('element-invisible'),
                ),
              )); ?>
            </div>
          </div> <!-- /.section -->
        </div> <!-- /#navigation -->
      <?php endif; ?>

      <?php if ($breadcrumb): ?>
        <div id="breadcrumb">
          <div class="section clearfix">
            <div class="grid">
              <?php print $breadcrumb; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($messages): ?>
        <div id="messages">
          <div class="section clearfix">
            <div class="grid">
              <?php print $messages; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div id="main-wrapper">
        <div id="main" class="section clearfix">
          <div id="content" class="column grid">
            <?php if ($page['highlighted']): ?>
              <div id="highlighted">
                <?php print render($page['highlighted']); ?>
              </div>
            <?php endif; ?>
            <a id="main-content"></a>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1 class="title title-page" id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if ($tabs = render($tabs)): ?>
              <div class="tabs">
                <?php print render($tabs); ?>
              </div>
            <?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
              <ul class="action-links">
                <?php print render($action_links); ?>
              </ul>
            <?php endif; ?>
            <?php print render($page['content']); ?>
            <?php print $feed_icons; ?>
          </div> <!-- /#content -->

          <?php if ($page['sidebar_first']): ?>
            <div id="sidebar-first" class="column sidebar grid">
              <?php print render($page['sidebar_first']); ?>
            </div> <!-- /#sidebar-first -->
          <?php endif; ?>

          <?php if ($page['sidebar_second']): ?>
            <div id="sidebar-second" class="column sidebar grid">
              <?php print render($page['sidebar_second']); ?>
            </div> <!-- /#sidebar-second -->
          <?php endif; ?>
        </div> <!-- /#main -->
      </div> <!-- /#main-wrapper -->

      <div id="footer">
        <div class="section clearfix">
          <?php print render($page['footer']); ?>
        </div> <!-- /.section -->
      </div> <!-- /#footer -->
    </div> <!-- /#page -->
  </div> <!-- /#page-wrapper -->
