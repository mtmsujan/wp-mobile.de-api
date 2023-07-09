<?php 

function remove_query_params($url){

    $base_url = strtok($url, '?');              // Get the base url
    
    return $base_url;   
}

// create a shortcode to show all cars by a loop from the post type cars 
function cars_shortcode( $atts ) {
    ob_start();
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $sort_order = isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : 'default';
    $query = array(
        'post_type' => 'cars',
        'posts_per_page' => 10,
        'paged' => $paged
    );

    switch ($sort_order) {
        case 'title_asc':
            $query['orderby'] = 'title';
            $query['order'] = 'ASC';
            break;
        case 'title_desc':
            $query['orderby'] = 'title';
            $query['order'] = 'DESC';
            break;
        case 'date_desc':
            $query['orderby'] = 'date';
            $query['order'] = 'DESC';
            break;
        case 'date_asc':
            $query['orderby'] = 'date';
            $query['order'] = 'ASC';
            break;
        case 'price_up':
            $query['meta_key'] = 'vehicle_options';
            $query['orderby'] = 'meta_value_num';
            $query['order'] = 'ASC';
            break;
        default:
            break;
    }

    $query = new WP_Query( $query );

    $current_url = remove_query_arg('paged');
    $current_url = esc_url($current_url);
    ?>
    <div class="car-list">
        <div class="container">
            <h1 class="page-title text-red">UNSERE FAHRZEUGE</h1>
            <div class="car-sort">
                <form action="<?php echo $current_url; ?>" method="GET">
                    <select class="facetwp-sort-select" name="sort" onchange="this.form.submit()">
                        <option value="default">Sortieren nach</option>
                        <option value="title_asc" <?php selected($sort_order, 'title_asc'); ?>>Titel (A-Z)</option>
                        <option value="title_desc" <?php selected($sort_order, 'title_desc'); ?>>Titel (Z-A)</option>
                        <option value="date_desc" <?php selected($sort_order, 'date_desc'); ?>>Datum (neuste zuerst)</option>
                        <option value="date_asc" <?php selected($sort_order, 'date_asc'); ?>>Datum (älteste zuerst)</option>
                        <option value="price_up" <?php selected($sort_order, 'price_up'); ?>>Preis (aufsteigend)</option>
                    </select>
                </form>
            </div>

            <div class="all-cars">
                <?php while( $query->have_posts() ) : $query->the_post(); 
                
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
                    $fuel_consumption_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['fuel-consumption-combined'];
                    $co2_emissions_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['co2-emissions-combined'];
                
                ?>

                    <div class="car-item">

                        <h2 class="car-title">
                            <a class="text-red" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="four-columns">
                            <div class="car-image column">
                                <a href="<?php the_permalink(); ?>">
                                <?php
                                    $image_url = get_post_meta(get_the_id(), 'vehicle_options', true)['image_url'];
                                    if ( !empty($image_url) ) {
                                        echo '<img src="'.$image_url.'" alt="'.get_the_title().'">';
                                    } else {
                                        echo '<img src="'.plugin_dir_url( __FILE__ ).'/assets/img/no-image.jpg" alt="'.get_the_title().'">';
                                    }
                                ?>
                                </a>
                            </div>
                            <div class="car-content column">
                                <p><?php echo $class . ' , ' . $category; ?></p>
                                <p><strong>EZ:</strong> <?php echo $first_registration; ?></p>
                                <p><strong>Kilometerstand:</strong> <?php echo $mileage; ?></p>
                                <p><strong>Getriebe:</strong> <?php echo $transmission; ?></p>
                                <p><strong>Leistung:</strong> <?php echo $fuel_with_power; ?></p>
                                <?php if(!empty($fuel_consumption_combined)) : ?>
                                <p><strong>Kraftstoffverbr. komb.:*</strong> <?php echo $fuel_consumption_combined; ?> l/100km</p>
                                <?php endif; ?>
                                <?php if(!empty($co2_emissions_combined)) : ?>
                                <p><strong>CO2 Emissionen komb.:</strong> <?php echo $co2_emissions_combined; ?> g/km</p>
                                <?php endif; ?>
                            </div>
                            <div class="blank-content column"></div>
                            <div class="price-content column">
                                <h1 class="price"><?php echo $price . ' ' . $currency; ?></h1>
                                <p class="price-label"><?php echo $vatable; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php wp_link_pages(); ?>

                <?php endwhile; ?>
            </div>
        </div>
    </div>


    <?php 

    $total_pages = $query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));

    $current_url = remove_query_arg('paged');
    $updated_url = remove_query_arg(array('sort'), $current_url);
    $current_url = preg_replace('/\/page\/\d+\//', '', $updated_url);
    $current_url = esc_url($current_url);
    $current_sort = isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : '';


    echo '<div class="facetwp-pager container">';
    echo '<span class="facetwp-pager-label">Seite ' . $current_page . ' von ' . $total_pages . ' </span>';

    $pagination_links = paginate_links(array(
        'base' => remove_query_params($current_url) . '%_%',
        'format' => '/page/%#%/?sort=' . $current_sort,
        'total' => $total_pages,
        'current' => $current_page,
        'prev_text' => __(' '),
        'next_text' => __(' '),
    ));

    if ($pagination_links) {
        $pagination_links = str_replace('page-numbers', 'facetwp-page', $pagination_links);
        $pagination_links = str_replace('prev', 'facetwp-page-prev', $pagination_links);
        $pagination_links = str_replace('next', 'facetwp-page-next', $pagination_links);

        echo $pagination_links;
    }

    echo '</div>';

    
    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode( 'cars', 'cars_shortcode' );




add_shortcode('add-vehicles', 'add_vehicle_shortcode');

function add_vehicle_shortcode(){

    // remove all posts from cars post type 
    // $args = array(
    //     'post_type' => 'cars',
    //     'posts_per_page' => -1,
    // );
    // $posts = get_posts($args);
    // foreach($posts as $post){
    //     wp_delete_post($post->ID, true);
    // }
    // return "<p class='text-center'>All vehicles removed successfully!</p>";

    // get all ids from cars post type in an array 
    $args = array(
        'post_type' => 'cars',
        'posts_per_page' => -1,
    );
    $vehicles = get_posts($args);
    $vehicle_keys = array();
    foreach($vehicles as $post){
        $vehicle_keys[] = get_post_meta($post->ID, 'vehicle_options', true)['key'];
    }

    // print_r($vehicle_keys);

    // return;

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://services.mobile.de/search-api/search?page.size=100',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Accept: application/xml',
        'Accept-Encoding: gzip',
        'Accept-Language: de',
        'Content-Type: application/xml',
        'Authorization: Basic ZGxyX21pY2hlbGZ1bGxvbmU6eDhTVDdMbm9LWGVT'
    ),
    ));

    $response = curl_exec($curl);
    $response = str_replace('search:','', $response);
    $response = str_replace('ad:','', $response);
    $response = str_replace('seller:','', $response);

    curl_close($curl);

    $xml = simplexml_load_string($response);
    $json = json_encode($xml);
    $car_array = json_decode($json,TRUE);

    $max_pages = $car_array['max-pages'];

    $all_ads = [];

    for($i = 1; $i <= $max_pages; $i++){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://services.mobile.de/search-api/search?page.size=100&page.number=' . $i,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/xml',
            'Accept-Encoding: gzip',
            'Accept-Language: de',
            'Content-Type: application/xml',
            'Authorization: Basic ZGxyX21pY2hlbGZ1bGxvbmU6eDhTVDdMbm9LWGVT'
        ),
        ));

        $response = curl_exec($curl);
        $response = str_replace('search:','', $response);
        $response = str_replace('ad:','', $response);
        $response = str_replace('seller:','', $response);

        curl_close($curl);

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $car_array = json_decode($json,TRUE);

        $all_ads = array_merge( $all_ads, $car_array['ads']['ad']);
    }

    // print_r($all_ads);

    foreach($all_ads as $single_ad){
        $key = $single_ad['@attributes']['key'];
        $model = isset($single_ad['vehicle']['model']) ? $single_ad['vehicle']['model']['@attributes']['key'] : "";
        $model_description = $single_ad['vehicle']['model-description']['@attributes']['value'];
        $title = $model . ' ' . $model_description;
        $image = $single_ad['images']['image']['representation'][1]['@attributes']['url'];
        $currency = $single_ad['price']['@attributes']['currency'];
        $price = $single_ad['price']['consumer-price-amount']['@attributes']['value'];
        $vat_rate = isset($single_ad['price']['vat-rate']) ? $single_ad['price']['vat-rate']['@attributes']['value'] : "";
        $vatable = $single_ad['price']['vatable']['@attributes']['value'] == "false" ? "Mehrwertsteuer nicht ausweisbar" : "Inkl. 19% USt.";
        
        $vehicleClass = $single_ad['vehicle']['class']['@attributes']['key']; // SUV/Geländewagen/Pickup
        $vehicleCategory = $single_ad['vehicle']['category']['@attributes']['key']; // Gebrauchtfahrzeug
        $firstRegistration = $single_ad['vehicle']['specifics']['first-registration']['@attributes']['value']; // 03.2018
        $mileage = $single_ad['vehicle']['specifics']['mileage']['@attributes']['value']; // 29,694
        $transmission = $single_ad['vehicle']['specifics']['gearbox']['@attributes']['key']; // Automatik
        $fuel = $single_ad['vehicle']['specifics']['fuel']['@attributes']['key']; // diesel / petrol
        $power = $single_ad['vehicle']['specifics']['power']['@attributes']['value']; // 132 kW / 179 PS , Benzin
        $power_with_fuel = $power . ' kW / ' . round($power * 1.36) . ' PS , ' . $fuel;
        $fuelConsumptionCombined = isset($single_ad['vehicle']['specifics']['emission-fuel-consumption']) ? $single_ad['vehicle']['specifics']['emission-fuel-consumption']['@attributes']['combined'] : "";
        $co2EmissionsCombined = isset($single_ad['vehicle']['specifics']['emission-fuel-consumption']) ? $single_ad['vehicle']['specifics']['emission-fuel-consumption']['@attributes']['co2-emission'] : "";
        
        $zipcode = $single_ad['seller']['address']['zipcode']['@attributes']['value'];
        $city = $single_ad['seller']['address']['city']['@attributes']['value'];
        $country_code = $single_ad['seller']['address']['country-code']['@attributes']['value'];
    

        if(!in_array($key, $vehicle_keys)){
            
            // insert new post to post type cars 
            $post_id = wp_insert_post(array(
                'post_title' => $model_description,
                'post_type' => 'cars',
                'post_status' => 'publish'
            ));

            // insert post meta
            if($post_id){
                $vehicle_options = [];

                $vehicle_options['key'] = $key;
                $vehicle_options['model'] = $model;
                $vehicle_options['model-description'] = $model_description;
                $vehicle_options['image_url'] = $image;
                $vehicle_options['currency'] = $currency;
                $vehicle_options['price'] = $price;
                $vehicle_options['vat_rate'] = $vat_rate;
                $vehicle_options['vatable'] = $vatable;
                $vehicle_options['class'] = $vehicleClass;
                $vehicle_options['category'] = $vehicleCategory;
                $vehicle_options['first-registration'] = $firstRegistration;
                $vehicle_options['mileage'] = $mileage;
                $vehicle_options['transmission'] = $transmission;
                $vehicle_options['fuel'] = $fuel;
                $vehicle_options['power'] = $power;
                $vehicle_options['fuel-consumption-combined'] = $fuelConsumptionCombined;
                $vehicle_options['co2-emissions-combined'] = $co2EmissionsCombined;
                $vehicle_options['zipcode'] = $zipcode;
                $vehicle_options['city'] = $city;
                $vehicle_options['country-code'] = $country_code;

                update_post_meta($post_id, 'vehicle_options', $vehicle_options);

            }
            
        }
        
    
    }

    return "<p class='text-center'>All vehicles imported successfully!</p>";
}