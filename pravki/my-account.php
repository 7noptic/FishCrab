<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_navigation'); ?>


<div class="col-12 col-lg-9 tab js-user-content active">
    <div class="user-profile">

        <div class="user-profile__img">
            <?php echo get_avatar(get_current_user_id(), 60); ?>
        </div>

        <?php

        $customer_id = get_current_user_id();

        ?>

        <div class="user-profile__wrapper">
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="user-profile__text">ИМЯ</div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="user-profile__text-b"><?php echo get_user_meta($customer_id, 'billing_first_name', true); ?></div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="user-profile__text">Фамилия</div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="user-profile__text-b"><?php echo get_user_meta($customer_id, 'billing_last_name', true); ?></div>
                </div>
            </div>
            <div class="row user-profile__row">
                <div class="col-12 col-sm-3">
                    <div class="user-profile__text">Email</div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="user-profile__text-b"><?php echo get_user_meta($customer_id, 'billing_email', true); ?></div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="user-profile__text">Телефон</div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="user-profile__text-b"><?php echo get_user_meta($customer_id, 'billing_phone', true); ?></div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="user-profile__text">Адрес</div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="user-profile__text-b">
                        <?php echo get_user_meta($customer_id, 'billing_address_1', true); ?></div>
                </div>
                <div class="col-12"><a href="#" class="btn user-profile__btn js-personal-data">РЕДАКТИРОВАТЬ</a></div>
            </div>
        </div>
    </div>


    <!--    <div class="woocommerce-MyAccount-content">-->
    <!--        --><?php
    //        /**
    //         * My Account content.
    //         *
    //         * @since 2.6.0
    //         */
    //        do_action('woocommerce_account_content');
    //        ?>
    <!--    </div>-->
</div>

<div class="col-12 col-lg-9 tab js-user-content">
    <div class="user-order">
        <h3 class="user-order__title">Заказы: 3</h3>
        <div class="user-order__header">
            <div class="user-order__id">Заказ</div>
            <div class="user-order__status">Статус</div>
            <div class="user-order__goods">Товары</div>
            <div class="user-order__price">Итого</div>
            <div class="user-order__date">Дата</div>
        </div>

        <div class="user-order__table">

<!--            --><?php
//
//            $my_orders_columns = apply_filters(
//                'woocommerce_my_account_my_orders_columns',
//                array(
//                    'order-number' => esc_html__('Order', 'woocommerce'),
//                    'order-date' => esc_html__('Date', 'woocommerce'),
//                    'order-status' => esc_html__('Status', 'woocommerce'),
//                    'order-total' => esc_html__('Total', 'woocommerce'),
//                    'order-actions' => '&nbsp;',
//                )
//            );
//
//            $customer_orders = get_posts(
//                apply_filters(
//                    'woocommerce_my_account_my_orders_query',
//                    array(
//                        'numberposts' => $order_count,
//                        'meta_key' => '_customer_user',
//                        'meta_value' => get_current_user_id(),
//                        'post_type' => wc_get_order_types('view-orders'),
//                        'post_status' => array_keys(wc_get_order_statuses()),
//                    )
//                )
//            );
//
//            if ($customer_orders) : ?>
<!---->
<!--                <h2>--><?php //echo apply_filters('woocommerce_my_account_my_orders_title', esc_html__('Recent orders', 'woocommerce')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</h2>-->
<!---->
<!--                <table class="shop_table shop_table_responsive my_account_orders">-->
<!---->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        --><?php //foreach ($my_orders_columns as $column_id => $column_name) : ?>
<!--                            <th class="--><?php //echo esc_attr($column_id); ?><!--"><span-->
<!--                                        class="nobr">--><?php //echo esc_html($column_name); ?><!--</span></th>-->
<!--                        --><?php //endforeach; ?>
<!--                    </tr>-->
<!--                    </thead>-->
<!---->
<!--                    <tbody>-->
<!--                    --><?php
//                    foreach ($customer_orders as $customer_order) :
//                        $order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
//                        $item_count = $order->get_item_count();
//                        ?>
<!--                        <tr class="order">-->
<!--                            --><?php //foreach ($my_orders_columns as $column_id => $column_name) : ?>
<!--                                <td class="--><?php //echo esc_attr($column_id); ?><!--"-->
<!--                                    data-title="--><?php //echo esc_attr($column_name); ?><!--">-->
<!--                                    --><?php //if (has_action('woocommerce_my_account_my_orders_column_' . $column_id)) : ?>
<!--                                        --><?php //do_action('woocommerce_my_account_my_orders_column_' . $column_id, $order); ?>
<!---->
<!--                                    --><?php //elseif ('order-number' === $column_id) : ?>
<!--                                        <a href="--><?php //echo esc_url($order->get_view_order_url()); ?><!--">-->
<!--                                            --><?php //echo _x('#', 'hash before order number', 'woocommerce') . $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<!--                                        </a>-->
<!---->
<!--                                    --><?php //elseif ('order-date' === $column_id) : ?>
<!--                                        <time datetime="--><?php //echo esc_attr($order->get_date_created()->date('c')); ?><!--">--><?php //echo esc_html(wc_format_datetime($order->get_date_created())); ?><!--</time>-->
<!---->
<!--                                    --><?php //elseif ('order-status' === $column_id) : ?>
<!--                                        --><?php //echo esc_html(wc_get_order_status_name($order->get_status())); ?>
<!---->
<!--                                    --><?php //elseif ('order-total' === $column_id) : ?>
<!--                                        --><?php
//                                        /* translators: 1: formatted order total 2: total order items */
//                                        printf(_n('%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce'), $order->get_formatted_order_total(), $item_count); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
//                                        ?>
<!---->
<!--                                    --><?php //elseif ('order-actions' === $column_id) : ?>
<!--                                        --><?php
//                                        $actions = wc_get_account_orders_actions($order);
//
//                                        if (!empty($actions)) {
//                                            foreach ($actions as $key => $action) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
//                                                echo '<a href="' . esc_url($action['url']) . '" class="button ' . sanitize_html_class($key) . '">' . esc_html($action['name']) . '</a>';
//                                            }
//                                        }
//                                        ?>
<!--                                    --><?php //endif; ?>
<!--                                </td>-->
<!--                            --><?php //endforeach; ?>
<!--                        </tr>-->
<!--                    --><?php //endforeach; ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            --><?php //endif; ?>


            <div class="user-order__item">
                <div class="user-order__id">#1221</div>
                <div class="user-order__status">Новый</div>
                <div class="user-order__goods">
                    <a href="#">Лангустины С/Г L1 (10-20) 2 кг (2 кг) (x1)</a>   
                    <a href="#">Лангустины С/Г L1 (10-20) 2 кг (2 кг) (x1)</a>   
                    <a href="#">Лангустины С/Г L1 (10-20) 2 кг (2 кг) (x1)</a>   
                    <a href="#">Лангустины С/Г L1 (10-20) 2 кг (2 кг) (x1)</a>   
                </div>
                <div class="user-order__price">1050 ₽</div>
                <div class="user-order__date">1 марта 2021</div>
            </div>

        </div>
    </div>
</div>

<div class="col-12 col-lg-9 tab js-user-content">
    <div class="user-programm">
        <h3 class="user-programm__title">Ваш текущий бонус: +0</h3>
        <div class="user-programm__header">
            <div class="user-programm__date">Дата</div>
            <div class="user-programm__id">#</div>
            <div class="user-programm__plus">Приход</div>
            <div class="user-programm__minus">Расход</div>
            <div class="user-programm__balance">Баланс</div>
        </div>
        <div class="user-programm__table">
            <div class="user-programm__item">
                <div class="user-programm__date">1 марта 2021</div>
                <div class="user-programm__id">#1221</div>
                <div class="user-programm__plus">25000 ₽</div>
                <div class="user-programm__minus">1566 ₽</div>
                <div class="user-programm__balance">2323 ₽</div>
            </div>
        </div>
    </div>
</div>
