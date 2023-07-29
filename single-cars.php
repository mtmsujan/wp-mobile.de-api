<?php get_header(); 

// get the id of the current post
// $vehicle_id = get_the_ID();
// $key = get_post_meta(get_the_id(), 'vehicle_options', true)['key'];
// $voptions = get_post_meta(get_the_id(), 'vehicle_options', true);
// $predefined_images = isset($voptions['all-images']) ? $voptions['all-images'] : "";


// // if ( !isset($predefined_images) || empty($predefined_images) ){

//     $vehicle_options = get_post_meta($vehicle_id, 'vehicle_options', true);

//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://services.mobile.de/search-api/ad/' . $key,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'GET',
//         CURLOPT_HTTPHEADER => array(
//                 'Accept: application/xml',
//                 'Accept-Encoding: gzip',
//                 'Accept-Language: de',
//                 'Content-Type: application/xml',
//                 'Authorization: Basic ZGxyX21pY2hlbGZ1bGxvbmU6eDhTVDdMbm9LWGVT'
//             ),
//         )
//     );

//     $response = curl_exec($curl);
//     $response = str_replace('resource:','', $response);
//     $response = str_replace('ad:','', $response);
//     $response = str_replace('seller:','', $response);

//     curl_close($curl);

//     $xml = simplexml_load_string($response);
//     $json = json_encode($xml);
//     $car_array = json_decode($json,TRUE);

//     echo '<pre>';
//     print_r($car_array);
//     echo '</pre>';


//     $key = $car_array['@attributes']['key'];
//     $model = isset($car_array['vehicle']['model']) ? $car_array['vehicle']['model']['@attributes']['key'] : "";
//     $model_description = $car_array['vehicle']['model-description']['@attributes']['value'];
//     $title = $model . ' ' . $model_description;
//     $image = $car_array['images']['image'][0]['representation'][1]['@attributes']['url'];
//     $currency = $car_array['price']['@attributes']['currency'];
//     $price = $car_array['price']['consumer-price-amount']['@attributes']['value'];
//     $vat_rate = isset($car_array['price']['vat-rate']) ? $car_array['price']['vat-rate']['@attributes']['value'] : "";
//     $vatable = $car_array['price']['vatable']['@attributes']['value'] == "false" ? "Mehrwertsteuer nicht ausweisbar" : "Inkl. 19% USt.";

//     $vehicleClass = $car_array['vehicle']['class']['@attributes']['key']; // SUV/Geländewagen/Pickup
//     $vehicleCategory = $car_array['vehicle']['category']['@attributes']['key']; // Gebrauchtfahrzeug
//     $firstRegistration = $car_array['vehicle']['specifics']['first-registration']['@attributes']['value']; // 03.2018
//     $mileage = $car_array['vehicle']['specifics']['mileage']['@attributes']['value']; // 29,694
//     $transmission = $car_array['vehicle']['specifics']['gearbox']['@attributes']['key']; // Automatik
//     $fuel = $car_array['vehicle']['specifics']['fuel']['@attributes']['key']; // diesel / petrol
//     $power = $car_array['vehicle']['specifics']['power']['@attributes']['value']; // 132 kW / 179 PS , Benzin
//     $power_with_fuel = $power . ' kW / ' . round($power * 1.36) . ' PS , ' . $fuel;
//     $fuelConsumptionCombined = isset($car_array['vehicle']['specifics']['emission-fuel-consumption']) ? $car_array['vehicle']['specifics']['emission-fuel-consumption']['@attributes']['combined'] : "";
//     $co2EmissionsCombined = isset($car_array['vehicle']['specifics']['emission-fuel-consumption']) ? $car_array['vehicle']['specifics']['emission-fuel-consumption']['@attributes']['co2-emission'] : "";

//     $zipcode = $car_array['seller']['address']['zipcode']['@attributes']['value'];
//     $city = $car_array['seller']['address']['city']['@attributes']['value'];
//     $country_code = $car_array['seller']['address']['country-code']['@attributes']['value'];


//     $all_images = $car_array['images']['image'];

//     $total_images = count($all_images);

//     $images = [];

//     foreach($all_images as $single_image){
//         $images[] = $single_image['representation'][1]['@attributes']['url'];
//     }

//     $images_json = json_encode($images);

//     $post_id = $vehicle_id;
//     $new_content = $car_array['description'];
//     $updated_post = array(
//         'ID'           => $post_id,
//         'post_content' => $new_content,
//     );
//     wp_update_post($updated_post);

//     if($post_id){
//         $vehicle_options = [];
//         $vehicle_options['key'] = $key;
//         $vehicle_options['model'] = $model;
//         $vehicle_options['model-description'] = $model_description;
//         $vehicle_options['image_url'] = $image;
//         $vehicle_options['currency'] = $currency;
//         $vehicle_options['price'] = $price;
//         $vehicle_options['vat_rate'] = $vat_rate;
//         $vehicle_options['vatable'] = $vatable;
//         $vehicle_options['class'] = $vehicleClass;
//         $vehicle_options['category'] = $vehicleCategory;
//         $vehicle_options['first-registration'] = $firstRegistration;
//         $vehicle_options['mileage'] = $mileage;
//         $vehicle_options['transmission'] = $transmission;
//         $vehicle_options['fuel'] = $fuel;
//         $vehicle_options['power'] = $power;
//         $vehicle_options['fuel-consumption-combined'] = $fuelConsumptionCombined;
//         $vehicle_options['co2-emissions-combined'] = $co2EmissionsCombined;
//         $vehicle_options['zipcode'] = $zipcode;
//         $vehicle_options['city'] = $city;
//         $vehicle_options['country-code'] = $country_code;

//         $vehicle_options['all-images'] = $images_json;

//         update_post_meta($post_id, 'vehicle_options', $vehicle_options);

//     }

// }

?>


<div class="single-car">
    <div class="container">

        <a href="/fahrzeuge" class="text-red mt-2 d-inline-block">zurück</a>

        <div class="car-section">
            <?php while( have_posts() ) : the_post(); 
            
            $key = get_post_meta(get_the_id(), 'vehicle_options', true)['key'];
            $model = get_post_meta(get_the_id(), 'vehicle_options', true)['model'];
            $model_description = get_post_meta(get_the_id(), 'vehicle_options', true)['model-description'];
            $image_url = get_post_meta(get_the_id(), 'vehicle_options', true)['image_url'];
            $currency = get_post_meta(get_the_id(), 'vehicle_options', true)['currency'];
            $price = get_post_meta(get_the_id(), 'vehicle_options', true)['price'];
            $vat_rate = get_post_meta(get_the_id(), 'vehicle_options', true)['vat_rate'];
            $vatable = get_post_meta(get_the_id(), 'vehicle_options', true)['vatable'];
            $class = get_post_meta(get_the_id(), 'vehicle_options', true)['class'];
            $category = get_post_meta(get_the_id(), 'vehicle_options', true)['category'];
            $first_registration = get_post_meta(get_the_id(), 'vehicle_options', true)['first-registration'];
            $mileage = get_post_meta(get_the_id(), 'vehicle_options', true)['mileage'];
            $transmission = get_post_meta(get_the_id(), 'vehicle_options', true)['transmission'];
            $fuel = get_post_meta(get_the_id(), 'vehicle_options', true)['fuel'];
            $power = get_post_meta(get_the_id(), 'vehicle_options', true)['power'];
            $fuel_with_power = $power . ' kW / ' . round($power * 1.36) . ' PS , ' . $fuel;
            $fuel_consumption_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['emission-fuel-consumption-combined'];
            $co2_emissions_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['co2-emission'];
            $zipcode = get_post_meta(get_the_id(), 'vehicle_options', true)['zipcode'];
            $city = get_post_meta(get_the_id(), 'vehicle_options', true)['city'];
            $country_code = get_post_meta(get_the_id(), 'vehicle_options', true)['country-code'];
            $all_images = get_post_meta(get_the_id(), 'vehicle_options', true)['all-images'];
            $all_images = json_decode($all_images, true);


            $cubic_capacity = get_post_meta(get_the_id(), 'vehicle_options', true)['cubic-capacity'];
            $exterior_color = get_post_meta(get_the_id(), 'vehicle_options', true)['exterior-color'];
            $number_of_previous_owners = get_post_meta(get_the_id(), 'vehicle_options', true)['number-of-previous-owners'];
            $emmision_fuel_consumption_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['emission-fuel-consumption-combined'];
            $emmision_fuel_consumption_inner = get_post_meta(get_the_id(), 'vehicle_options', true)['emission-fuel-consumption-inner-city'];
            $emmision_fuel_consumption_outer = get_post_meta(get_the_id(), 'vehicle_options', true)['emission-fuel-consumption-outer-city'];
            $co2_emissions_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['co2-emission'];
            $interior_type = get_post_meta(get_the_id(), 'vehicle_options', true)['interior-type'];
            $interior_color = get_post_meta(get_the_id(), 'vehicle_options', true)['interior-color'];
            $door_count = get_post_meta(get_the_id(), 'vehicle_options', true)['door-count'];
            $number_of_seats = get_post_meta(get_the_id(), 'vehicle_options', true)['num-seats'];
            $airbag = get_post_meta(get_the_id(), 'vehicle_options', true)['airbag'];


            $features = get_post_meta(get_the_id(), 'vehicle_options', true)['features'];
            $features = json_decode($features, true);

            $company_name = get_post_meta(get_the_id(), 'vehicle_options', true)['seller-company-name'];
            $seller_phone_1 = get_post_meta(get_the_id(), 'vehicle_options', true)['seller-phone-1'];
            $seller_email = get_post_meta(get_the_id(), 'vehicle_options', true)['seller-email'];
            
                
            ?>

                <div class="car-item">
                
                    <h1 class="page-title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="four-columns">
                        <div class="car-image column overflow-hidden">
                            <?php if ( empty($image_url) ) {
                                
                                echo '<img class="img-responsive" src="'.plugin_dir_url( __FILE__ ).'/assets/img/no-img.jpg" alt="'.get_the_title().'">';
                            } ?>

                            <div class="vehicle-slider">
                                <div class="item">
                                    <div class="clearfix" style="max-width: 600">
                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            <?php foreach( $all_images as $single_image) : ?>
                                            <li
                                            data-thumb="<?php echo $single_image; ?>"
                                            >
                                                <img
                                                    style="width: 100%; height: auto"
                                                    src="<?php echo $single_image; ?>"
                                                />
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                        
                        <div class="car-content column">
                            <div class="price-content">
                                <h1 class="price">Preis: <?php echo $price . ' ' . $currency; ?></h1>
                                <p class="price-label"><?php echo $vatable; ?></p>
                            </div>
                            <p><?php echo $class . '<br />' . $category; ?></p>
                            <p><strong>EZ:</strong> <?php echo $first_registration; ?></p>
                            <p><strong>Kilometerstand:</strong> <?php echo $mileage; ?></p>
                            <p><strong>Treibstoff:</strong> <?php echo strtoupper($fuel); ?></p>
                            <p><strong>Leistung:</strong> <?php echo $fuel_with_power; ?></p>
                            <p><strong>Getriebe:</strong> <?php echo $transmission; ?></p>
                            
                            <h2 class="sub-title">Verkäufer</h2>
                            <p><?php echo $company_name; ?></p>
                            <p><strong>Tel: </strong> <?php echo $seller_phone_1; ?></p>
                            <p><strong>E-Mail:</strong> mb.automobile@mail.de</p>
                            <a class="elementor-button elementor-button-link elementor-size-sm bg-red" href="/contact">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">
                                        Kontakt
                                    </span>
                                </span>
                            </a>
                        </div>
                        
                    </div>

                    <div class="additional-info">
                        
                        <h2 class="sub-title">Spezifikation:</h2>
                        <ul class="ausstattung">
                            <?php foreach($features as $feature) : ?>
                            <li><?php echo $feature['local-description']; ?></li>
                            <?php endforeach; ?>
                            
                        </ul>

                        <h2 class="sub-title">WEITERE DATEN:</h2>
                        <?php if ( !empty($cubic_capacity) ) : ?>
                        <p><strong>Hubraum: </strong> <?php echo $cubic_capacity; ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($exterior_color) ) : ?>
                        <p><strong>Aussenfarbe: </strong> <?php echo $exterior_color; ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($number_of_previous_owners) ) : ?>
                        <p><strong>Anzahl der Fahrzeughalter: </strong> <?php echo $number_of_previous_owners; ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($emmision_fuel_consumption_combined) ) : ?>
                        <p><strong>Kraftstoffverbr. komb.:* </strong> <?php echo $emmision_fuel_consumption_combined; ?> l/100km</p>
                        <?php endif; ?>
                        <?php if ( !empty($emmision_fuel_consumption_inner) ) : ?>
                        <p><strong>Kraftstoffverbr. innerorts: </strong> <?php echo $emmision_fuel_consumption_inner; ?> l/100km</p>
                        <?php endif; ?>
                        <?php if ( !empty($emmision_fuel_consumption_outer) ) : ?>
                        <p><strong>Kraftstoffverbr. außerorts: </strong> <?php echo $emmision_fuel_consumption_outer; ?> l/100km</p>
                        <?php endif; ?>
                        <?php if ( !empty($co2_emissions_combined) ) : ?>
                        <p><strong>CO2-Emissionen komb.: </strong> <?php echo $co2_emissions_combined; ?> g/km</p>
                        <?php endif; ?>
                        <?php if ( !empty($interior_type) ) : ?>
                        <p><strong>Innenausstattung: </strong> <?php echo $interior_type; ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($interior_color) ) : ?>
                        <p><strong>Farbe d. Innenausstattung: </strong> <?php echo $interior_color; ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($door_count) ) : ?>
                        <p><strong>Türen: </strong> <?php echo $door_count; ?>/5</p>
                        <?php endif; ?>
                        <?php if ( !empty($number_of_seats) ) : ?>
                        <p><strong>Anzahl Sitze: </strong> <?php echo $number_of_seats; ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($airbag) ) : ?>
                        <p><strong>Airbag: </strong> <?php echo $airbag; ?></p>
                        <?php endif; ?>
                        
                        
                    </div>
                </div>

                <?php wp_link_pages(); ?>

            <?php endwhile; ?>
        </div>
    </div>
</div>




<?php get_footer(); ?>