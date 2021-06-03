<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */

do_action('woocommerce_before_single_product');

global $wishlists;
global $product;
global $post;

if (!wc_review_ratings_enabled()) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating();


if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

if (function_exists('kama_breadcrumbs')) {
    kama_breadcrumbs('');
}

?>


<!--<div id="product---><?php //the_ID(); ?><!--" --><?php //wc_product_class( '', $product ); ?><!--
-->
<!--	--><?php
//	/**
//	 * Hook: woocommerce_before_single_product_summary.
//	 *
//	 * @hooked woocommerce_show_product_sale_flash - 10
//	 * @hooked woocommerce_show_product_images - 20
//	 */
//	do_action( 'woocommerce_before_single_product_summary' );
//	?>
<!---->
<!--	<div class="summary entry-summary">-->
<!--		--><?php
//		/**
//		 * Hook: woocommerce_single_product_summary.
//		 *
//		 * @hooked woocommerce_template_single_title - 5
//		 * @hooked woocommerce_template_single_rating - 10
//		 * @hooked woocommerce_template_single_price - 10
//		 * @hooked woocommerce_template_single_excerpt - 20
//		 * @hooked woocommerce_template_single_add_to_cart - 30
//		 * @hooked woocommerce_template_single_meta - 40
//		 * @hooked woocommerce_template_single_sharing - 50
//		 * @hooked WC_Structured_Data::generate_product_data() - 60
//		 */
//		do_action( 'woocommerce_single_product_summary' );
//		?>
<!--	</div>-->
<!---->
<!--	--><?php
//	/**
//	 * Hook: woocommerce_after_single_product_summary.
//	 *
//	 * @hooked woocommerce_output_product_data_tabs - 10
//	 * @hooked woocommerce_upsell_display - 15
//	 * @hooked woocommerce_output_related_products - 20
//	 */
//	do_action( 'woocommerce_after_single_product_summary' );
//	?>
<!--</div>-->
<!---->
<?php //do_action( 'woocommerce_after_single_product' ); ?>

<?php //if(in_array($post->ID, favorite_id_array())){ ?>
<!--    <div class="fv_--><?php //echo $post->ID; ?><!--" title="Already in favorite" ><img src="http://yoursite.com/path-to-your-icon.svg" ><a href="http://yoursite.com/favorite/">In favorite</a></div>-->
<?php //} else { ?>
<!--    <div class="fv_--><?php //echo $post->ID; ?><!--" >-->
<!--        <div class="add-favorite" title="Add to favorite" data-post_id="--><?php //echo $post->ID; ?><!--">-->
<!--            <img src="http://yoursite.com/path-to-your-icon.svg">Add to favorite-->
<!--        </div>-->
<!--    </div>-->
<?php //} ?>

<section class="product-inner" id="product-<?php the_ID(); ?>">
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">

                                <?php $post_thumbnail_id = $product->get_image_id();
                                if (has_post_thumbnail()) { ?>

                                    <div class="swiper-slide" >
                                        <a href="<?php the_post_thumbnail_url(); ?>" class="glightbox product__img" data-gallery="product" >
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </a>
                                    </div>

                                <?php } ?>


                                <?php
                                if ($attachment_ids = $product->get_gallery_image_ids()) {
                                    foreach ($attachment_ids as $attachment_id) {

                                        $image_url = wp_get_attachment_image_url($attachment_id, 'full');

                                        ?>

                                        <div class="swiper-slide">
                                            <a href="<?php echo $image_url; ?>" class="glightbox product__img" data-gallery="product">
                                                <img src="<?php echo $image_url; ?>" alt="">
                                            </a>
                                        </div>

                                    <?php }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <?php $post_thumbnail_id = $product->get_image_id();
                                if (has_post_thumbnail()) { ?>

                                    <div class="swiper-slide" >
                                    <div class="product__img">
                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                            </div>
                                        
                                    </div>

                                <?php } ?>


                                <?php
                                if ($attachment_ids = $product->get_gallery_image_ids()) {
                                    foreach ($attachment_ids as $attachment_id) {

                                        $image_url = wp_get_attachment_image_url($attachment_id, 'woocommerce_gallery_thumbnail');

                                        ?>

                                        <div class="swiper-slide">
                                            <div class="product__img">
                                                <img src="<?php echo $image_url; ?>" alt="">
                                            </div>
                                        </div>

                                    <?php }
                                }
                                ?>

                            </div>
                        </div>

                        <div class="product__prev">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                 alt="arrright">
                        </div>
                        <div class="product__next">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                 alt="arrright">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-lg-7">
                <h1 class="product__title"><?php the_title(); ?></h1>

                <div class="product__feedback">

                    <ul class="rating-star reviews-block__rating">

                        <?php

                        //                        var_dump($average);
                        //                        var_dump($rating_count);

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

                    <!--                    --><?php //echo wc_get_rating_html($average, $rating_count); // WPCS: XSS ok. ?>


                    <a href="#product-review" class="product__reviews">Отзывов <?php echo $review_count; ?></a>
                </div>

                <div class="product-price"><span>За 1 кг</span>

                    <?php if ($product->get_regular_price()) { ?>

                        <p class="product-price__new"><?php echo $product->get_regular_price(); ?>₽</p>

                    <?php } ?>

                </div>

                <div class="product-count"><span>Количество Кг: </span>
                    <input type="number" class="form-control form__input">
                </div>

                <div class="product__btns">
                    <a href="<?php echo $product->add_to_cart_url() ?>"
                       class="ajax_add_to_cart add_to_cart_button btn card__btn"
                       data-product_id="<?php echo get_the_ID(); ?>"
                       aria-label="в корзину">
                        В КОРЗИНУ
                    </a>
                    <a href="#" class="btn btn-white product__btn js-one-click">Купить в 1 клик</a>
                </div>

                <ul class="product__list">
                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ul1.svg" alt="">
                        <span>Упаковка: 1.3 кг одна штука, стрейч-пленка</span></li>
                    <li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ul2.svg" alt="">
                        <span>Ближайшая отгрузка завтра 28.01 с 8:00 до 20:00</span></li>
                    <li><a href="#product-recipe">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ul3.svg" alt="">
                            <span>Рецепты</span></a></li>
                </ul>

                <div class="row">

                    <?php

                    $attributes = $product->get_attributes();

                    if ($attributes) {

                        foreach ($attributes as $attribute) {

                            // Get the taxonomy.
                            $terms = wp_get_post_terms($product->ID, $attribute['name'], 'all');
                            $taxonomy = $terms[0]->taxonomy;

                            // Get the taxonomy object.
                            $taxonomy_object = get_taxonomy($taxonomy);

                            // Get the attribute label.
                            $attribute_label = $taxonomy_object->labels->name; ?>

                            <div class="col-12 col-sm-6">
                                <div class="product__text-b">
                                    <?php echo wc_attribute_label($attribute['name']); ?>:
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="product__text">

                                    <?php echo get_the_term_list($post->ID, $attribute['name']) ?>

                                    <?php echo $attribute_label; ?>

                                </div>
                            </div>

                        <?php }

                    }

                    ?>

                </div>
            </div>
        </div>

        <div class="row">

            <?php
            $content = trim($product->description);
            if ($content > 0) { ?>

                <div class="col-12">
                    <div class="product-descr">
                        <h2 class="product-descr__title">Описание товара</h2>
                        <div class="product-descr__text"><?php echo $product->description; ?></div>
                    </div>
                </div>

            <?php } ?>


            <?php if (get_field('reczepty')) { ?>
                <div class="col-12">
                    <div class="product-recipe" id="product-recipe">
                        <h2 class="product-descr__title">Рецепты</h2>

                        <?php

                        $reczepty = get_field('reczepty');

                        if ($reczepty): ?>

                            <div class="row">

                                <?php foreach ($reczepty as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="product-recipe__item">
                                            <div class="product-recipe__img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>"
                                               class="product-recipe__link"><?php the_title(); ?></a>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                            <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                        <?php endif; ?>

                    </div>
                </div>
            <?php } ?>


            <div class="col-12">
                <div class="product-review" id="product-review">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <h2 class="product-descr__title">Отзывы</h2>

                            <?php if ($rewiews = get_comments(
                                array(
                                    'status' => 'approve',
                                    'type' => 'review',
                                    'post_id' => $product->get_id(),
                                ))) : ?>

                                <?php foreach ($rewiews as $review) : ?>

                                    <div class="review">
                                        <div class="review__header">
                                            <div class="review__img"><?php
                                                global $post;
                                                $url = get_avatar_url($review->comment_author_email);
                                                $img = '<img alt="" src="' . $url . '">';
                                                echo $img;
                                                ?></div>
                                            <div class="review__name">
                                                <?php echo $review->comment_author; ?></div>
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

                                            <span>5,0 / 21 Оценка</span>
                                        </div>

                                        <div class="review__content">
                                            <?php echo get_comment_text($review->comment_ID); ?></div>

                                        <?php

                                        if ($comments = get_comments(
                                            array(
                                                'parent' => $review->comment_ID,
                                                'hierarchical' => 'threaded',
                                                'status' => 'approve',
                                                'type' => 'comments',
                                                'post_id' => $product->get_id(),
                                            ))
                                        ) : ?>

                                            <?php foreach ($comments as $comment) : ?>

                                                <div class="review__answer">
                                                    <div class="review">
                                                        <div class="review__header">
                                                            <div class="review__img"><img
                                                                        src="
                            <?php echo get_avatar_url('zybpwnz@gmail.com'); ?>"
                                                                        alt=""></div>
                                                            <div class="review__name">
                                                                <?php echo $comment->comment_author; ?></div>
                                                        </div>
                                                        <div class="review__content">
                                                            <?php echo get_comment_text($comment->comment_ID); ?></div>
                                                        <div class="review__answer"></div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>

                                        <?php endif; ?>

                                    </div>

                                <?php endforeach; ?>

                            
                            <?php else : ?>

                            <p class="reviews__text-no-comments">
                            Пока никто не оставлял отзывы. Будьте первыми!
                            <?php

                    $link = get_field('otzyvy_nashih_klientov_-_ssylka_na_vse_otzyvy');

                    if ($link): ?>

                        <a href="<?php echo $link; ?>" class="review-block__link mt-3 mb-3"><span>ВСЕ ОТЗЫВЫ</span>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg"
                                 alt=""></a>

                    <?php endif; ?>
                            </p>
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-lg-4">
                            <a href="#" class="btn review__btn toggleRevFormBtn">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/rev.svg"
                                     alt=""> ОСТАВИТЬ ОТЗЫВ</a>


                            <form class="toggleRevForm" action="<?php echo site_url('wp-comments-post.php') ?>"
                                  method="post"
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
                                    do_action('comment_form', $product->get_id());
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
                    </div>
                </div>
            </div>


            <?php

            $related_products = array(); // array(5, 10, 35)

            $upsells = $product->get_upsell_ids();

            if ($upsells) { ?>

                <div class="col-12">
                    <div class="popular-block">
                        <div class="row">

                            <div class="col-12">
                                <h2 class="product-descr__title">С этим товаром покупают</h2>
                            </div>

                            <?php $related_products = $upsells; ?>

                            <?php foreach ($related_products

                            as $key => $related_product) : ?>

                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                                <?php
                                $post_object = get_post($related_product);

                                setup_postdata($GLOBALS['post'] =& $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

                                if ($key <= 12) {
                                    wc_get_template_part('content', 'product');
                                }

                                ?>

                                <?php endforeach; ?>

                            </div>

                        </div>
                    </div>
                </div>

            <?php }
            ?>

        </div>
    </div>
</section>
