<footer class="footer <?php echo esc_attr(get_field('footer_background', 'option') ?: 'default'); ?>">
    <div class="footer__container">
        <?php
        $social_icons = get_field('social_icons', 'option');
        if ($social_icons) :
        ?>
        <ul class="footer__social">
            <?php foreach ($social_icons as $icon) : ?>
            <li>
                <a href="<?php echo esc_url($icon['social_link']); ?>" target="_blank">
                    <img src="<?php echo esc_url($icon['social_icon']); ?>" alt="<?php echo esc_attr($icon['social_alt']); ?>">
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
        <!-- Fallback - статические иконки -->
        <ul class="footer__social">
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/twitter.svg" alt="Twitter"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/youtube.svg" alt="YouTube"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.svg" alt="Facebook"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/whatsapp.svg" alt="WhatsApp"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone.svg" alt="Phone"></a></li>
        </ul>
        <?php endif; ?>

        <?php
        $copyright_text = get_field('copyright_text', 'option');
        if ($copyright_text) {
            $copyright_text = str_replace('{year}', date('Y'), $copyright_text);
            echo '<p class="footer__copy">' . esc_html($copyright_text) . '</p>';
        } else {
            echo '<p class="footer__copy">© ' . date('Y') . '. Все права защищены.</p>';
        }
        ?>
    </div>
</footer>

<?php
// Кнопка "Наверх" ДОЛЖНА БЫТЬ ВНЕ ФУТЕРА
$button_color = get_field('scroll_button_color', 'option') ?: '#667eea';
$button_hover = get_field('scroll_button_hover', 'option') ?: '#764ba2';
?>
<button class="scroll-to-top" id="scrollToTop" aria-label="Вернуться наверх"
        data-color="<?php echo esc_attr($button_color); ?>"
        data-hover="<?php echo esc_attr($button_hover); ?>">
    ↑
</button>

<?php wp_footer(); ?>
</body>
</html>