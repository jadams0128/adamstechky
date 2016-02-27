<?php
/**
* @file
* Main view template.
*
* Variables available:
* - $classes_array: An array of classes determined in
*  template_preprocess_views_view(). Default classes are:
*    .view
*    .view-[css_name]
*    .view-id-[view_name]
*    .view-display-id-[display_name]
*    .view-dom-id-[dom_id]
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php foreach($view->result as $index => $image): ?>
        <div class="item <?php if ($index == 0): ?>
          <?php echo "active"; ?>
        <?php endif ?>">
          <div class="col-xs-12 text-center">
            <h1><?php echo $image->_field_data['nid']['entity']->title ?></h1>
          </div>
          <?php if(!empty($image->field_field_banner_image_2[0]['raw']['uri'])): ?>
            <div class="col-sm-3 col-xs-12">
              <img class="img-responsive" src="<?php echo file_create_url($image->field_field_banner_image_2[0]['raw']['uri']) ?>" alt="">
            </div>
          <?php else: ?>
            <div class="col-sm-3 hidden-xs">
              <img class="img-responsive" src="<?php echo file_create_url($image->field_field_banner_image[0]['raw']['uri']) ?>" alt="">
            </div>
          <?php endif; ?>
          <div class="col-sm-6 col-xs-12">
            <h3><?php echo $image->field_body[0]['raw']['value'] ?></h3>
          </div>
          <div class="col-sm-3 hidden-xs">
            <img class="img-responsive" src="<?php echo file_create_url($image->field_field_banner_image[0]['raw']['uri']) ?>" alt="">
          </div>
        </div>
    <?php endforeach; ?>
  </div>
    <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span> -->
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span> -->
  </a>

</div>
<div class="col-xs-12 text-center">
    <a href="contact" class="btn banner-btn">Contact Us</a>
  </div> 
  