<?php // my_force_login(); /* Uncomment to enable the force login function */ ?>

<!DOCTYPE html>
<html lang="en" class="gt-ie9" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title(' &mdash; ',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/img/appletouch-114x114.jpg" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/img/appletouch-144x144.jpg" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">