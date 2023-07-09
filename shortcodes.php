<?php 

// create a shortcode to show all cars by a loop from the post type cars 
function cars_shortcode( $atts ) {
    ob_start();
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $query = new WP_Query( array(
        'post_type' => 'cars',
        'posts_per_page' => 2,
        'paged' => $paged
    ) );
    ?>
    <div class="car-list">
        <div class="container">
            <h1 class="page-title text-red">UNSERE FAHRZEUGE</h1>
            <div class="car-sort">
                <select class="facetwp-sort-select">
                    <option value="default">Sortieren nach</option>
                    <option value="title_asc">Titel (A-Z)</option>
                    <option value="title_desc">Titel (Z-A)</option>
                    <option value="date_desc">Datum (neuste zuerst)</option>
                    <option value="date_asc">Datum (älteste zuerst)</option>
                    <option value="price_up">Preis (aufsteigend)</option>
                </select>
            </div>

            <div class="all-cars">
                <?php while( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="car-item">

                        <h2 class="car-title">
                            <a class="text-red" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="four-columns">
                            <div class="car-image column">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                            <div class="car-content column">
                                <p>Van/Kleinbus , Gebrauchtfahrzeug</p>
                                <p><strong>EZ:</strong> 11.2017</p>
                                <p><strong>Kilometerstand:</strong> 77.855</p>
                                <p><strong>Getriebe:</strong> Schaltgetriebe</p>
                                <p><strong>Leistung:</strong> 100 kW / 136 PS , Benzin</p>
                                <p><strong>Kraftstoffverbr. komb.:*</strong> 5.1 l/100km</p>
                                <p><strong>CO2 Emissionen komb.:</strong> 119 g/km</p>
                            </div>
                            <div class="blank-content column"></div>
                            <div class="price-content column">
                                <h1 class="price">15.300 EUR</h1>
                                <p class="price-label">Mehrwertsteuer nicht ausweisbar</p>
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

    echo '<div class="facetwp-pager container">';
    echo '<span class="facetwp-pager-label">Seite ' . $current_page . ' von ' . $total_pages . ' </span>';

    $pagination_links = paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '/page/%#%',
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