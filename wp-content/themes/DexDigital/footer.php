<footer class="footer">
    <div class="container">
        <div class="footer__nav footer-nav">
            <div class="footer-nav__logo">
                <?php the_custom_logo(); ?>
            </div>
            <div class="footer-nav__links">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'footer-nav__items',
                        'container'      => 'ul',
                    )
                );
                ?>
            </div>
        </div>
        <div class="footer__contacts">
            <?php if (have_rows('footer', 'options')) : ?>
                <?php while (have_rows('footer', 'options')) : the_row();
                    $footer_email = get_sub_field('footer_email');
                    $footer_address = get_sub_field('footer_address');
                ?>
                    <div class="footer__contact">
                        <a href="<?php echo esc_url($footer_email['url']); ?>"><?php echo esc_attr($footer_email['title']); ?></a>
                        <a href="<?php echo esc_url($footer_address['url']); ?>"><?php echo esc_attr($footer_address['title']); ?></a>
                    </div>
                    <div class="footer__social">
                        <?php if (have_rows('footer_social', 'options')) : ?>
                            <?php while (have_rows('footer_social', 'options')) : the_row();
                                $social_link = get_sub_field('social_link');
                            ?>
                                <a class="footer__icon" href="<?php echo esc_url($social_link['url']);  ?>"><?php the_sub_field('social_icon'); ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <div class="footer__copyrigth">
            Copyright © 2020 EssaysRescue
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>