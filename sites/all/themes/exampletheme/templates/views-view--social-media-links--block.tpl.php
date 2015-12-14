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

<div class="social-media-links">
	<h2><?php echo $view->result[0]->_field_data['nid']['entity']->title ?></h2>
	<div class="facebook pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a href="<?php echo $view->result[0]->field_field_footer_facebook[0]['raw']['url']; ?>">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h3><?php echo $view->result[0]->field_field_footer_facebook[0]['raw']['title']; ?></h3>
			</div>
	        <div class="fa fa-facebook-square"></div>
	    </a>
	</div>
	<div class="linkedin pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a href="<?php echo $view->result[0]->field_field_linkedin[0]['raw']['url']; ?>">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">			
	    		<h3><?php echo $view->result[0]->field_field_linkedin[0]['raw']['title']; ?></h3>
	    	</div>
	        <div class="fa fa-twitter-square"></div>
	    </a>
	</div>
    <div class="twitter pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<a href="<?php echo $view->result[0]->field_field_footer_twitter[0]['raw']['url']; ?>">
    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    			<h3><?php echo $view->result[0]->field_field_footer_twitter[0]['raw']['title']; ?></h3>
    		</div>
	        <div class="fa fa-linkedin-square"></div>
	    </a>
    </div>
</div>
