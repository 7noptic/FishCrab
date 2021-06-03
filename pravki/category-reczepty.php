<?php
/**
 * The main template file
 *
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

$pageId = get_queried_object()->ID;
$categoryUrl = get_queried_object();

?>

<?php if (function_exists('kama_breadcrumbs')) {
    kama_breadcrumbs('');
} ?>

<?php
$categories = get_categories([
    'taxonomy' => 'category',
    'type' => 'post',
    'child_of' => 0,
    'parent' => '',
    'orderby' => 'ID',
    'order' => 'ASC',
    'hide_empty' => 1,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => 0,
    'pad_counts' => false,
    // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
]); ?>

    <section class="popular-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title popular-block__title"><?php single_cat_title(); ?></h1>
                </div>

                <?php if ($categories) { ?>

                    <div class="col-12">
                        <div class="tags">
                            <div class="swiper-tags">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide swiper-slide__wauto">
                                        <a href="/blog/"
                                           class="btn tags__link js-popular-link">Все публикации</a>
                                    </div>

                                    <?php foreach ($categories as $cat) { ?>

                                        <div class="swiper-slide swiper-slide__wauto">
                                            <a href="/<?php echo $cat->slug; ?>"
                                               class="btn tags__link js-popular-link <?php if ($categoryUrl->slug == $cat->slug) {
                                                   echo 'active';
                                               } ?>"><?php echo $cat->name; ?></a>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>


                <!-- filter  -->
                <div class="col-12 col-lg-4">
<!--                    <nav class="subregion__nav">-->
<!--                        <a href="#" class="subregion__link"><img src="img/arrright.svg" alt="">Рыба</a>-->
<!--                        <a href="#" class="subregion__link"><img src="img/arrright.svg" alt="">ФильтрФильтрФильтр</a>-->
<!--                        <a href="#" class="subregion__link"><img src="img/arrright.svg" alt="">ФильтрФильтр</a>-->
<!--                    </nav>-->
                </div>

                <!-- recipe list -->
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <?php if (have_posts()) : ?>

                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();
                                get_template_part('template-parts/content', ('recipe'));
                            endwhile; ?>

                        <?php endif; ?>

                    </div>
                </div>


                <div class="col-12">

                    <?php

                    $paged = 1;
                    if (get_query_var('paged')) {
                        $paged = get_query_var('paged');
                    } elseif (get_query_var('page')) {
                        $paged = get_query_var('page');
                    }


                    the_posts_pagination(array(
                        'end_size' => 2,
                        'prev_text' => __(''),
                        'next_text' => __(''),
                    ));

                    ?>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
