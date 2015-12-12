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

<div class="home-doctors clearfix">
    <div class="container bootstrap snippet">
        <div class="row">
			<?php
                $last_value = end((array_keys($view->result)));
                // $last_value = $view->total_rows;  // gives us a total number of items
                if($last_value == 0){
                    $column_structure = "col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1";
                }elseif($last_value == 1){
                    $column_structure = "col-lg-6 col-md-6 col-sm-6 col-xs-8 col-xs-offset-2";
                }elseif($last_value >= 1){
                    $column_structure = "col-lg-3 col-md-3 col-sm-6 col-xs-8 col-xs-offset-2";
                }

			  foreach ($view->result as $staff):
				$staff_img = file_create_url($staff->field_field_photo[0]['raw']['uri']);
			    $staff_name = $staff->field_field_name[0]['raw']['value'];
			    $staff_position = $staff->field_field_position[0]['raw']['value'];
				$staff_email = $staff->field_field_staff_e_mail[0]['raw']['value'];
				$staff_facebook = $staff->field_field_facebook[0]['raw']['value'];
			    $staff_twitter = $staff->field_field_twitter[0]['raw']['value'];
				$staff_skype = $staff->field_field_skype[0]['raw']['value'];
			?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class=
                    "slogan-section animated fadeInUp clearfix ae-animation-fadeInUp">
                    <h2>Meet our <span>Computer Specialists</span></h2>
                        <p>We are here to serve you with honesty and integrity.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- entry1 -->
                <div class="<?php echo $column_structure; ?> block-center text-center doc-item">
                    <div class=
                    "common-doctor animated fadeInUp clearfix ae-animation-fadeInUp">
                    <ul class="list-inline social-lists animate">
                            <li>
                                <a href="<?php echo $staff_skype; ?>"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $staff_email; ?>"><i class="fa fa-envelope"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $staff_twitter; ?>"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo $staff_facebook; ?>"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                        <figure>
                            <img alt="doctor-2" class="doc-img animate attachment-gallery-post-single wp-post-image" src="<?php echo $staff_img; ?>">
                        </figure>
                        <div class="text-content">
                            <h5><?php echo $staff_name; ?></h5>
                            <!-- <div class="for-border"></div> -->
                            <h5><small><?php echo $staff_position; ?></small></h5>
                        </div>
                    </div>
                </div>
                <div class="visible-sm clearfix margin-gap"></div>
			<?php endforeach; ?>
		</div>
    </div>
</div><!-- //The Team -->