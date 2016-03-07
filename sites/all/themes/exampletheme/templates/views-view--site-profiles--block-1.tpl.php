<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="container">
	<div class='col-xs-12 site-profile'>
		<?php 

			foreach ($view->result as $profile): 

			$site_image = file_create_url($profile->field_field_site_screen_shot[0]['raw']['uri']);
			$site_title = $profile->field_field_site_link[0]['raw']['title'];
			$site_link = $profile->field_field_site_link[0]['raw']['url'];
		?>
			<div class="col-sm-6 col-xs-12 site-profile-info">
				<div class="col-xs-12 text-center site-profile-header">
					<h2>
						<?php echo $site_title ;?>
					</h2>
				</div>
				<div class="col-xs-12 site-profile-img">
					<a href="<?php echo $site_link; ?>">
						<img src="<?php echo $site_image; ?>" class="img-responsive">
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>



