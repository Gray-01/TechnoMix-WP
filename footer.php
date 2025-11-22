<footer class="footer">
    <div class="footer__container">
        <ul class="footer__social">
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/twitter.svg" alt="Twitter"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/youtube.svg" alt="YouTube"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.svg" alt="Facebook"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/whatsapp.svg" alt="WhatsApp"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone.svg" alt="Phone"></a></li>
        </ul>
        <p class="footer__copy">© <?php echo date('Y'); ?>. Все права защищены.</p>
    </div>

    <button class="scroll-to-top" id="scrollToTop" aria-label="Вернуться наверх">
        ↑
    </button>

</footer>

<?php wp_footer(); ?>
</body>
</html>