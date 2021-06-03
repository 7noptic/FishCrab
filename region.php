<section class="region">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="title region__title">
                    Обслуживаем все районы Москвы <br>
                    и Московскую область
                </h2>
            </div>


            <div class="col-12">
                <div class="tags">
                    <div class="swiper-tags">
                        <div class="swiper-wrapper">

                            <?php $i = 0;
                            while (have_rows('glavnaya_-_rajon')): the_row();
                                $i++;

                                // переменные
                                $regionTitle = get_sub_field('nazvanie_rajona');
                                ?>

                                <div class="swiper-slide swiper-slide__wauto">
                                    <a href="#" class="btn btn-transparent tags__link js-region-link">
                                        <?php echo $regionTitle; ?>
                                    </a>
                                </div>

                            <?php endwhile; ?>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <?php $i = 0;
                while (have_rows('glavnaya_-_rajon')): the_row();
                    $i++;

                    $regionTitle = get_sub_field('nazvanie_rajona');

                    ?>

                    <div class="tab js-region-tabs">
                        <div class="container">
                            <div class="row">

                                <div class="col-12 col-lg-3">
                                    <h3 class="subregion__name">
                                        <?php echo $regionTitle; ?>
                                    </h3>

                                    <?php if (have_rows('pod_rajon')): ?>

                                        <nav class="subregion__nav">

                                            <?php while (have_rows('pod_rajon')): the_row();

                                                // переменные
                                                $content = get_sub_field('nazvanie');

                                                ?>

                                                <a href="#" class="subregion__link js-subregion-link">
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                                         alt=""><?php echo $content; ?></a>

                                            <?php endwhile; ?>

                                        </nav>

                                    <?php endif; ?>

                                </div>


                                <?php if (have_rows('pod_rajon')): ?>

                                    <?php while (have_rows('pod_rajon')): the_row();
                                        // переменные
                                        $content = get_sub_field('nazvanie');
//                                        $produkt = get_sub_field('produkt');
                                        ?>

                                        <div class="col-12 col-lg-9 tab subregion__content">

                                            <div class="swiper-region">
                                                <div class="swiper-wrapper">

                                                    <?php if (have_rows('produkt')): ?>

                                                        <?php while (have_rows('produkt')): the_row();

                                                            // переменные
                                                            $image = get_sub_field('izobrazhenie');
                                                            $title = get_sub_field('nazvanie');
                                                            $link = get_sub_field('link');
                                                            $price = get_sub_field('czena_ot');

                                                            ?>

                                                            <div class="swiper-slide">
                                                                <div class="card">
                                                                    <div class="card__img">
                                                                        <a href="<?php echo $link; ?>">
                                                                            <img src="<?php echo $image['url']; ?>"
                                                                                 alt="<?php echo $image['alt'] ?>"/>
                                                                        </a>
                                                                    </div>
                                                                    <div class="card__info">

                                                                        <a href="<?php echo $link; ?>"
                                                                           class="card__name"><?php echo $title; ?></a>

                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="card__text">
                                                                                    Цена от
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <p class="card__price-b">
                                                                                    <?php echo $price; ?> ₽</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="card__btns">
                                                                                    <a href="<?php echo $link; ?>"
                                                                                       class="ajax_add_to_cart add_to_cart_button btn card__btn">
                                                                                        Подробнее
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endwhile; ?>

                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            <div class="region__prev">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                                     alt="">
                                            </div>

                                            <div class="region__next">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                                     alt="">
                                            </div>

                                        </div>

                                    <?php endwhile; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>

        </div>
    </div>
</section>