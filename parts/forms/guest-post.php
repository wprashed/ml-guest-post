<?php
/*
Title: Post Submit
Method: post
Message: Post Saved
Logged in: true
*/

  // Where to save this form
  piklist('field', array(
    'type' => 'hidden'
    ,'scope' => 'post'
    ,'field' => 'post_type'
    ,'value' => 'gpost'
  ));


  piklist('field', array(
    'type' => 'text'
    ,'scope' => 'post'
    ,'field' => 'post_title'
    ,'label' => __('Title', 'ml-guest-post')
    ,'attributes' => array(
      'wrapper_class' => 'post_title'
      ,'style' => 'width: 100%'
    )
  ));

  piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'gcategory'
    ,'label' => __('Categories', 'ml-guest-post')
    ,'choices' => array(
        '' => 'Choose Category'
      )
      + piklist(get_terms(array(
        'taxonomy' => 'gcategory'
        ,'hide_empty' => false
      ))
      ,array(
        'term_id'
        ,'name'
      )
    )
  ));

  piklist('field', array(
    'type' => 'file'
    ,'field' => '_thumbnail_id'
    ,'scope' => 'post_meta'
    ,'label' => __('Feature Image', 'ml-guest-post')
    ,'options' => array(
      'basic' => true
    )
  ));

  piklist('field', array(
    'type' => 'editor'
    ,'scope' => 'post'
    ,'field' => 'post_content'
    ,'label' => __('Content', 'ml-guest-post')
    ,'attributes' => array(
      'wrapper_class' => 'post_content'
      ,'style' => 'width: 100%'
    )
  ));


  piklist('field', array(
    'type' => 'hidden'
    ,'scope' => 'post'
    ,'field' => 'post_status'
    ,'value' => 'pending'
  ));

  // Submit button
  piklist('field', array(
    'type' => 'submit'
    ,'field' => 'submit'
    ,'value' => 'Submit'
  ));