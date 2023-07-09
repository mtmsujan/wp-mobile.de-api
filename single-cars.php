<?php get_header(); ?>


<div class="single-car">
    <div class="container">

        <a href="/unsere-fahrzeuge" class="text-red mt-2 d-inline-block">zurück</a>

        <div class="car-section">
            <?php while( have_posts() ) : the_post(); ?>

                <div class="car-item">

                    <h1 class="page-title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="four-columns">
                        <div class="car-image column overflow-hidden">
                            <?php the_post_thumbnail(); ?>
                            <div class="slick-carousel">
                                
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
                                        
                            </div>
                        </div>
                        
                        <div class="car-content column">
                            <div class="price-content">
                                <h1 class="price">15.300 EUR</h1>
                                <p class="price-label">Mehrwertsteuer nicht ausweisbar</p>
                            </div>
                            <p>Van/Kleinbus , Gebrauchtfahrzeug</p>
                            <p><strong>EZ:</strong> 11.2017</p>
                            <p><strong>Kilometerstand:</strong> 77.855</p>
                            <p><strong>Treibstoff:</strong> Diesel</p>
                            <p><strong>Leistung:</strong> 100 kW / 136 PS , Benzin</p>
                            <p><strong>Getriebe:</strong> Schaltgetriebe</p>

                            <h2 class="sub-title">ANSPRECHPARTNER</h2>
                            <p>Jonathan Weiß</p>
                            <p>Tel.:   0271 7700734-12</p>
                            <p>E-Mail: <a href="mailto:j.weiss@weissauto.de">j.weiss@weissauto.de</a></p>
                        
                            <p class="mt-2">Dirk Schneider</p>
                            <p>Tel.:   0271 7700734-11</p>
                        </div>
                        
                    </div>

                    <div class="additional-info">
                        <p>E-Mail: <a href="mailto:d.schneider@weissauto.de">d.schneider@weissauto.de</a></p>

                        <h2 class="sub-title">UMWELTPLAKETTE:</h2>
                        <img src="https://www.weissauto.de/wp-content/plugins/mobilede_wordpress/images/4.png" alt="">

                        <h2 class="sub-title">AUSSTATTUNG:</h2>
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

                        <h2 class="sub-title">WEITERE DATEN:</h2>
                        <p><strong>Hubraum:</strong> 1598 cm³</p>
                        <p><strong>Aussenfarbe:</strong> Weiß</p>
                        <p><strong>Anzahl Sitze:</strong> 3</p>

                        <p class="small-text">
                            * Weitere Informationen zum offiziellen Kraftstoffverbrauch und zu den offiziellen spezifischen CO2-Emissionen und gegebenenfalls zum Stromverbrauch neuer PKW können dem Leitfaden über den offiziellen Kraftstoffverbrauch, die offiziellen spezifischen CO2-Emissionen und den offiziellen Stromverbrauch neuer PKW' entnommen werden, der an allen Verkaufsstellen und bei der 'Deutschen Automobil Treuhand GmbH' unentgeltlich erhältlich ist unter <a class="text-red" href="http://www.dat.de">www.dat.de</a>.
                        </p>
                    </div>
                </div>

                <?php wp_link_pages(); ?>

            <?php endwhile; ?>
        </div>
    </div>
</div>




<?php get_footer(); ?>