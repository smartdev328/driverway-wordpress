<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Drivewyze
 */
$contact_fields  = get_field('contact', 'option');
$contact_title   = ( !empty($contact_fields) && is_array($contact_fields) ) ? $contact_fields['title'] : '' ;
$contact_info    = ( !empty($contact_fields) && is_array($contact_fields) ) ? $contact_fields['contact_info'] : '' ;
$contact_links   = ( !empty($contact_fields) && is_array($contact_fields) ) ? $contact_fields['add_links'] : '' ;
$company_fields  = get_field('company', 'option');
$company_title   = ( !empty($company_fields) && is_array($company_fields) ) ? $company_fields['title'] : '' ;
$company_links   = ( !empty($company_fields) && is_array($company_fields) ) ? $company_fields['links'] : '' ;
$socials 	     = get_field('socials', 'option');
$socials_title 	 = get_field('social_list_title', 'option');
$external      	 = get_field('external_link', 'option');
$external_title  = ( !empty($external) && is_array($external) ) ? $external['subtitle'] : '' ;
$external_link   = ( !empty($external) && is_array($external) ) ? $external['link'] : '' ;
?>

</main><!-- #content -->

<footer id="footer-container" class="site-footer footer" role="contentinfo">
	<div class="footer-container">
		<?php if ( $contact_info || $contact_links ) : ?>
			<div class="footer-group">
				<?php if ( $contact_title ) : ?>
					<h5><?php echo $contact_title; ?></h5>
				<?php endif; ?>
				<div class="footer-row">
					<?php if ( $contact_info ) : ?>
						<div class="footer-col subtitle"><?php echo $contact_info; ?></div>
					<?php endif; ?>
					<?php if ($contact_links && is_array($contact_links)) : ?>
						<div class="footer-col subtitle">
							<?php foreach ($contact_links as $item): ?>
								<?php $contact_link = is_array($item) ? $item['link'] : ''; ?>
								<?php if ( !empty($contact_link) && is_array($contact_link) ) : ?>
									<a href="<?php echo $contact_link['url']; ?>" target="<?php echo $contact_link['target']; ?>">
										<?php echo $contact_link['title']; ?>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $company_links || $external_link ) : ?>
			<div class="footer-group">
				<div class="footer-col subtitle">
				<?php if ( $company_title ) : ?>
					<h5><?php echo $company_title; ?></h5>
				<?php endif; ?>
					<?php if ($company_links && is_array($company_links)) : ?>
						<?php foreach ($company_links as $item): ?>
							<?php $company_link = is_array($item) ? $item['link'] : ''; ?>
							<?php if ( !empty($company_link) && is_array($company_link) ) : ?>
								<a href="<?php echo $company_link['url']; ?>" target="<?php echo $company_link['target']; ?>">
									<?php echo $company_link['title']; ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if ($external_link && is_array($external_link)) : ?>
						<?php if ( $external_title ) : ?>
							<span class="desktop-el"><?php echo $external_title; ?></span>
						<?php endif; ?>
						<a href="<?php echo $external_link['url']; ?>" target="<?php echo $external_link['target']; ?>">
							<?php echo $external_link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($socials && is_array($socials)) : ?>
			<div class="footer-group">
				<div class="footer-col">
					<?php if ( $socials_title ) : ?>
						<h5><?php echo $socials_title; ?></h5>
					<?php endif; ?>
					<?php get_template_part( 'template-parts/socials' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="footer-group copyright subtitle">
			<?php $site_name = get_bloginfo('name'); ?>
			<p><?php echo sprintf('&#169;&nbsp;%04d&nbsp;%s&nbsp;', date('Y'), $site_name); ?></p>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
