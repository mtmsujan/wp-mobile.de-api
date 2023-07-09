<?php 

// add a field by codestar framework in cars custom post type 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'my_post_options';
  
    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
      'title'     => 'My Post Options',
      'post_type' => 'cars',
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'Tab Title 1',
      'fields' => array(
  
        //
        // A text field
        array(
          'id'    => 'opt-text',
          'type'  => 'text',
          'title' => 'Simple Text',
        ),
  
      )
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'Tab Title 2',
      'fields' => array(
  
        // A textarea field
        array(
          'id'    => 'opt-textarea',
          'type'  => 'textarea',
          'title' => 'Simple Textarea',
        ),
  
      )
    ) );
  
  }
  