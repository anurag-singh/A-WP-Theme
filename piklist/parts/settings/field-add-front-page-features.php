<?php
/*
Title: Front Page Features
Order: 10
Tab: Common
Sub Tab: Basic
Setting: front_page_settings
Flow: Demo Workflow
*/

  
piklist('field', array(
    'type' => 'group'
    ,'field' => 'front_page_features'
    ,'label' => __('Front Page Features', 'piklist-demo')
    ,'columns' => 12
    ,'add_more' => true
    ,'fields' => array(
      array(
        'type' => 'text'
        ,'field' => 'icon'
        ,'label' => __('Icon', 'piklist-demo')
        ,'columns' => 2
      )
      ,array(
        'type' => 'text'
        ,'field' => 'title'
        ,'label' => __('Title', 'piklist-demo')
        ,'columns' => 8
      )
      ,array(
        'type' => 'editor'
        ,'field' => 'description'
        ,'label' => __('Description', 'piklist-demo')
        ,'columns' => 12
        ,'options' => array(
          'wpautop' => true
          ,'media_buttons' => false
          ,'tabindex' => ''
          ,'editor_css' => ''
          ,'editor_class' => ''
          ,'teeny' => false
          ,'dfw' => false
          ,'tinymce' => true
          ,'quicktags' => true
        )
      )
      ,array(
        'type' => 'file'
        ,'field' => 'image'
        ,'columns' => 12
        ,'label' => __('Image', 'piklist-demo')
        ,'options' => array(
          'modal_title' => __('Add File(s)', 'piklist-demo')
          ,'button' => __('Add', 'piklist-demo')
        )
      )
    )
  ));


  
  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Settings Section'
  ));
