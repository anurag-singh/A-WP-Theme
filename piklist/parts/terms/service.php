<?php
/*
Title: Testimonial Details
Taxonomy: service
*/

piklist('field', array(
    'type' => 'file'
    ,'field' => 'service_image'
    ,'label' => __("Service's Image", 'piklist-demo')
    ,'options' => array(
      'modal_title' => __('Add Image', 'piklist-demo')
      ,'button' => __('Add Image', 'piklist-demo')
    )
  ));