<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

global $product;
global $post;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>


<?php

if (is_product_category()) {
    echo '<div class="col-12 col-md-6 col-lg-4 category_">';
} elseif (is_archive()) {
    echo '<div class="col-12 col-md-6 col-xl-3 no-category">';
} else {

}

if (get_option('woocommerce_enable_review_rating') === 'no') {
    return;
}


$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating();

?>

<div class="card" id="<?php echo $post->ID; ?>">
    <div class="card__img">
        <a href="<?php the_permalink(); ?>">
            <?php echo $product->get_image('full'); ?>
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

    <div class="card__info">
        <div class="card__feedback">
            <ul class="rating-star">
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

        <a href="<?php the_permalink(); ?>" class="card__name"><?php the_title(); ?></a>
        <div class="row">
            <div class="col-6">
                <div class="card__text">Цена за 1 кг</div>
            </div>
            <div class="col-6">

                <?php if ($product->get_regular_price()) { ?>

                    <p class="product-price__b"><?php echo $product->get_regular_price(); ?> ₽</p>

                <?php } ?>

            </div>
        </div>

        <div class="card__hidden">
            <div class="row">

                <?php if($product->get_attribute('razmer_ryby')) { ?>

                <div class="col-6">
                    <div class="card__text">
                        Размеры рыбы от
                    </div>
                </div>

                <div class="col-6">
                    <div class="card__text-b">
                        <?php echo $product->get_attribute('razmer_ryby'); ?>
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
                        <?php echo date("d.m.Y", (time() + 3600 * 24 * 2)); ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card__btns">
                        <a href="<?php echo $product->add_to_cart_url() ?>"
                           class="ajax_add_to_cart add_to_cart_button btn card__btn"
                           data-product_id="<?php echo get_the_ID(); ?>"
                           aria-label="в корзину">
                            В КОРЗИНУ
                        </a>

                        <a href="#" class="btn btn-white card__btn js-one-click">
                            Купить в 1 клик
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

echo '</div>'

?>


<!--<li --><?php //wc_product_class( '', $product ); ?><!--
	--><?php
//	/**
//	 * Hook: woocommerce_before_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_open - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item' );
//
//	/**
//	 * Hook: woocommerce_before_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_show_product_loop_sale_flash - 10
//	 * @hooked woocommerce_template_loop_product_thumbnail - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_product_title - 10
//	 */
//	do_action( 'woocommerce_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_rating - 5
//	 * @hooked woocommerce_template_loop_price - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_close - 5
//	 * @hooked woocommerce_template_loop_add_to_cart - 10
//	 */
//	do_action( 'woocommerce_after_shop_loop_item' );
//	?>
<!--</li>-->
