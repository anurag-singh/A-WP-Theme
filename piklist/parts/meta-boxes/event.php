<?php
/*
Title: Testimonial Details
Post Type: event
*/

piklist('field', array(
  'type' => 'file'
  ,'field' => 'event_images'
  ,'label' => __('Event Images', 'piklist-demo')
  // ,'add_more' => true
  ,'options' => array(
                    'modal_title' => 'Add Event Image'
                    ,'button' => 'Add Image'
                )
));