<?php
/*
Title: Video Section
Order: 20
Tab: Common
Sub Tab: Basic
Setting: front_page_settings
Flow: Demo Workflow
*/

piklist('field', array(
    'type' => 'group'
    ,'field' => 'front_page_video'
    ,'label' => __('Front Page Video', 'piklist-demo')
    ,'columns' => 12
    ,'add_more' => false
    ,'fields' => array(
      array(
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
        'type' => 'text'
        ,'field' => 'link_text'
        ,'label' => __('Link Text', 'piklist-demo')
        ,'columns' => 2
      )
      ,array(
        'type' => 'text'
        ,'field' => 'link_url'
        ,'label' => __('Redirect Link URL', 'piklist-demo')
        ,'columns' => 2
      )
      ,array(
        'type' => 'text'
        ,'field' => 'youtube_video_link'
        ,'label' => __('Youtube Video Link', 'piklist-demo')
        ,'columns' => 12
      )
      
      
    )
  ));


  
  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Settings Section'
  ));