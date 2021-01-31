<?php get_header(); ?>
<section class="banner">
    <div class="container banner__container">
        <div class="content-container banner__container">
            <?php if (have_rows('banner')) : ?>
                <?php while (have_rows('banner')) : the_row();

                    // Get sub field values.
                    $link = get_sub_field('banner_btn');
                ?>
                    <div class="banner__upper-title"><?php the_sub_field('banner_upper_title'); ?></div>
                    <div class="banner__title"><?php the_sub_field('banner_title'); ?></div>
                    <div class="banner__description"><?php the_sub_field('banner_description'); ?></div>
                    <a class="btn banner__btn" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_attr($link['title']); ?></a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="pay-form" id="pay-form">
            <div class="pay-form__wrap">
                <div class="pay-form__title">
                    Lorem ipsum dolor sit amet, consectetur
                </div>
                <div class="pay-form__subtitle">
                    Lorem Ipsum - this text often "does"
                    used in printing and web design.
                </div>
                <form action="#" class="pay-form__form">
                    <select>
                        <option>Lorem Ipsum</option>
                        <option>Lorem Ipsum 2</option>
                    </select>
                    <div class="pay-form__wrap-select">
                        <select>
                            <option>Lorem Ipsum</option>
                            <option>Lorem Ipsum 2</option>
                        </select>
                        <select>
                            <option>Lorem Ipsum</option>
                            <option>Lorem Ipsum 2</option>
                        </select>
                    </div>
                    <div class="pay-form__price">$ 0.00</div>
                    <button class="btn pay-form__btn">Continue</button>
            </div>
            </form>
        </div>
    </div>
</section>
<section class="post">
    <div class="container">
        <div class="content-container post__content-container">
            <div class="post__items">
                <?php
                $allposts = '';

                $response = wp_remote_get('https://renemorozowich.com/wp-json/wp/v2/posts?per_page=2');
                $responseImg = wp_remote_get('https://renemorozowich.com/wp-json/wp/v2/media/');

                if (is_wp_error($response)) {
                    return;
                }

                $posts = json_decode(wp_remote_retrieve_body($response));
                $postsImg = json_decode(wp_remote_retrieve_body($responseImg));
                ?>
                <?php if (!empty($posts)) {
                    foreach ($posts as $post) {
                ?>
                        <div class="post__item">
                            <div class="post__img"><img src="<?php echo $postsImg[0]->guid->rendered ?>" alt="img"></div>
                            <div class="post__content">
                                <div class="post__title"><?php echo $post->title->rendered ?></div>
                                <div class="post__subtitle"><?php echo $post->title->rendered ?> </div>
                                <div class="post__text"><?php echo $post->excerpt->rendered ?></div>
                            </div>
                            <div class="post__bottom">
                                <a href="<?php echo $post->link ?>" class="btn post__btn">Read More</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="post__pagination">

            </div>
        </div>
    </div>
</section>
<section class="news">
    <div class="container">
        <div class="content-container news__content-container">
            <?php if (have_rows('news')) : ?>
                <?php while (have_rows('news')) : the_row();

                    // Get sub field values.
                    $image = get_sub_field('news_img');
                ?>
                    <div class="news__title">
                        <?php the_sub_field('news_title'); ?>
                    </div>
                    <div class="news__img">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                    <?php if (have_rows('news_content')) : ?>
                        <?php while (have_rows('news_content')) : the_row(); ?>
                            <div class="news__content"><?php the_sub_field('news_content_field'); ?></div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="quote">
    <div class="container">
        <div class="quote__content-container content-container">
            <div class="quote__content"><?php echo do_shortcode('[quote]'); ?></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>