<?php
/**
 * Template Name: Личный кабинет
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

    <section class="sign">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title">Личный кабинет</h1>
                </div>
                <div class="col-12 col-md-6 sign__border">
                    <div class="sign__wrapper">
                        <h2 class="sign__title">Если вы ранее уже<br>регистрировались на сайте</h2>
                        <div class="news-form">

                            <?php wp_login_form(); ?>


                            <form action="POST">
                                <div class="news-form__wrapper form-block-form__wrapper">
                                    <span>
                                        <label for="your-login">Введите email или телефон без пробелов начиная с +7, пример: +79003001020</label> </span><span><input
                                                id="your-login" type="text" placeholder="Имя/Телефон"
                                                class="form-control form__input"> </span>
                                    <span><label for="yor-pass">Введите пароль</label> </span>
                                    <span><input id="yor-pass" type="password" placeholder="* * * * *"
                                                 class="form-control form__input"></span>
                                    <div class="modal-form__btns">
                                        <button type="submit" class="btn modal-form__btn">ВОЙТИ</button>
                                        <button type="button" class="btn btn-white modal-form__btn js-reset-pass">Забыли
                                            пароль
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="sign__wrapper">
                        <h2 class="sign__title">Если вы впервые на сайте<br>пройдите регистрацию</h2>
                        <div class="news-form">

<!--                            <form id="registerform" action="--><?php //site_url('wp-login.php?action=register'); ?><!--"-->
<!--                                  method="post">-->
<!--                                <p>-->
<!--                                    <label for="user_login">-->
<!--                                        Имя пользователя<br>-->
<!--                                        <input type="text" name="user_login" id="user_login" class="input" value=""-->
<!--                                               size="20" style="">-->
<!--                                    </label>-->
<!--                                </p>-->
<!--                                <p>-->
<!--                                    <label for="user_email">-->
<!--                                        E-mail<br>-->
<!--                                        <input type="email" name="user_email" id="user_email" class="input" value=""-->
<!--                                               size="25">-->
<!--                                    </label>-->
<!--                                </p>-->
<!---->
<!--                                <p id="reg_passmail">Подтверждение регистрации будет отправлено на ваш e-mail.</p>-->
<!---->
<!--                                <br class="clear">-->
<!--                                <input type="hidden" name="redirect_to" value="">-->
<!---->
<!--                                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit"-->
<!--                                                         class="button button-primary button-large" value="Регистрация">-->
<!--                                </p>-->
<!--                            </form>-->

                            <form name="registerform" id="registerform" action="http://fishcrabs.loc/wp-login.php?action=register" method="post" novalidate="novalidate" abineguid="CDCB98FDEF2241FB8B55845C84B76D82" pwmfilled="auto" pwmaccountid="DF00374E2B2C43A5B3B78534BEB15935">
                                <p>
                                    <label for="user_login">Имя пользователя</label>
                                    <input type="text" name="user_login" id="user_login" class="input" value="" size="20" autocapitalize="off" abineorigin="null" style="color: rgb(0, 0, 170); background-color: rgb(255, 255, 238);">
                                <div id="pwm-inline-icon-89176" class="pwm-field-icon" style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: -45px; margin-left: 248px;"><svg style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;" viewBox="0 0 64 64"><g><path d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z"></path><path d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z"></path></g></svg><span id="pwm-inline-icon-badge-89176" style="position: absolute !important; inset: auto auto 0px 7px !important; box-sizing: content-box !important; font-family: monospace !important; font-size: 9px !important; border-radius: 2px !important; color: white !important; background: rgb(112, 185, 52) !important; border: 0.5px solid white !important; width: auto !important; height: 10px !important; min-width: 10px !important; min-height: 0px !important; display: flex !important; align-items: center !important; justify-content: center !important; pointer-events: none !important;">2</span></div></p>
                                <p>
                                    <label for="user_email">Email</label>
                                    <input type="email" name="user_email" id="user_email" class="input" value="" size="25" abineorigin="null" style="color: rgb(0, 0, 170); background-color: rgb(255, 255, 238);">
                                <div id="pwm-inline-icon-66692" class="pwm-field-icon" style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: -45px; margin-left: 248px;"><svg style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;" viewBox="0 0 64 64"><g><path d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z"></path><path d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z"></path></g></svg><span id="pwm-inline-icon-badge-66692" style="position: absolute !important; inset: auto auto 0px 7px !important; box-sizing: content-box !important; font-family: monospace !important; font-size: 9px !important; border-radius: 2px !important; color: white !important; background: rgb(112, 185, 52) !important; border: 0.5px solid white !important; width: auto !important; height: 10px !important; min-width: 10px !important; min-height: 0px !important; display: flex !important; align-items: center !important; justify-content: center !important; pointer-events: none !important;">2</span></div></p>
                                <p id="reg_passmail">
                                    Подтверждение регистрации будет отправлено на ваш email.			</p>
                                <br class="clear">
                                <input type="hidden" name="redirect_to" value="">
                                <p class="submit">
                                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Регистрация">
                                </p>
                            </form>


                            <form id="registerform" action="<?php site_url('wp-login.php?action=register'); ?>"
                                  method="post">
                                <div class="news-form__wrapper form-block-form__wrapper">
                                    <span>
                                        <input type="text" placeholder="Имя" class="form-control form__input"
                                               type="text" name="user_login" id="user_login" size="20">
                                    </span>
                                    <span>
                                        <input type="email" placeholder="Email" class="form-control form__input"
                                               name="user_email" id="user_email" size="25">
                                    </span>

                                    <input type="hidden" name="redirect_to" value="">

                                    <span>
                                        <input type="submit" name="wp-submit" id="wp-submit"
                                               class="form-control btn news-form__btn" value="ЗАРЕГИСТРИРОВАТЬСЯ">

<!--                                        <button type="submit"-->
<!--                                                class="form-control btn news-form__btn">ЗАРЕГИСТРИРОВАТЬСЯ</button>-->
                                    </span>

                                    <p class="news-form__agreement">Я согласен с условиями предоставления услуг и
                                        обработкой моих персональных данных при нажатии "Зарегистрироваться"</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer();
