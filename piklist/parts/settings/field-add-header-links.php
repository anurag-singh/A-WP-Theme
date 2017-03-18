<?php
/*
Title: Header Links
Order: 30
Tab: Common
Sub Tab: Basic
Setting: front_page_settings
Flow: Demo Workflow
*/

piklist('field', array(
    'type' => 'group'
    ,'field' => 'header_links'
    ,'label' => __('Header Links', 'piklist-demo')
    ,'columns' => 12
    ,'add_more' => false
    ,'fields' => array(
      array(
        'type' => 'text'
        ,'field' => 'contact_no'
        ,'label' => __('Contact No', 'piklist-demo')
        ,'columns' => 4
      )
      
      ,array(
        'type' => 'text'
        ,'field' => 'email_address'
        ,'label' => __('Email Address', 'piklist-demo')
        ,'columns' => 5
      )
      
      
    )
  ));


  
  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Settings Section'
  ));