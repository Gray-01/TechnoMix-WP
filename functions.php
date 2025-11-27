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

    // КОД ДЛЯ SIDEBAR MENU
$sidebar_js_path = get_template_directory() . '/assets/js/sidebar-menu.js';
wp_enqueue_script(
    'TechnoMix-sidebar-menu',
    get_template_directory_uri() . '/assets/js/sidebar-menu.js',
    array('TechnoMix-main'), // Зависит от main.js
    file_exists($sidebar_js_path) ? filemtime($sidebar_js_path) : null,
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

// Добавляем ACF поле для карусели
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_carousel_images',
        'title' => 'Изображения карусели',
        'fields' => array(
            array(
                'key' => 'field_carousel_images',
                'label' => 'Добавьте изображения для карусели',
                'name' => 'carousel_images',
                'type' => 'gallery',
                'instructions' => 'Максимально 20 изображений. Если добавлено больше - будут показаны только первые 20.',
                'required' => 0,
                'max' => 20,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'wrapper' => array(
                    'width' => '100%',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template', // Более конкретное условие
                    'operator' => '==',
                    'value' => 'template-main.php', // Укажите ваш шаблон
                ),
            ),
            array(
                array(
                    'param' => 'page', // Или для конкретной страницы
                    'operator' => '==',
                    'value' => '2', // ID главной страницы
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal', // normal, side, acf_after_title
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}

// Создаем Custom Post Type для карточек "О нас"
function create_about_cards_post_type() {
    register_post_type('about_cards',
        array(
            'labels' => array(
                'name' => 'Карточки О компании',
                'singular_name' => 'Карточка',
                'add_new' => 'Добавить карточку',
                'add_new_item' => 'Добавить новую карточку',
                'edit_item' => 'Редактировать карточку',
                'new_item' => 'Новая карточка',
                'view_item' => 'Просмотреть карточку',
                'search_items' => 'Поиск карточек',
                'not_found' => 'Карточки не найдены',
                'not_found_in_trash' => 'В корзине карточки не найдены'
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-id',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
            'publicly_queryable' => true, // Важно для single страниц
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'about-cards'),
        )
    );
}
add_action('init', 'create_about_cards_post_type');

// ACF поля для карточек - ТОЛЬКО ОДИН БЛОК!
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_about_cards',
        'title' => 'Настройки карточки',
        'fields' => array(
            array(
                'key' => 'field_card_button_text',
                'label' => 'Текст кнопки',
                'name' => 'card_button_text',
                'type' => 'text',
                'default_value' => 'Узнать больше',
                'required' => 1,
            ),
            array(
                'key' => 'field_card_gradient',
                'label' => 'Градиент обводки',
                'name' => 'card_gradient',
                'type' => 'select',
                'choices' => array(
                    'red_blue' => 'Красный-Синий',
                    'yellow_cyan' => 'Желтый-Голубой',
                    'purple_pink' => 'Фиолетовый-Розовый',
                ),
                'default_value' => 'red_blue',
                'required' => 1,
            ),
            array(
                'key' => 'field_card_preview_text',
                'label' => 'Текст превью (короткий)',
                'name' => 'card_preview_text',
                'type' => 'textarea',
                'instructions' => 'Короткий текст который будет отображаться на карточке',
                'required' => 1,
                'maxlength' => 200,
            ),
            array(
                'key' => 'field_card_full_description',
                'label' => 'Полное описание',
                'name' => 'card_full_description',
                'type' => 'wysiwyg',
                'instructions' => 'Полное описание которое будет отображаться на отдельной странице карточки',
                'required' => 0,
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'about_cards',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}