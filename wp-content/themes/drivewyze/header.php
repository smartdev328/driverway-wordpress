<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Drivewyze
 */
$socials 	   = get_field('socials', 'option');
$external      = get_field('external_link', 'option');
$external_link = ( !empty($external) && is_array($external) ) ? $external['link'] : '' ;
$select_nav    = get_field('select_nav');
$selected      = $select_nav ?? 'primary';
$nav_area      = is_singular('partners') ? 'partners' : $selected;
$gtm_script    = get_field('gtm_script', 'options');
$gtm_noscript  = get_field('gtm_noscript', 'options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php if ($gtm_script) :
        echo $gtm_script;
    endif; ?>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ($gtm_noscript) :
    echo $gtm_noscript;
endif; ?>
<header class="header">
	<div class="header__top">
		<div class="header__container header__container--mobile">
			<a class="header__brand" href="<?php echo esc_url(home_url()); ?>">
				<?php if (get_header_image()) : ?>
					<img src="<?php echo get_header_image(); ?>" alt="<?php bloginfo('name'); ?>">
				<?php else :
					bloginfo('name');
				endif; ?>
			</a>
			<nav class="nav-primary header__nav navbar navbar-expand-lg">
				<?php
				if (has_nav_menu($nav_area)) :
					wp_nav_menu(
						[
							'theme_location' => $nav_area,
							'menu_id' => 'primary-menu',
							'container_class' => 'collapse navbar-collapse',
							'container_id' => 'primaryNavBar',
							'menu_class' => 'navbar-nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'walker' => new Drivewyze_Navwalker(),
						]
					);
				endif;
				?>
				<?php if ($socials || $external_link) : ?>
					<div class="header__bottom">
						<?php if ($socials && is_array($socials)) :
							get_template_part( 'template-parts/socials' );
						endif; ?>

						<?php if ($external_link && is_array($external_link)) : ?>
							<a class="header__link" href="<?php echo $external_link['url']; ?>" target="<?php echo $external_link['target']; ?>">
								<span><?php echo $external_link['title']; ?></span>
								<svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0.5H1V10.5H11V5.5" stroke="#0066A4"/>
									<path d="M11 3.70001L11 0.500012L7.8 0.500012" stroke="#0066A4"/>
									<path d="M11 0.5L7.8 3.7" stroke="#0066A4"/>
								</svg>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</nav>
			<div class="header__btns">
				<div class="header__search">
					<div class="search-form-wrap">
						<?php get_search_form(); ?>
						<a href="#" class="js-s-form-close search-form-close">
							<svg width="14" height="13" viewBox="0 0 14 13" fill="none"
								 xmlns="http://www.w3.org/2000/svg">
								<line x1="1.70711" y1="1.29289" x2="12.7071" y2="12.2929" stroke="#9D9FA2"
									  stroke-width="2"/>
								<line y1="-1" x2="15.5563" y2="-1"
									  transform="matrix(-0.707107 0.707107 0.707107 0.707107 13 2)" stroke="#9D9FA2"
									  stroke-width="2"/>
							</svg>
						</a>
					</div>
					<a href="#" class="js-s-form search-form-open">
						<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M13.8186 12.122L11.0822 9.38569C10.9454 9.27623 10.7812 9.19414 10.617 9.19414H10.1792C10.918 8.23642 11.3832 7.03242 11.3832 5.69161C11.3832 2.57217 8.81106 0 5.69161 0C2.54481 0 0 2.57217 0 5.69161C0 8.83842 2.54481 11.3832 5.69161 11.3832C7.00506 11.3832 8.20906 10.9454 9.19415 10.1792V10.6444C9.19415 10.8086 9.24887 10.9728 9.38569 11.1096L12.0947 13.8186C12.3683 14.0922 12.7788 14.0922 13.025 13.8186L13.7912 13.0524C14.0649 12.8061 14.0649 12.3957 13.8186 12.122ZM5.69161 9.19414C3.7488 9.19414 2.18908 7.63442 2.18908 5.69161C2.18908 3.77617 3.7488 2.18908 5.69161 2.18908C7.60706 2.18908 9.19415 3.77617 9.19415 5.69161C9.19415 7.63442 7.60706 9.19414 5.69161 9.19414Z"
								fill="#9D9FA2"/>
						</svg>
					</a>
				</div>
				<div class="navbar-toggler-wrap">
					<button class="navbar-toggler" type="button" data-name="menu" data-toggle="collapse"
							data-target="#primaryNavBar"
							aria-controls="primaryNavBar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</header>
<main id="content" class="site-content">
