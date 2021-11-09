<?php
/**
 * @file
 * Display generic site information such as logo, site name, etc.
 *
 * Available variables:
 *
 * - $base_path: The base path of the Backdrop installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the home page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $front_page: The URL of the home page. Use this instead of $base_path, when
 *   linking to the home page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled.
 * - $site_slogan: The site slogan, empty when display has been disabled.
 * - $menu: The menu for the header (if any), as an HTML string.
 * - $ax_logo: Theme provided logo as inline svg.
 */
?>

<?php if ($logo || $ax_logo): ?>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
    <?php if ($ax_logo): print $ax_logo; else: ?> 
      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
    <?php endif;?>
  </a>
<?php endif;?>

<?php if ($site_name || $site_slogan): ?>
  <div class="name-and-slogan">
    <?php if ($site_name): ?>
      <h1 class="site-name">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
      </h1>
    <?php endif; ?>
    <?php if ($site_slogan): ?>
      <div class="site-slogan"><?php print $site_slogan; ?></div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?php if ($menu): ?>
  <nav class="header-menu">
    <?php print $menu; ?>
<?php endif; ?>
