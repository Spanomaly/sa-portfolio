<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
		<title>GeoffBecker.ca <?php wp_title(); ?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php wp_head(); ?>
    </head>
    <body <?php
    // Disabling lights while adding live theme preview
    // $lights =(isset($_COOKIE['ap_lights']) && $_COOKIE['ap_lights'] == "on") ? "lights-on" : "";
    $lights = "lights-on";
    $bodyClasses = array("anom-portfolio", $lights);
    body_class($bodyClasses); ?> <?php echo get_post_type( $post ) ?>>
    <?php if ($ga_code = get_option( 'ga_code' , false)): ?>
        <?php include_once("_analyticstracking.php") ?>
    <?php endif; ?>
		<header class = "main-header">
      <div class="layout-standard-width">
        <?php if ($header_logo = get_theme_mod( 'cg_header_logo' , false)): ?>
          <a class="header-logo-link" href="/">
            <img id = "header-logo" src ="<?php echo $header_logo ?>" alt ="<?php echo get_bloginfo( 'name' ) . " logo" ?>">
          </a>
        <?php endif; ?>
        <!-- <div id="light-switch-wrap">
          <span>Dark Mode</span>
          <div class="gb-switch" id="light-switch">
            <div class="gb-knob"></div>
          </div>
        </div> -->
      </div>
		</header>
