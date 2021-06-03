<?php
/**
 * Template Name: Отзывы компании
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FishCrab
 */

get_header();
?>

<?php if (function_exists('kama_breadcrumbs')) {
    kama_breadcrumbs('');
} ?>

    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title"><?php the_title(); ?></h1>
                </div>

                <?php

                //Page variables.
                $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $per_page = 20;
                $offset = (($page - 1) * $per_page);


                //Args - comments (paginated).
                $args1 = array(
                    'status' => 'approve',
//					'post_status' => 'publish',
                    'number' => $per_page,
                    'offset' => $offset,
                    'hierarchical' => 'threaded',
                );

                //Args - comments (not paginated).
                $args2 = array(
                    'status' => 'approve',
                    'post_status' => 'publish',
                );

                //Get comments (paginated).
                $all_comments1 = get_comments($args1);

                //Get comments (not paginated) and count.
                $all_comments2 = get_comments($args2);
                $all_comments_num = count($all_comments2);


                //				// Получаем комментарии поста с ID XXX из базы данных
                //				$all_comments1 = get_comments( array(
                //					'post_id'      => get_the_ID(),
                //					'status'       => 'approve', // комментарии прошедшие модерацию
                //					'hierarchical' => 'threaded',
                //				) );


                //                var_dump($all_comments1);
                //
                //                var_dump($all_comments2);

                ?>


                <div class="col-12 col-lg-8 d-flex flex-column order-1">

                    <?php foreach ($all_comments1 as $comment) { ?>

                        <div class="review" id="review-<?php echo $comment->comment_ID; ?>">
                            <div class="review__header">
                                <div class="review__img"><?php
                                    global $post;
                                    $url = get_avatar_url($comment->comment_author_email);
                                    $img = '<img alt="" src="' . $url . '">';
                                    echo $img;
                                    ?></div>
                                <div class="review__name"><?php echo $comment->comment_author; ?></div>
                            </div>
                            <div class="review__feedback">

                                <?php if ($rating = get_comment_meta($comment->comment_ID, 'rating', true)) : ?>

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

                                <span>5,0 / 21 Оценка</span>
                            </div>

                            <div class="review__content"><?php echo get_comment_text($comment->comment_ID); ?></div>

                            <?php

                            if ($comments = get_comments(
                                array(
                                    'parent' => $comment->comment_ID,
                                    'hierarchical' => 'threaded',
                                ))
                            ) : ?>

                                <?php foreach ($comments as $comment2) : ?>

                                    <div class="review__answer">
                                        <div class="review">
                                            <div class="review__header">
                                                <div class="review__img"><img
                                                            src="<?php echo get_avatar_url('zybpwnz@gmail.com'); ?>"
                                                            alt=""></div>
                                                <div class="review__name"><?php echo $comment2->comment_author; ?></div>
                                            </div>
                                            <div class="review__content"><?php echo get_comment_text($comment2->comment_ID); ?></div>
                                            <div class="review__answer"></div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </div>

                        <?php
                    } ?>

                </div>

                <div class="col-12 col-lg-4 order-3 order-lg-2">
                    <form action="<?php echo site_url('wp-comments-post.php') ?>" method="post"
                          enctype="multipart/form-data">

                        <div class="modal-form__wrapper">
                        <span><input type="text" class="form-control form__input" name="author" id="author"
                                     placeholder="Имя"></span>

                            <span><input type="tel" class="form-control form__input"
                                         placeholder="Телефон"></span>

                            <span><input type="email" name="email" class="form-control form__input"
                                         placeholder="Email"></span>

                            <span><textarea name="comment" class="form-control form__textarea"
                                            id="comment"
                                            cols="30" rows="10" placeholder="Ваш отзыв"></textarea>
                        </span>

                            <span>
                            <label for="your-ava" class="btn btn-border-dashed modal-form__btn">Картинка</label>
                            <input type="file" name="attachment" class="form-control d-none" id="attachment">
                        </span>

                            <div class="modal-form__star">
                                Ваша оценка
                                <ul class="rating-star js-rating">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <input type="hidden" class="form-control" value="0" name="rating"
                                       id="js-rating">
                            </div>

                            <?php
                            comment_id_fields();
//                            do_action('comment_form', $product->get_id());
                            ?>

                            <span><button type="submit"
                                          class="btn modal-form__btn">ОТПРАВИТЬ</button></span>
                        </div>

                        <div class="modal-form__agreement">Я согласен условиями предоставления услуг и
                            обработкой моих
                            персональных данных при нажатии “Отправить”
                        </div>
                    </form>
                </div>

                <div class="col-12 d-flex order-2 order-lg-3 justify-content-center">

<!--                    <div class="col-12 col-lg-6">-->
<!--                        <div class="reviews-form" id="respond">-->
<!--                            <a href="#" class="reviews-form__link">Написать в Яндекс.Маркет</a>-->
<!---->
<!--                            <p class="reviews-form__text">Оцените магазин</p>-->
<!---->
<!--                            <div class="reviews-form__yandex">-->
<!--                                <img src="--><?php //echo esc_url( get_template_directory_uri() ); ?><!--/assets/img/yandex.svg"-->
<!--                                     alt="yandex">-->
<!--                                <ul class="rating-star reviews-block__rating">-->
<!--                                    <li class="active"></li>-->
<!--                                    <li class="active"></li>-->
<!--                                    <li class="active"></li>-->
<!--                                    <li class="active"></li>-->
<!--                                    <li></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <h2 class="reviews-form__title">Оставить отзыв</h2>-->
<!--                            <form action="--><?php //echo site_url( 'wp-comments-post.php' ) ?><!--" method="post"-->
<!--                                  enctype="multipart/form-data">-->
<!---->
<!--                                <div class="reviews-form__wrapper">-->
<!--                            <span>-->
<!--                                <label for="comment">Отзыв</label>-->
<!--                            </span>-->
<!--                                    <span>-->
<!--                                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>-->
<!--                            </span>-->
<!--                                    <span>-->
<!--                                <input type="text" name="author" id="author" class="form-control form__input"-->
<!--                                       placeholder="Имя">-->
<!--                            </span>-->
<!---->
<!--                                    <span>-->
<!--                                <input type="text" class="form-control form__input" placeholder="Возраст"-->
<!--                                       onkeypress="return (event.charCode >= 46 && event.charCode <= 57 && /^\D{0,10}/.test(this.value));">-->
<!--                            </span>-->
<!---->
<!--                                    <span>-->
<!--                                <input type="email" name="email" class="form-control form__input" placeholder="Email">-->
<!--                            </span>-->
<!---->
<!--                                    <div class="reviews-form__rating">-->
<!--                                        <p>Ваша оценка</p>-->
<!--                                        <ul class="rating-star js-rating">-->
<!--                                            <li></li>-->
<!--                                            <li></li>-->
<!--                                            <li></li>-->
<!--                                            <li></li>-->
<!--                                            <li></li>-->
<!--                                        </ul>-->
<!--                                        <input type="hidden" class="form-control" value="0" name="rating"-->
<!--                                               id="js-rating">-->
<!--                                    </div>-->
<!---->
<!--                                    <label for="upload-photo" class="form-control btn reviews-form__photo">Загрузить-->
<!--                                        фото</label>-->
<!--                                    <input type="file" class="d-none form-control upload-photo"-->
<!--                                           name="attachment" id="upload-photo">-->
<!---->
<!--                                    <p class="reviews-form__agreement">Я согласен условиями предоставления услуг-->
<!--                                        и обработкой моих персональных данных при нажатии “Отправить”</p>-->
<!---->
<!--                                    --><?php
//                                    comment_id_fields();
//                                    //	                        do_action( 'comment_form', $post_id = null );
//                                    ?>
<!---->
<!--                                    <span>-->
<!--                                <button type="submit" class="form-control btn reviews-form__btn">ОТПРАВИТЬ</button>-->
<!--                            </span>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->


                    <?php
                    //Args - "paginate_links".
                    $page_args = array(
                        'base' => get_permalink(get_the_ID()) . '%_%',
                        'format' => 'page%#%',
                        'total' => floor($all_comments_num / $per_page),
                        'current' => $page,
                        'show_all' => true,
                        'end_size' => 1,
                        'mid_size' => 1,
                        'prev_next' => true,
                        'prev_text' => __(''),
                        'next_text' => __(''),
                        'type' => 'plain',
                    );

                    //Display the "paginate_links".
                    echo '<nav class="navigation pagination">
                            <div class="nav-links">' . paginate_links($page_args) . '</div></nav>';
                    ?>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
