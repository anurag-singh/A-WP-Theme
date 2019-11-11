<?php
/*
Title: Slider Text
Post Type: slider
*/

piklist('field', array(
  'type' => 'file'
  ,'field' => 'image'
  ,'label' => 'Slider Image'
  ,'options' => array(
      'modal_title' => 'Add Slider Image'
      ,'button' => 'Add Image'
  )
));
piklist('field', array(
  'type' => 'text'
  ,'field' => 'row_1'
  ,'scope' => 'post_meta'
  ,'label' => __('Row - 1', 'piklist-demo')
  ,'attributes' => array(
    'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'row_2'
  ,'scope' => 'post_meta'
  ,'label' => __('Row - 2', 'piklist-demo')
  ,'attributes' => array(
    'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'row_3'
  ,'scope' => 'post_meta'
  ,'label' => __('Row - 3', 'piklist-demo')
  ,'attributes' => array(
    'class' => 'regular-text'
  )
));

piklist('field', array(
  'type' => 'text'
  ,'field' => 'row_4'
  ,'scope' => 'post_meta'
  ,'label' => __('Row - 4', 'piklist-demo')
  ,'attributes' => array(
    'class' => 'regular-text'
  )
));
