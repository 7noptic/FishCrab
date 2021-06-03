<?php if (have_rows('slajder_na_glavnoj')): ?>
    <section class="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="swiper-banner">
                    <div class="swiper-wrapper">

                        <?php while (have_rows('slajder_na_glavnoj')): the_row();

                            $zadnij_fon_slajda = get_sub_field('zadnij_fon_slajda');
                            $zagolovok = get_sub_field('zagolovok');
                            $czena = get_sub_field('czena');
                            $opisanie = get_sub_field('opisanie');
                            $izobrazhenie = get_sub_field('izobrazhenie');
                            $product = get_sub_field('tovar');

                            if ($product): ?>
                                <?php foreach ($product as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                                    <?php setup_postdata($post);

                                    $wc_product = wc_get_product($post->ID);


                                    if (get_option('woocommerce_enable_review_rating') === 'no') {
                                        return;
                                    }

                                    $rating_count = $wc_product->get_rating_count();
                                    $review_count = $wc_product->get_review_count();
                                    $average = $wc_product->get_average_rating();

                                    ?>

                                    <div class="swiper-slide banner-slide"
                                         style="background-image: url('<?php echo $izobrazhenie; ?>');">
                                        <div class="container banner__container">
                                            <div class="row banner__row">
                                                <div class="col-12 col-lg-7 banner__col">
                                                    <h2 class="banner__title"><?php echo $zagolovok; ?></h2>
                                                </div>


                                                <div class="col-5 d-none d-lg-block banner-col">
                                                    <div class="banner__card-fix">
                                                    <div class="banner__card">
                                                        <div class="card card-nohover">
                                                            <div class="card__img">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php echo $wc_product->get_image('full'); ?>
                                                                </a>

                                                                <?php if (in_array($post->ID, favorite_id_array())) { ?>
                                                                    <div class="fv_<?php echo $post->ID ?>" >
                                                                        <div class="in-favorite" title="В избранном" data-post_id="<?php echo $post->ID; ?>">
                                                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/heart-active.svg">
                                                                        </div>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="fv_<?php echo $post->ID; ?>">
                                                                        <div class="add-favorite" title="Добавить в избранное" data-post_id="<?php echo $post->ID; ?>">
                                                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/heart.svg">
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>

                                                            <div class="card__feedback">
                                                                <ul class="rating-star reviews-block__rating">

                                                                    <?php
                                                                    $stars = 0;
                                                                    while ($stars < round($average)) {

                                                                        echo '<li class="active"></li>';
                                                                        $stars++;
                                                                    }

                                                                    /* empty stars */
                                                                    $count = 5 - $stars;
                                                                    for ($i = 0; $i < $count; $i++) {
                                                                        echo '<li></li>';
                                                                    }
                                                                    ?>

                                                                </ul>

                                                                <span>Отзывов <?php echo $review_count; ?></span>
                                                            </div>

                                                            <a href="<?php the_permalink(); ?>" class="card__name">
                                                                <?php the_title(); ?></a>

                                                            <div class="row">

                                                                <div class="col-6">
                                                                    <div class="card__text">
                                                                        Цена за 1 кг
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">

                                                                    <?php if ($wc_product->get_regular_price()) { ?>

                                                                        <p class="card__price-b"><?php echo $wc_product->get_regular_price(); ?>
                                                                            ₽</p>

                                                                    <?php } ?>

                                                                </div>

                                                                <?php if($wc_product->get_attribute('razmer_ryby')) { ?>

                                                                    <div class="col-6">
                                                                        <div class="card__text">
                                                                            Размеры рыбы от
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="card__text-b">
                                                                            <?php echo $wc_product->get_attribute('razmer_ryby'); ?>
                                                                        </div>
                                                                    </div>

                                                                <?php } ?>


                                                                <div class="col-6">
                                                                    <div class="card__text">
                                                                        Доставим
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="card__text-b">
                                                                        <?php echo date("d.m.Y", (time()+3600*24*2)); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="card__btns">
                                                                        <a href="<?php echo $wc_product->add_to_cart_url() ?>"
                                                                           class="ajax_add_to_cart add_to_cart_button btn card__btn"
                                                                           data-product_id="<?php echo get_the_ID(); ?>"
                                                                           aria-label="в корзину">
                                                                            В КОРЗИНУ
                                                                        </a>

                                                                        <a href="#"
                                                                           class="btn btn-white card__btn js-one-click">
                                                                            Купить в 1 клик
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        </div>
                                                    

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                            <?php endif; ?>

                        <?php endwhile; ?>

                    </div>

                </div>
                <nav class="banner__pagination">
                    <div class="swiper-pagination swiper-pagination-banner"></div>
                </nav>
            </div>
        </div>
    </section>

<?php endif; ?>
