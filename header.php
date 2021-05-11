<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FishCrab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header class="header">
    <div class="container">
        <div class="row header__row">
            <div class="col-3 col-sm-4 d-flex align-items-center">
                <a href="#" class="header__city js-region d-none d-lg-flex">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/map.svg" alt=""
                         class="js-region">
                    <span class="js-region-city js-region">Москва </span>
                </a>
                <a href="#" class="header__burger js-modal-header">
                    <img class="js-modal-header"
                         src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/bur.svg" alt="">
                </a>
            </div>

            <div class="col-5 col-sm-4 col-lg-6 d-flex align-items-center js-adaptive-logo">
                <ul class="header__menu d-none d-lg-flex">

                    <?php

                    if ($menu_items = wp_get_nav_menu_items(37)) { // "Меню для шапки" - это название моего меню. Вы можете также использовать ID или ярлык
                        $menu_list = '';
                        foreach ((array)$menu_items as $key => $menu_item) {
                            $title = $menu_item->title; // заголовок элемента меню (анкор ссылки)
                            $url = $menu_item->url; // URL ссылки
                            $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
                        }
                        echo $menu_list;
                    }

                    ?>

                </ul>
            </div>

            <div class="col-4 col-lg-2 d-flex align-items-center">
                <div class="header__profile">
                    <!--                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/return.svg" alt=""> </a>-->
                    <a href="/wishlist/">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/like.svg"
                             alt="Избранное"></a>
                    <a href="/my-account/">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/user.svg"
                             alt="Аккаунт"></a>
                </div>
            </div>
        </div>
        <div class="row header__row d-none d-lg-flex" `>
            <div class="col-4 d-flex align-items-center">
                <a data-da=".js-adaptive-logo,991,1" href="/" class="logo">
                    <?php $custom_logo__url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
                    ?><img src="<?php echo $custom_logo__url[0]; ?>" alt="Logo"></a>
            </div>

            <div class="col-6 d-flex align-items-center">
                <ul class="header__hover">
                    <li><a href="#">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/coupon.svg"
                                 alt=""> <span>СКИДКИ</span>
                        </a>
                    </li>

                    <li><a href="#">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/pack.svg" alt="">
                            <span>Новинки</span>
                        </a>
                    </li>
                </ul>
                <div class="header__search">
                    <div class="btn header__search-img js-search">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/search.svg"
                             class="js-search" alt="">
                    </div>


                    <form role="search" method="get" class="searchform" id="headerSearchForm"
                          action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="form-wrapper-header">
                            <span>
                                <input type="text" value="" name="s" id="s" class="form-control">
                                <input type="hidden" value="product" name="post_type"/>
                            </span>
                            <span><button type="submit">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/search.svg"
                                         alt="search icon"></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">

                <a data-da=".header__profile,991,last" href="<?php echo esc_url(wc_get_cart_url()); ?>"
                   class="header__basket">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/b.svg" alt="">
                    <span><?php echo WC()->cart->get_cart_subtotal(); ?> (<?php echo WC()->cart->get_cart_contents_count(); ?>шт)</span>
                </a>

            </div>
        </div>
        <div class="row d-none d-lg-flex">
            <div class="col-12">
                <div data-da=".adaptive-menu,991,1" class="header-category">

                    <?php
                    $taxonomy = 'product_cat';
                    $orderby = 'name';
                    $show_count = 0;
                    $pad_counts = 0;
                    $hierarchical = 1;
                    $title = '';
                    $empty = 0;
                    $args = array(
                        'taxonomy' => $taxonomy,
                        'order' => 'DESC',
                        'orderby' => $orderby,
                        'show_count' => $show_count,
                        'pad_counts' => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li' => $title,
                        'hide_empty' => $empty
                    );
                    ?>


                    <ul class="header-category__hover">

                        <?php $all_categories = get_categories($args);
                        //print_r($all_categories);
                        foreach ($all_categories as $cat) {
                            //print_r($cat);
                            if ($cat->category_parent == 0) {
                                $category_id = $cat->term_id;

                                ?>

                                <li>
                                    <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>"
                                       class="btn btn-transparent header-category__btn"><span><?php echo $cat->name; ?></span></a>

                                    <?php
                                    $args2 = array(
                                        'taxonomy' => $taxonomy,
                                        'child_of' => 0,
                                        'parent' => $category_id,
                                        'orderby' => $orderby,
                                        'show_count' => $show_count,
                                        'pad_counts' => $pad_counts,
                                        'hierarchical' => $hierarchical,
                                        'title_li' => $title,
                                        'hide_empty' => $empty
                                    );
                                    $sub_cats = get_categories($args2);
                                    if ($sub_cats) { ?>

                                        <ul class="header-category__submenu">

                                            <?php foreach ($sub_cats as $key => $sub_category) { ?>

                                                <li id="<?php echo $key; ?>">
                                                    <a href="<?php echo $sub_category->slug; ?>"><?php echo $sub_category->name; ?></a>
                                                </li>

                                            <?php } ?>

                                            <?php if ($key >= 4) { ?>

                                                <li>
                                                    <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">Все
                                                        результаты</a></li>

                                            <?php } ?>

                                        </ul>

                                    <?php } ?>

                                </li>

                            <?php }
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <style>
        .woocommerce {
            display: block;
            padding: 0;
        }
        .basket-item__price {
            margin-bottom: 0;
        }
        .basket-item__name,
        .basket-item__price {
            display: flex !important;
            align-items: center !important;
        }
    </style>