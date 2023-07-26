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
        // Features 
        array(
          'id'    => 'features',
          'type'  => 'text',
          'title' => 'Features',
        ),
        // All Images
        array(
          'id'    => 'all-images',
          'type'  => 'text',
          'title' => 'All Images',
        ),
        // Seller Company Name
        array(
          'id'    => 'seller-company-name',
          'type'  => 'text',
          'title' => 'Seller Company Name',
        ),
        // Seller Phone Number
        array(
          'id'    => 'seller-phone-1',
          'type'  => 'text',
          'title' => 'Seller Phone Number',
        ),
        // Seller Email
        array(
          'id'    => 'seller-email',
          'type'  => 'text',
          'title' => 'Seller Email',
        ),
        // Cubic Capacity
        array(
          'id'    => 'cubic-capacity',
          'type'  => 'text',
          'title' => 'Cubic Capacity',
        ),
        // Exterior Color
        array(
          'id'    => 'exterior-color',
          'type'  => 'text',
          'title' => 'Exterior Color',
        ),
        // Number of Previous Owners
        array(
          'id'    => 'number-of-previous-owners',
          'type'  => 'text',
          'title' => 'Number of Previous Owners',
        ),
        // Emission Fuel Consumption Combined
        array(
          'id'    => 'emission-fuel-consumption-combined',
          'type'  => 'text',
          'title' => 'Emission Fuel Consumption Combined',
        ),
        // Emission Fuel Consumption Inner City
        array(
          'id'    => 'emission-fuel-consumption-inner-city',
          'type'  => 'text',
          'title' => 'Emission Fuel Consumption Inner City',
        ),
        // Emission Fuel Consumption Outer City
        array(
          'id'    => 'emission-fuel-consumption-outer-city',
          'type'  => 'text',
          'title' => 'Emission Fuel Consumption Outer City',
        ),
        // Co2 Emission
        array(
          'id'    => 'co2-emission',
          'type'  => 'text',
          'title' => 'Co2 Emission',
        ),
        // Interior Type
        array(
          'id'    => 'interior-type',
          'type'  => 'text',
          'title' => 'Interior Type',
        ),
        // Interior Color
        array(
          'id'    => 'interior-color',
          'type'  => 'text',
          'title' => 'Interior Color',
        ),
        // Door count
        array(
          'id'    => 'door-count',
          'type'  => 'text',
          'title' => 'Door Count',
        ),
        // Number of Seats
        array(
          'id'    => 'num-seats',
          'type'  => 'text',
          'title' => 'Number of Seats',
        ),
        // Airbag
        array(
          'id'    => 'airbag',
          'type'  => 'text',
          'title' => 'Airbag',
        ),
        
        
        
  
      )
    ) );
  
    
  
  }
  