<?php 

// add a field by codestar framework in cars custom post type 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'vehicle_options';
  
    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
      'title'     => 'Vehicle Specifications',
      'post_type' => 'cars',
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'title'  => 'Additional Information',
      'fields' => array(
  
        // Key
        array(
          'id'    => 'key',
          'type'  => 'text',
          'title' => 'Unique Key',
        ),
        // Model
        array(
          'id'    => 'model',
          'type'  => 'text',
          'title' => 'Model',
        ),
        // Model Description
        array(
          'id'    => 'model-description',
          'type'  => 'text',
          'title' => 'Model Description',
        ),
        // Image URL
        array(
          'id'    => 'image_url',
          'type'  => 'text',
          'title' => 'Image URL',
        ),
        // Currency
        array(
          'id'    => 'currency',
          'type'  => 'text',
          'title' => 'Currency',
        ),
        // Price
        array(
          'id'    => 'price',
          'type'  => 'text',
          'title' => 'Price',
        ),
        // Vate rate
        array(
          'id'    => 'vat_rate',
          'type'  => 'text',
          'title' => 'Vate rate',
        ),
        // Vatable
        array(
          'id'    => 'vatable',
          'type'  => 'text',
          'title' => 'Vatable',
        ),
        // Class
        array(
          'id'    => 'class',
          'type'  => 'text',
          'title' => 'Class',
        ),
        // Category
        array(
          'id'    => 'category',
          'type'  => 'text',
          'title' => 'Category',
        ),
        // First Registration
        array(
          'id'    => 'first-registration',
          'type'  => 'text',
          'title' => 'First Registration',
        ),
        // Mileage
        array(
          'id'    => 'mileage',
          'type'  => 'text',
          'title' => 'Mileage',
        ),
        // Transmission
        array(
          'id'    => 'transmission',
          'type'  => 'text',
          'title' => 'Transmission',
        ),
        // Fuel
        array(
          'id'    => 'fuel',
          'type'  => 'text',
          'title' => 'Fuel',
        ),
        // Power
        array(
          'id'    => 'power',
          'type'  => 'text',
          'title' => 'Power',
        ),
        // Fuel consumption Combined
        array(
          'id'    => 'fuel-consumption-combined',
          'type'  => 'text',
          'title' => 'Fuel consumption Combined',
        ),
        // co2 Emissions Combined
        array(
          'id'    => 'co2-emissions-combined',
          'type'  => 'text',
          'title' => 'co2 Emissions Combined',
        ),
        // Seller zipcode
        array(
          'id'    => 'zipcode',
          'type'  => 'text',
          'title' => 'Seller zipcode',
        ),
        // Seller city
        array(
          'id'    => 'city',
          'type'  => 'text',
          'title' => 'Seller city',
        ),
        // Seller country code
        array(
          'id'    => 'country-code',
          'type'  => 'text',
          'title' => 'Seller country code',
        ),
        
  
      )
    ) );
  
    
  
  }
  