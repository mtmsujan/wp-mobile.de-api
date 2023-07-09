<?php get_header(); ?>


<div class="single-car">
    <div class="container">

        <a href="/unsere-fahrzeuge" class="text-red mt-2 d-inline-block">zurück</a>

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
                    $fuel_consumption_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['fuel-consumption-combined'];
                    $co2_emissions_combined = get_post_meta(get_the_id(), 'vehicle_options', true)['co2-emissions-combined'];
                    $zipcode = get_post_meta(get_the_id(), 'vehicle_options', true)['zipcode'];
                    $city = get_post_meta(get_the_id(), 'vehicle_options', true)['city'];
                    $country_code = get_post_meta(get_the_id(), 'vehicle_options', true)['country-code'];
                
            ?>

                <div class="car-item">

                    <h1 class="page-title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="four-columns">
                        <div class="car-image column overflow-hidden">
                            <?php
                                $image_url = get_post_meta(get_the_id(), 'vehicle_options', true)['image_url'];
                                if ( !empty($image_url) ) {
                                    echo '<img src="'.$image_url.'" alt="'.get_the_title().'">';
                                } else {
                                    echo '<img src="'.plugin_dir_url( __FILE__ ).'/assets/img/no-image.jpg" alt="'.get_the_title().'">';
                                }
                            ?>
                            <!-- <div class="slick-carousel">
                                
                                <div>
                                    <img src="http://carsapi.test/wp-content/uploads/2023/07/436932-649ed8589dd9b49a86372-55e6-470c-aebb-3e2a400247fa_rulemo-640.jpg" alt="">
                                </div>
                                <div>
                                    <img src="http://carsapi.test/wp-content/uploads/2023/07/436932-649ed8589dd9b49a86372-55e6-470c-aebb-3e2a400247fa_rulemo-640.jpg" alt="">
                                </div>
                                <div>
                                    <img src="http://carsapi.test/wp-content/uploads/2023/07/436932-649ed8589dd9b49a86372-55e6-470c-aebb-3e2a400247fa_rulemo-640.jpg" alt="">
                                </div>
                                <div>
                                    <img src="http://carsapi.test/wp-content/uploads/2023/07/436932-649ed8589dd9b49a86372-55e6-470c-aebb-3e2a400247fa_rulemo-640.jpg" alt="">
                                </div>
                                <div>
                                    <img src="http://carsapi.test/wp-content/uploads/2023/07/436932-649ed8589dd9b49a86372-55e6-470c-aebb-3e2a400247fa_rulemo-640.jpg" alt="">
                                </div>
                                        
                            </div> -->
                        </div>
                        
                        <div class="car-content column">
                            <div class="price-content">
                                <h1 class="price"><?php echo $price . ' ' . $currency; ?></h1>
                                <p class="price-label"><?php echo $vatable; ?></p>
                            </div>
                            <p><?php echo $class . '<br />' . $category; ?></p>
                            <p><strong>EZ:</strong> <?php echo $first_registration; ?></p>
                            <p><strong>Kilometerstand:</strong> <?php echo $mileage; ?></p>
                            <p><strong>Treibstoff:</strong> <?php echo strtoupper($fuel); ?></p>
                            <p><strong>Leistung:</strong> <?php echo $fuel_with_power; ?></p>
                            <p><strong>Getriebe:</strong> <?php echo $transmission; ?></p>
                            
                            <h2 class="sub-title">Verkäuferin</h2>
                            <p><strong>Postleitzahl:</strong> <?php echo $zipcode; ?></p>
                            <p><strong>Stadt:</strong> <?php echo $city; ?></p>
                            <p><strong>Landesvorwahl:</strong> <?php echo $country_code; ?></p>
                            
                        </div>
                        
                    </div>

                    <!-- <div class="additional-info">

                        <h2 class="sub-title">Spezifikation:</h2>
                        <ul class="ausstattung">
                            <li>Zentralverriegelung</li>
                            <li>Servolenkung</li>
                            <li>ABS</li>
                            <li>ESP</li>
                            <li>Scheckheftgepflegt</li>
                            <li>Standheizung</li>
                            <li>Partikelfilter</li>
                            <li>Trennwand</li>
                        </ul>

                        
                    </div> -->
                </div>

                <?php wp_link_pages(); ?>

            <?php endwhile; ?>
        </div>
    </div>
</div>




<?php get_footer(); ?>