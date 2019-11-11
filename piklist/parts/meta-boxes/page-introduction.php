<?php
/*
Title: Services
slug: introduction
*/

piklist('field', array(
  'type' => 'group'
  // ,'field' => 'section-1'
  ,'label' => __('Section', 'piklist-demo')
  ,'list' => false
  // ,'description' => __('A grouped field with a key set. Data is not searchable, since it is saved in an array.', 'piklist-demo')
  ,'fields' => array(
    array(
      'type' => 'text'
      ,'field' => 'row-1'
      ,'label' => __('Heading 1', 'piklist-demo')
      ,'columns' => 12
    )
    ,array(
      'type' => 'text'
      ,'field' => 'row-2'
      ,'label' => __('Heading 2', 'piklist-demo')
      ,'columns' => 12
    )
    ,array(
      'type' => 'editor'
      ,'field' => 'row-3'
      // ,'scope' => 'post'
      // ,'required' => true
      ,'label' => __('Content', 'piklist-demo')
      // ,'description' => __('This is a replacement for the post_content editor', 'piklist-demo')
      // ,'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
      ,'options' => array(
        'wpautop' => true
        ,'textarea_rows' => 5
        ,'media_buttons' => false
        ,'drag_drop_upload' => false
        ,'shortcode_buttons' => true
        ,'teeny' => false
        ,'dfw' => false
        ,'tinymce' => array(
          'resize' => false
          ,'wp_autoresize_on' => true
        )
        ,'quicktags' => true
      )
    )
    ,array(
      'type' => 'text'
      ,'field' => 'row-4'
      ,'label' => __('Heading 2', 'piklist-demo')
      ,'columns' => 12
    )
    ,array(
      'type' => 'editor'
      ,'field' => 'row-5'
      // ,'scope' => 'post'
      // ,'required' => true
      ,'label' => __('Content', 'piklist-demo')
      // ,'description' => __('This is a replacement for the post_content editor', 'piklist-demo')
      // ,'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
      ,'options' => array(
        'wpautop' => true
        ,'textarea_rows' => 5
        ,'media_buttons' => false
        ,'drag_drop_upload' => false
        ,'shortcode_buttons' => true
        ,'teeny' => false
        ,'dfw' => false
        ,'tinymce' => array(
          'resize' => false
          ,'wp_autoresize_on' => true
        )
        ,'quicktags' => true
      )
    )
    ,array(
      'type' => 'file'
      ,'field' => 'section-1-media'
      ,'scope' => 'post_meta'
      ,'label' => __('Media Uploader', 'piklist-demo')
      ,'options' => array(
        'modal_title' => __('Add File(s)', 'piklist-demo')
        ,'button' => __('Add', 'piklist-demo')
      )
    )
  )
  ,'on_post_status' => array(
    'value' => 'lock'
  )
));

