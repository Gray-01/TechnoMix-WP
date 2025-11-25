<?php
// Подключаем стили, скрипты и шрифты
function TechnoMix_enqueue_assets() {
    // === CSS ===
    wp_enqueue_style(
        'TechnoMix-reset',
        get_template_directory_uri() . '/assets/css/reset.css',
        array(),
        file_exists(get_template_directory() . '/assets/css/reset.css') ? filemtime(get_template_directory() . '/assets/css/reset.css') : null
    );

    wp_enqueue_style(
        'TechnoMix-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('TechnoMix-reset'),
        file_exists(get_template_directory() . '/assets/css/style.css') ? filemtime(get_template_directory() . '/assets/css/style.css') : null
    );

    wp_enqueue_style(
        'TechnoMix-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('TechnoMix-style'),
        file_exists(get_template_directory() . '/assets/css/responsive.css') ? filemtime(get_template_directory() . '/assets/css/responsive.css') : null
    );

    // === FONTS ===
    wp_enqueue_style(
        'TechnoMix-fonts',
        get_template_directory_uri() . '/assets/fonts/fonts.css',
        array(),
        file_exists(get_template_directory() . '/assets/fonts/fonts.css') ? filemtime(get_template_directory() . '/assets/fonts/fonts.css') : null
    );

    // main js
    $main_js_path = get_template_directory() . '/assets/js/main.js';
    wp_enqueue_script(
        'TechnoMix-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        file_exists($main_js_path) ? filemtime($main_js_path) : null,
        true
    );

    //CAROUSEL
$carousel_js_path = get_template_directory() . '/assets/js/carousel.js';
wp_enqueue_script(
    'TechnoMix-carousel',
    get_template_directory_uri() . '/assets/js/carousel.js',
    array('TechnoMix-main'), // Зависит от main.js
    file_exists($carousel_js_path) ? filemtime($carousel_js_path) : null,
    true
);

    // === Передаём путь темы в JS ===
    wp_localize_script(
        'TechnoMix-main',
        'TechnoMix_Data',
        array('templateUrl' => get_template_directory_uri())
    );
}
add_action('wp_enqueue_scripts', 'TechnoMix_enqueue_assets');

// Поддержка темы
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

// Разрешаем загрузку SVG файлов
function TechnoMix_allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'TechnoMix_allow_svg_upload');

// Исправляем MIME тип для SVG
function TechnoMix_fix_svg_mime_type($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    if ($filetype['ext'] === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'TechnoMix_fix_svg_mime_type', 10, 4);