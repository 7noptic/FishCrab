<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FishCrab
 */

global $product;

?>

<?php get_template_part('template-parts/sections/form-block'); ?>

</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row footer__row">
                    <div class="col-12 col-md-6"><a href="/" class="logo">
                            <?php $custom_logo__url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
                            ?><img src="<?php echo $custom_logo__url[0]; ?>" alt="Logo">
                        </a>
                    </div>


                    <?php if (have_rows('socz_seti_footer', 'option')): ?>

                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="footer__socials"><span>Мы в соцсетях:</span>

                                <?php while (have_rows('socz_seti_footer', 'option')): the_row();

                                    // переменные
                                    $image = get_sub_field('ikonka');
                                    $link = get_sub_field('ssylka');

                                    ?>

                                    <?php if ($link): ?>
                                        <a href="<?php echo $link; ?>" target="_blank">
                                    <?php endif; ?>

                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"/>

                                    <?php if ($link): ?>
                                        </a>
                                    <?php endif; ?>

                                <?php endwhile; ?>

                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
            <div class="col-12">
                <div class="row footer__row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <h2 class="footer__title">О компании</h2>

                        <ul class="footer__nav">

                            <?php

                            if ($menu_items = wp_get_nav_menu_items(38)) { // "Меню для шапки" - это название моего меню. Вы можете также использовать ID или ярлык
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
                    <div class="col-12 col-sm-6 col-lg-3">
                        <h2 class="footer__title">КАТЕГОРИИ</h2>
                        <ul class="footer__nav">

                            <?php

                            if ($menu_items = wp_get_nav_menu_items(39)) { // "Меню для шапки" - это название моего меню. Вы можете также использовать ID или ярлык
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

                    <div class="col-12 col-sm-6 col-lg-3">
                        <h2 class="footer__title">Контакты</h2>
                        <p class="footer__text">Наш E-mail:</p>
                        <a href="mailto:<?php the_field('e-mail', 'option'); ?>"
                           class="footer__text-b"><?php the_field('e-mail', 'option'); ?></a>
                        <p class="footer__text">Наш адрес:</p>
                        <p class="footer__text-b"><?php the_field('adres_podval', 'option'); ?></p>
                        <p class="footer__text">Режим работы:</p>
                        <p class="footer__text-b"><?php the_field('vremya_raboty_footer', 'option'); ?></p>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <h3 class="footer__subtitle">Круглосуточная поддержка</h3>
                        <a href="tel:+<?php the_field('kruglosutochnaya_podderzhka_ssylka', 'option'); ?>"
                           class="footer__tel"><?php the_field('kruglosutochnaya_podderzhka_tekst', 'option'); ?></a>
                        <a href="#" class="btn footer__btn js-call">ЗАКАЗАТЬ ЗВОНОК</a>
                        <p class="footer__text"><?php the_field('ip', 'option'); ?><br>
                            ОГРНИП: <?php the_field('ogrnip', 'option'); ?><br>
                            ИНН: <?php the_field('inn', 'option'); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row footer__copy">
                    <div class="col-12 col-md-3">
                        <p class="footer__text">&copy; <?php echo date('Y'); ?>
                            <?php the_field('kopirajt', 'option'); ?></p>
                    </div>
                    <div class="col-12 col-md-6">

                        <ul class="footer__submenu">

                            <?php

                            if ($menu_items = wp_get_nav_menu_items(40)) { // "Меню для шапки" - это название моего меню. Вы можете также использовать ID или ярлык
                                $menu_list = '';
                                foreach ((array)$menu_items as $key => $menu_item) {
                                    $title = $menu_item->title; // заголовок элемента меню (анкор ссылки)
                                    $url = $menu_item->url; // URL ссылки
                                    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
                                }
                                echo $menu_list;
                            }

                            ?>

                            <li><a href="#" class="js-subscribe">Подписка</a></li>
                        </ul>

                    </div>
                    <div class="col-12 col-md-3 d-flex align-items-center">
                        <a href="#" target="_blank" class="footer__link">
                            <svg width="135" height="18" viewBox="0 0 135 18" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.2314 11.4752H27.8376L26.9994 13.5002H24.7551L28.9732 4.05018H31.1363L35.3679 13.5002H33.0696L32.2314 11.4752ZM31.5419 9.81468L30.0412 6.19668L28.5406 9.81468H31.5419Z"
                                      fill="black"/>
                                <path d="M42.3795 13.5002L40.5543 10.8677H40.4462H38.5399V13.5002H36.3498V4.05018H40.4462C41.2844 4.05018 42.0099 4.18968 42.6228 4.46868C43.2447 4.74768 43.7224 5.14368 44.0559 5.65668C44.3894 6.16968 44.5561 6.77718 44.5561 7.47918C44.5561 8.18118 44.3849 8.78868 44.0424 9.30168C43.7089 9.80568 43.2312 10.1927 42.6093 10.4627L44.7319 13.5002H42.3795ZM42.3389 7.47918C42.3389 6.94818 42.1677 6.54318 41.8252 6.26418C41.4827 5.97618 40.9825 5.83218 40.3245 5.83218H38.5399V9.12618H40.3245C40.9825 9.12618 41.4827 8.98218 41.8252 8.69418C42.1677 8.40618 42.3389 8.00118 42.3389 7.47918Z"
                                      fill="black"/>
                                <path d="M48.1197 5.83218H45.0913V4.05018H53.3382V5.83218H50.3098V13.5002H48.1197V5.83218Z"
                                      fill="black"/>
                                <path d="M61.8442 11.7452V13.5002H54.5166V4.05018H61.6684V5.80518H56.6932V7.85718H61.0871V9.55818H56.6932V11.7452H61.8442Z"
                                      fill="black"/>
                                <path d="M72.1987 13.5002L72.1852 7.83018L69.4002 12.5012H68.4133L65.6418 7.95168V13.5002H63.5868V4.05018H65.3984L68.9405 9.92268L72.4285 4.05018H74.2266L74.2537 13.5002H72.1987Z"
                                      fill="black"/>
                                <path d="M84.9108 13.6622C83.9284 13.6622 83.0406 13.4507 82.2475 13.0277C81.4634 12.6047 80.846 12.0242 80.3953 11.2862C79.9537 10.5392 79.7329 9.70218 79.7329 8.77518C79.7329 7.84818 79.9537 7.01568 80.3953 6.27768C80.846 5.53068 81.4634 4.94568 82.2475 4.52268C83.0406 4.09968 83.9284 3.88818 84.9108 3.88818C85.8933 3.88818 86.7765 4.09968 87.5607 4.52268C88.3448 4.94568 88.9622 5.53068 89.4128 6.27768C89.8635 7.01568 90.0888 7.84818 90.0888 8.77518C90.0888 9.70218 89.8635 10.5392 89.4128 11.2862C88.9622 12.0242 88.3448 12.6047 87.5607 13.0277C86.7765 13.4507 85.8933 13.6622 84.9108 13.6622ZM84.9108 11.7992C85.4697 11.7992 85.9744 11.6732 86.425 11.4212C86.8757 11.1602 87.2272 10.8002 87.4795 10.3412C87.7409 9.88218 87.8716 9.36018 87.8716 8.77518C87.8716 8.19018 87.7409 7.66818 87.4795 7.20918C87.2272 6.75018 86.8757 6.39468 86.425 6.14268C85.9744 5.88168 85.4697 5.75118 84.9108 5.75118C84.352 5.75118 83.8473 5.88168 83.3967 6.14268C82.946 6.39468 82.59 6.75018 82.3286 7.20918C82.0763 7.66818 81.9501 8.19018 81.9501 8.77518C81.9501 9.36018 82.0763 9.88218 82.3286 10.3412C82.59 10.8002 82.946 11.1602 83.3967 11.4212C83.8473 11.6732 84.352 11.7992 84.9108 11.7992Z"
                                      fill="black"/>
                                <path d="M95.8312 4.05018C96.6694 4.05018 97.395 4.18968 98.0079 4.46868C98.6297 4.74768 99.1074 5.14368 99.4409 5.65668C99.7744 6.16968 99.9411 6.77718 99.9411 7.47918C99.9411 8.17218 99.7744 8.77968 99.4409 9.30168C99.1074 9.81468 98.6297 10.2107 98.0079 10.4897C97.395 10.7597 96.6694 10.8947 95.8312 10.8947H93.925V13.5002H91.7348V4.05018H95.8312ZM95.7095 9.11268C96.3675 9.11268 96.8677 8.97318 97.2102 8.69418C97.5527 8.40618 97.7239 8.00118 97.7239 7.47918C97.7239 6.94818 97.5527 6.54318 97.2102 6.26418C96.8677 5.97618 96.3675 5.83218 95.7095 5.83218H93.925V9.11268H95.7095Z"
                                      fill="black"/>
                                <path d="M107.262 11.4752H102.868L102.03 13.5002H99.7857L104.004 4.05018H106.167L110.398 13.5002H108.1L107.262 11.4752ZM106.572 9.81468L105.072 6.19668L103.571 9.81468H106.572Z"
                                      fill="black"/>
                                <path d="M117.41 13.5002L115.585 10.8677H115.477H113.57V13.5002H111.38V4.05018H115.477C116.315 4.05018 117.04 4.18968 117.653 4.46868C118.275 4.74768 118.753 5.14368 119.086 5.65668C119.42 6.16968 119.587 6.77718 119.587 7.47918C119.587 8.18118 119.415 8.78868 119.073 9.30168C118.739 9.80568 118.262 10.1927 117.64 10.4627L119.762 13.5002H117.41ZM117.369 7.47918C117.369 6.94818 117.198 6.54318 116.856 6.26418C116.513 5.97618 116.013 5.83218 115.355 5.83218H113.57V9.12618H115.355C116.013 9.12618 116.513 8.98218 116.856 8.69418C117.198 8.40618 117.369 8.00118 117.369 7.47918Z"
                                      fill="black"/>
                                <path d="M121.322 4.05018H123.512V13.5002H121.322V4.05018Z" fill="black"/>
                                <path d="M134.437 4.05018V13.5002H132.639L127.921 7.76268V13.5002H125.758V4.05018H127.57L132.274 9.78768V4.05018H134.437Z"
                                      fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.01299 16.4483C13.1325 16.4483 16.472 13.1136 16.472 9C16.472 4.88643 13.1325 1.55172 9.01299 1.55172C4.89349 1.55172 1.55396 4.88643 1.55396 9C1.55396 13.1136 4.89349 16.4483 9.01299 16.4483ZM9.01299 18C13.9907 18 18.026 13.9706 18.026 9C18.026 4.02944 13.9907 0 9.01299 0C4.03525 0 0 4.02944 0 9C0 13.9706 4.03525 18 9.01299 18Z"
                                      fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.01291 0.931201L4.70643 9.54327H13.3194L9.01291 0.931201ZM9.01291 4.40469L7.21929 7.99155H10.8065L9.01291 4.40469Z"
                                      fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.87075 11.9483H14.1549L15.3021 14.2392L13.9122 14.9332L13.1945 13.5H4.83115L4.11353 14.9332L2.72362 14.2392L3.87075 11.9483Z"
                                      fill="black"/>
                            </svg>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- MODAL -->

<aside class="js-sidebars">
    <section class="modal adaptive-menu"><a href="#" class="modal__exit-2">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                 class="adaptive-menu__exit"></a>
    </section>


    <section class="modal modal-region">
        <div class="modal__wrapper modal-region__wrapper">
            <h2 class="modal__title modal-region__title">Выбрать район</h2>
            <div class="modal-region__row">
                <p class="modal-region__city">Ваш город: <span
                            class="js-select-city"><?php the_field('glavnyj_gorod', 'option'); ?></span>?</p>
                <a href="#" class="btn modal-region__btn js-region-close">да</a>
            </div>

            <?php if (get_field('spisok_gorodov', 'option')): ?>
                <ul class="modal-region__list">

                    <?php while (has_sub_field('spisok_gorodov', 'option')): ?>
                        <li><a href="#" class="modal-region__link"><?php the_sub_field('nazvanie_goroda'); ?></a></li>
                    <?php endwhile; ?>

                </ul>
            <?php endif; ?>
            
            <a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-region__exit"></a>
        </div>
    </section>


    <section class="modal modal-call">
        <div class="modal__wrapper modal-call__wrapper">
            <h3 class="modal__title modal-call__title">Заказать звонок</h3>
            <h4 class="modal__subtitle">Заполните форму и мы Вам перезвоним</h4>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><input type="text" class="form-control form__input"
                                                                  placeholder="Имя"> </span><span><input type="tel"
                                                                                                         class="form-control form__input"
                                                                                                         placeholder="Телефон"> </span><span><button
                                    type="submit" class="btn modal-form__btn">заказать звонок</button></span></div>
                    <div class="modal-form__agreement">Я согласен условиями предоставления услуг и обработкой моих
                        персональных данных при нажатии “Заказать звонок”
                    </div>
                </form>
            </div>
            <a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-call__exit"></a>
        </div>
    </section>


    <section class="modal modal-one-click">
        <div class="modal__wrapper modal-one-click__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg"
                        alt=""
                        class="modal-one-click__exit"></a>
            <h3 class="modal__title modal-one-click__title">Купить в 1 клик</h3>
            <h4 class="modal__subtitle">Заполните форму и мы Вам перезвоним</h4>
            <div class="modal-one-click__item">
                <div class="row">
                    <div class="col-4">
                        <div class="modal-one-click__img"><img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/card2.jpg"
                                    alt=""></div>
                    </div>
                    <div class="col-8"><a href="#" class="modal-one-click__name">Семга свежемороженая Премиум
                            чилийская</a>
                        <div class="row">
                            <div class="col-5">
                                <div class="card__text">Цена за 1 кг</div>
                            </div>
                            <div class="col-7">
                                <p class="card__price-b">1230 ₽</p>
                                <p class="card__price">1050 ₽</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><input type="tel" class="form-control form__input"
                                                                  placeholder="Телефон"> </span><span><button
                                    type="submit" class="btn modal-form__btn">КУПИТЬ</button></span></div>
                    <div class="modal-form__agreement">Я согласен условиями предоставления услуг и обработкой моих
                        персональных данных при нажатии “Заказать звонок”
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="modal modal-subscribe">
        <div class="modal__wrapper modal-subscribe__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg"
                        alt=""
                        class="modal-subscribe__exit"></a>
            <h3 class="modal__title modal-subscribe__title">Подпишись на свежие<br>статьи и новости</h3>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><input type="text" class="form-control form__input"
                                                                  placeholder="Имя"> </span><span><input type="tel"
                                                                                                         class="form-control form__input"
                                                                                                         placeholder="Email"> </span><span><button
                                    type="submit" class="btn modal-form__btn">подписаться</button></span></div>
                    <div class="modal-form__agreement">Я согласен условиями предоставления услуг и обработкой моих
                        персональных данных при нажатии “Подписаться”
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="modal modal-quest">
        <div class="modal__wrapper modal-quest__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-quest__exit"></a>
            <h3 class="modal__title">Уважаемые посетители</h3>
            <h4 class="modal__subtitle">Если у Вас еще остались вопросы, можете<br>задать их через форму обратной связи.<br>Мы
                ответим на указанный e-mail.</h4>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><input type="text" class="form-control form__input"
                                                                  placeholder="Имя"> </span><span><input type="tel"
                                                                                                         class="form-control form__input"
                                                                                                         placeholder="Телефон"> </span><span><input
                                    type="email" class="form-control form__input"
                                    placeholder="Email"> </span><span><textarea name="your-faq"
                                                                                class="form-control form__textarea"
                                                                                id="your-faq" cols="30" rows="10"
                                                                                placeholder="Ваш вопрос"></textarea> </span><span><button
                                    type="submit" class="btn modal-form__btn">ОТПРАВИТЬ ВОПРОС</button></span></div>
                    <div class="modal-form__agreement">Я согласен условиями предоставления услуг и обработкой моих
                        персональных данных при нажатии “Отправить”
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="modal modal-job">
        <div class="modal__wrapper modal-job__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-job__exit"></a>
            <h3 class="modal__title">Откликнутся на вакансию</h3>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><input type="text" class="form-control form__input"
                                                                  placeholder="Имя"> </span><span><input type="tel"
                                                                                                         class="form-control form__input"
                                                                                                         placeholder="Телефон"> </span><span><textarea
                                    name="your-resume-2" class="form-control form__textarea" cols="30" rows="10"
                                    placeholder="Ваш вопрос"></textarea> </span><span><label for="your-resume"
                                                                                             class="btn btn-border-dashed modal-form__btn">Загрузить резюме</label> <input
                                    type="file" class="form-control d-none" id="your-resume"> </span><span><button
                                    type="submit" class="btn modal-form__btn">ОТПРАВИТЬ РЕЗЮМЕ</button></span></div>
                    <div class="modal-form__agreement">Я согласен условиями предоставления услуг и обработкой моих
                        персональных данных при нажатии “Отправить”
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="modal modal-personal">
        <div class="modal__wrapper modal-personal__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg"
                        alt=""
                        class="modal-personal__exit"></a>
            <h3 class="modal__title">Персональные данные</h3>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><input type="text" class="form-control form__input"
                                                                  placeholder="Имя"> </span><span><input type="text"
                                                                                                         class="form-control form__input"
                                                                                                         placeholder="Фамилия"> </span><span><input
                                    type="text" class="form-control form__input"
                                    placeholder="Отчество"> </span><span><input type="tel"
                                                                                class="form-control form__input"
                                                                                placeholder="Телефон"> </span><span><input
                                    type="email" class="form-control form__input"
                                    placeholder="Email"> </span><span><input type="text"
                                                                             class="form-control form__input"
                                                                             placeholder="Адрес"></span>
                        <div class="modal-form__btns">
                            <button type="submit" class="btn modal-form__btn">ИЗМЕНИТЬ</button>
                            <button type="reset" class="btn btn-white modal-form__btn modal-personal__exit">Отмена
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="modal modal-reset-pass">
        <div class="modal__wrapper modal-personal__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg"
                        alt=""
                        class="modal-reset-pass__exit"></a>
            <h3 class="modal__title">Восстановление пароля</h3>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper"><span><label for="your-reset-pass">Если вы забыли пароль, введите E-Mail. Ссылка для смены пароля будет выслана вам по E-Mail.</label> </span><span><input
                                    id="your-reset-pass" type="email" class="form-control form__input"
                                    placeholder="Email"> </span><span><button type="submit"
                                                                              class="form-control modal-form__btn btn">ВОСТАНОВИТЬ ПАРОЛЬ</button></span>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="modal modal-basket">
        <div class="modal__wrapper modal-basket__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-basket__exit"></a>
            <h3 class="modal__title">Персональные данные</h3>
            <div class="modal-form">
                <form action="POST">
                    <div class="modal-form__wrapper">
                        <div class="modal-basket__item">
                            <div class="row">
                                <div class="col-4">
                                    <div class="modal-one-click__img"><img
                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/card2.jpg"
                                                alt=""></div>
                                </div>
                                <div class="col-8"><a href="#" class="modal-one-click__name">Семга свежемороженая
                                        Премиум чилийская</a>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="card__text">Цена за 1 кг</div>
                                        </div>
                                        <div class="col-7">
                                            <p class="card__price-b">1230 ₽</p>
                                            <p class="card__price js-modal-basket-price">1050 ₽</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-basket__item">
                            <div class="row">
                                <div class="col-4">
                                    <div class="modal-one-click__img"><img
                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/card2.jpg"
                                                alt=""></div>
                                </div>
                                <div class="col-8"><a href="#" class="modal-one-click__name">Семга свежемороженая
                                        Премиум чилийская</a>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="card__text">Цена за 1 кг</div>
                                        </div>
                                        <div class="col-7">
                                            <p class="card__price-b">1230 ₽</p>
                                            <p class="card__price js-modal-basket-price">1050 ₽</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-basket__item">
                            <div class="row">
                                <div class="col-4">
                                    <div class="modal-one-click__img"><img
                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/card2.jpg"
                                                alt=""></div>
                                </div>
                                <div class="col-8"><a href="#" class="modal-one-click__name">Семга свежемороженая
                                        Премиум чилийская</a>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="card__text">Цена за 1 кг</div>
                                        </div>
                                        <div class="col-7">
                                            <p class="card__price-b">1230 ₽</p>
                                            <p class="card__price js-modal-basket-price">1050 ₽</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="modal-basket__text">ИТОГО</div>
                            </div>
                            <div class="col-4">
                                <div class="modal-basket__price">3150 ₽</div>
                            </div>
                        </div>
                        <span><button type="submit" class="btn modal-form__btn">ОФОРМИТЬ ЗАКАЗ</button></span>
                    </div>
                </form>
            </div>
        </div>
    </section>

</aside><!-- !MODAL -->
<aside class="push">
    <div class="push-item js-push-add-basket">
        Товар успешно добавлен в корзину!
    </div>
    <div class="push-item js-push-add-favorites">
        Товара нет в наличии. Товар не может быть добавлен в корзину
    </div>
</aside>


<?php wp_footer(); ?>


<script>
    jQuery(function ($) {
        //adding to favorite
        jQuery('body').on('click', '.add-favorite', function () {
            var post_id = jQuery(this).data('post_id');
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'POST',
                data: {
                    'action': 'favorite',
                    'post_id': post_id,
                },
                success: function (data) {
                    jQuery('.fv_' + post_id).html('<div class="in-favorite" title="В избранном"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/heart-active.svg"></div>');
                    jQuery('.num-favorite').html(data);
                },
            });
        });
        //deleting from favorite
        jQuery('body').on('click', '.delete-favorite', function () {
            var post_id = jQuery(this).data('post_id');
            jQuery(this).parents('.col-12.col-md-6.col-lg-4.col-xl-3').remove();
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'POST',
                data: {
                    'action': 'delfavorite',
                    'post_id': post_id,
                },
                success: function (data) {
                    jQuery('.fv_' + post_id).html('Deleted');
                    jQuery('.num-favorite').html(data);
                },
            });
        });
    });
    
    // jQuery('.widget.woocommerce').addClass('active');
    // jQuery('.woocommerce-widget-layered-nav-list').addClass('active');

</script>


<style>
    .sign .woocommerce {
        display: flex;
        flex: 0 0 100%;
        max-width: 100%;
    }
</style>


</body>
</html>
