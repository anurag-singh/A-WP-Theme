<?php
/*
Title: Teammates Details
slug: creative-heads
*/


piklist('field', array(
    'type' => 'group'
    ,'field' => 'teammate_details' // removing this parameter saves all fields as separate meta
    ,'label' => __('Teammate', 'piklist-demo')
    ,'add_more' => true
    ,'list' => false
    // ,'description' => __('A grouped field with the field parameter set.', 'piklist-demo')
    ,'fields' => array(
      array(
        'type' => 'text'
        ,'field' => 'name'
        ,'label' => __('Name', 'piklist-demo')
        ,'columns' => 6
        ,'attributes' => array(
          'placeholder' => 'Name'
        )
      )
      ,array(
        'type' => 'text'
        ,'field' => 'designation'
        ,'label' => __('Designation', 'piklist-demo')
        ,'columns' => 6
        ,'attributes' => array(
          'placeholder' => 'Designation'
        )
      )
      ,array(
        'type' => 'file'
        ,'field' => 'profile_photo'
        ,'label' => 'Profile Photo'
        ,'options' => array(
            'modal_title' => 'Add Profile Photo'
            ,'button' => 'Add Photo'
        )
      )
      ,array(
        'type' => 'group'
        ,'field' => 'social_profiles'
        ,'add_more' => true
        ,'fields' => array(
          array(
            'type' => 'select'
            ,'field' => 'social_ac'
            ,'label' => __('Social A/C', 'piklist-demo')
            ,'columns' => 3
            ,'choices' => social_ac_list()
          )
          ,array(
            'type' => 'url'
            ,'field' => 'social_url'
            ,'label' => __('Profile Url', 'piklist-demo')
            ,'columns' => 9
            ,'attributes' => array(
              'placeholder' => 'Social Profile Url'
            )
          )
        )
      )
    )
));

function social_ac_list() {
  return  $social_ac = array(
    'facebook' => 'Facebook'
    ,'twitter' => 'Twitter'
    ,'instagram' => 'Instagram'
  );
}