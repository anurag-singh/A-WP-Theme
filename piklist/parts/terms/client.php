<?php
/*
Title: Testimonial Details
Taxonomy: client
*/

piklist('field', array(
    'type' => 'file'
    ,'field' => 'client_logo'
    ,'label' => __("Client's logo", 'piklist-demo')
    ,'options' => array(
      'modal_title' => __('Add Logo', 'piklist-demo')
      ,'button' => __('Add Logo', 'piklist-demo')
    )
  ));