<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FishCrab
 */

?>

<div class="col-12 col-md-6 col-lg-12 col-xl-6" id="post-<?php the_ID(); ?>">
    <div class="news-item">
        <h2 class="news-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="news-item__header">
            <div class="news-item__author">Автор: <?php echo get_the_author(); ?></div>
            <div class="news-item__views"><?php echo getPostViews(get_the_ID()); ?></div>
            <div class="news-item__rating"><span>Рейтинг</span>
                <ul class="rating-star">
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="news-item__content">
            <?php the_post_thumbnail(array(672, 360, 1, 999999)); ?>
            <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="news-item__link"><span>ЧИТАТЬ</span>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrright.svg" alt="arrright icon"></a>
    </div>
</div>
