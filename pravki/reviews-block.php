<section class="review-block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title">
                    Отзывы наших клиентов
                </h2>
            </div>

            <div class="col-12">
                <nav class="review-block__nav">
                    <div class="review-block__btns">

                        <?php if ($comm = get_comments(
                            array(
                                'status' => 'approve',
							    'number' => '3',
                                'type'   => 'comment',
//							'post_id' => get_the_ID(),
                            ))) : ?>

                            <a href="#" class="btn btn-transparent review-block__btn js-review-block-link">
                                Отзывы
                            </a>

                        <?php endif; ?>


                        <?php if (have_rows('otzyvy_nashih_klientov')): ?>
                            <?php while (have_rows('otzyvy_nashih_klientov')): the_row();

                                // переменные
                                $nazvanie_taba = get_sub_field('nazvanie_taba');

                                ?>

                                <a href="#" class="btn btn-transparent review-block__btn js-review-block-link">
                                    <?php echo $nazvanie_taba; ?></a>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                    <?php

                    $link = get_field('otzyvy_nashih_klientov_-_ssylka_na_vse_otzyvy');

                    if ($link): ?>

                        <a href="<?php echo $link; ?>" class="review-block__link"><span>ВСЕ ОТЗЫВЫ</span>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                 alt=""></a>

                    <?php endif; ?>

                </nav>
            </div>

            <div class="col-12">
                <p class="review-block__text">
                    Оценка 5 на основании более чем 300 отзывов
                </p>
            </div>


            <div class="col-12">

                <?php if ($rewiews = get_comments(
                    array(
                        'status' => 'approve',
                        'hierarchical' => 'threaded',
                        'number' => '3',
//				'type'         => 'comment',
//                        'post_id' => 366,
                    ))) : ?>


                    <div class="tab js-review-block-tab">
                        <div class="row">

                            <?php foreach ($rewiews as $key => $review) : ?>

                                <div class="col-12 col-md-6 col-lg-4 <?php if ($key >= 2) {
                                    echo 'd-none d-lg-block';
                                } ?>">
                                    <div class="review">

                                        <div class="review__header">
                                            <div class="review__img">
                                                <?php echo get_avatar($review, 60); ?>
                                            </div>
                                            <div class="review__name"><?php echo $review->comment_author; ?></div>
                                        </div>

                                        <div class="review__feedback">
                                            <?php if ($rating = get_comment_meta($review->comment_ID, 'rating', true)) : ?>

                                                <ul class="rating-star">

                                                    <?php
                                                    $stars = 0;
                                                    while ($stars < $rating) {

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

                                            <?php endif; ?>
                                            
                                        </div>

                                        <div class="review__content"><?php echo get_comment_text($review->comment_ID); ?></div>
                                    </div>
                                </div>

                                <?php
                                wp_reset_postdata();
                            endforeach; ?>

                        </div>
                    </div>

                <?php endif; ?>


                <?php if (have_rows('otzyvy_nashih_klientov')): ?>
                    <?php while (have_rows('otzyvy_nashih_klientov')): the_row();

                        // переменные
                        $soderzhimoe_taba = get_sub_field('soderzhimoe_taba');

                        ?>

                        <div class="js-reviews-block-tab">

                            <?php if ($soderzhimoe_taba): ?>

                                <?php foreach ($soderzhimoe_taba as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>

                                    <div class="col-12 col-lg-6">
                                        <div class="board-video">
                                            <div class="board-video__content">
                                                <div class="video">
                                                    <a class="video__link"
                                                       href="https://youtu.be/<?php the_field('id_video_s_youtube', $post); ?>">
                                                        <picture>
                                                            <source srcset="https://i.ytimg.com/vi_webp/<?php the_field('id_video_s_youtube', $post); ?>/hqdefault.webp"
                                                                    type="image/webp">
                                                            <img class="video__media"
                                                                 src="https://i.ytimg.com/vi/<?php the_field('id_video_s_youtube', $post); ?>/hqdefault.jpg"
                                                                 alt="Исупб">
                                                        </picture>
                                                    </a>
                                                    <button class="video__button" aria-label="Запустить видео">
                                                        <svg width="68" height="48" viewBox="0 0 68 48">
                                                            <path class="video__button-shape"
                                                                  d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
                                                            <path class="video__button-icon"
                                                                  d="M 45,24 27,14 27,34"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                                <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>