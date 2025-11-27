<?php get_header(); ?>

  <header class="header">

<!-- Бургер-меню -->
<nav class="burger-menu" id="burgerMenu" style="background-color: <?php echo get_field('burger_menu_bg_color') ?: '#fff'; ?>;">
    <ul class="burger-menu__list">
        <?php
        $text_color = get_field('burger_menu_text_color') ?: '#333';
        $hover_bg_color = get_field('burger_menu_hover_bg_color') ?: '#FF9500';
        $hover_text_color = get_field('burger_menu_hover_text_color') ?: '#fff';

        // Сначала показываем кастомные пункты из ACF
        if (have_rows('burger_menu_items')) :
            while (have_rows('burger_menu_items')) : the_row();
                $icon = get_sub_field('menu_icon');
                $text = get_sub_field('menu_text');
                $link = get_sub_field('menu_link');

                // Показываем только если заполнены иконка и текст
                if ($icon && $text) :
        ?>
        <li class="burger-menu__item">
            <a href="<?php echo esc_url($link ?: '#'); ?>"
               style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <?php if ($icon): ?>
                    <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($text)); ?>">
                <?php endif; ?>
                <?php echo apply_filters('the_content', $text); ?>
            </a>
        </li>
        <?php
                endif;
            endwhile;
        endif;

        // Затем показываем статическое меню (только если нет кастомных пунктов)
        if (!have_rows('burger_menu_items') || count(get_field('burger_menu_items')) === 0) :
        ?>
        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/orders.svg" alt="Заказы">
                Заказы
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/messages.svg" alt="Переписка с продавцами">
                Переписка с продавцами
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/cart.svg" alt="Корзина">
                Корзина
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/heart.svg" alt="Список желаний">
                Список желаний
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/history.svg" alt="Просмотренные товары">
                Просмотренные товары
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/reviews.svg" alt="Отзывы">
                Отзывы
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/parcel.svg" alt="Посылки">
                Посылки
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/wallet.svg" alt="Кошелёк">
                Кошелёк
            </a>
        </li>

        <li class="burger-menu__item">
            <a href="#" style="color: <?php echo esc_attr($text_color); ?>;"
               data-text-color="<?php echo esc_attr($text_color); ?>"
               data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
               data-hover-text="<?php echo esc_attr($hover_text_color); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/subscribe.svg" alt="Подписки">
                Подписки
            </a>
        </li>
        <?php endif; ?>
    </ul>
</nav>

    <div class="overlay" id="overlay"></div>

    <div class="container header__inner">

      <button class="header__burger" id="burgerBtn" aria-label="Открыть меню">
        <span></span>
        <span></span>
        <span></span>
      </button>

<div class="header__logo">
    <a href="<?php echo esc_url(home_url('/')); ?>"
       style="color: <?php echo esc_attr(get_field('logo_color') ?: '#333'); ?>;
              font-size: <?php echo esc_attr((get_field('logo_font_size_new') ?: '22') . 'px'); ?>;
              font-weight: <?php echo esc_attr((int)get_field('logo_font_weight') ?: '700'); ?>;">
        <?php echo esc_html(get_field('logo_text') ?: 'TechnoMix'); ?>
    </a>
</div>

      <form class="header__search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
        <input type="text" class="header__input" placeholder="Что вы ищете?" name="s" value="<?php echo get_search_query(); ?>">
        <button type="submit" class="header__search-btn" aria-label="Найти"></button>
      </form>

      <div class="header__cart">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/cart.svg" alt="Корзина">
        <span class="header__cart-count">0</span>
      </div>

    </div>
  </header>

  <main class="main">
    <div class="main__wrapper">
      <section class="catalog-section">

        <aside class="sidebar">
    <nav class="sidebar__nav">
        <ul class="sidebar__menu">
            <?php
            // Получаем цвета из ACF
            $text_color = get_field('sidebar_menu_text_color') ?: '#333';
            $hover_bg_color = get_field('sidebar_menu_hover_bg_color') ?: '#f8f8f8';
            $hover_text_color = get_field('sidebar_menu_hover_text_color') ?: '#FF9500';
            $hover_icon_color = get_field('sidebar_menu_hover_icon_color') ?: '#FF9500';

            // Динамические пункты меню из ACF
            if (have_rows('sidebar_menu_items')) :
                while (have_rows('sidebar_menu_items')) : the_row();
                    $icon = get_sub_field('sidebar_menu_icon');
                    $text = get_sub_field('sidebar_menu_text');
                    $link = get_sub_field('sidebar_menu_link');

                    // Показываем только если заполнены иконка и текст
                    if ($icon && $text) :
            ?>
            <li class="sidebar__item">
                <a href="<?php echo esc_url($link ?: '#'); ?>" class="sidebar__link"
                   style="color: <?php echo esc_attr($text_color); ?>;"
                   data-text-color="<?php echo esc_attr($text_color); ?>"
                   data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
                   data-hover-text="<?php echo esc_attr($hover_text_color); ?>"
                   data-hover-icon="<?php echo esc_attr($hover_icon_color); ?>">
                    <div class="sidebar__icon">
                        <?php if ($icon): ?>
                            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($text)); ?>">
                        <?php endif; ?>
                    </div>
                    <span class="sidebar__text"><?php echo apply_filters('the_content', $text); ?></span>
                </a>
            </li>
            <?php
                    endif;
                endwhile;
            else :
                // Fallback - статическое меню если ACF не настроено
            ?>
            <li class="sidebar__item">
                <a href="#" class="sidebar__link" style="color: <?php echo esc_attr($text_color); ?>;"
                   data-text-color="<?php echo esc_attr($text_color); ?>"
                   data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
                   data-hover-text="<?php echo esc_attr($hover_text_color); ?>"
                   data-hover-icon="<?php echo esc_attr($hover_icon_color); ?>">
                    <div class="sidebar__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/energy.svg" alt="Энергообеспечение">
                    </div>
                    <span class="sidebar__text">Энергообеспечение</span>
                </a>
            </li>

            <li class="sidebar__item">
                <a href="#" class="sidebar__link" style="color: <?php echo esc_attr($text_color); ?>;"
                   data-text-color="<?php echo esc_attr($text_color); ?>"
                   data-hover-bg="<?php echo esc_attr($hover_bg_color); ?>"
                   data-hover-text="<?php echo esc_attr($hover_text_color); ?>"
                   data-hover-icon="<?php echo esc_attr($hover_icon_color); ?>">
                    <div class="sidebar__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/smartphones.svg" alt="Смартфоны">
                    </div>
                    <span class="sidebar__text">Смартфоны и телефоны</span>
                </a>
            </li>

            <!-- Остальные статические пункты меню... -->
            <?php endif; ?>
        </ul>
    </nav>
        </aside>

        <!-- КАРУСЕЛЬ -->
   <div class="carousel">
    <div class="carousel__inner">
        <?php
        // Получаем картинки карусели из ACF
        $carousel_images = get_field('carousel_images');
        $max_images = 20;

        if ($carousel_images && count($carousel_images) > 0) :
            $limited_images = array_slice($carousel_images, 0, $max_images);

            foreach ($limited_images as $index => $image) :
        ?>
            <div class="card">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: 'Товар ' . ($index + 1)); ?>">
            </div>
        <?php
            endforeach;
        else :
            // Fallback - статические картинки
            for ($i = 1; $i <= 20; $i++) :
        ?>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product<?php echo $i; ?>.png" alt="Товар <?php echo $i; ?>">
            </div>
        <?php
            endfor;
        endif;
        ?>
    </div>

    <!-- КНОПКИ -->
    <button class="carousel__btn carousel__btn--prev">&#10094;</button>
    <button class="carousel__btn carousel__btn--next">&#10095;</button>
</div>

      </section>
<section class="about-section">
      <div class="main__wrapper">
        <div class="about-container">
            <?php
            // Получаем карточки из Custom Post Type
            $about_cards_args = array(
                'post_type' => 'about_cards',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
                'post_status' => 'publish'
            );

            $about_cards = new WP_Query($about_cards_args);

            if ($about_cards->have_posts()) :
                $card_index = 0;
                while ($about_cards->have_posts()) : $about_cards->the_post();
                    $card_index++;
                    $button_text = get_field('card_button_text') ?: 'Узнать больше';
                    $gradient = get_field('card_gradient') ?: 'red_blue';
                    $preview_text = get_field('card_preview_text') ?: get_the_excerpt();

                    // Определяем класс градиента
                    $gradient_class = '';
                    switch($gradient) {
                        case 'red_blue':
                            $gradient_class = 'gradient-red-blue';
                            break;
                        case 'yellow_cyan':
                            $gradient_class = 'gradient-yellow-cyan';
                            break;
                        case 'purple_pink':
                            $gradient_class = 'gradient-purple-pink';
                            break;
                    }
            ?>
            <div class="about-card <?php echo esc_attr($gradient_class); ?>">
                <div class="about-content">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo esc_html($preview_text); ?></p>
                    <button onclick="window.location.href='<?php the_permalink(); ?>'">
                        <?php echo esc_html($button_text); ?>
                    </button>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // FALLBACK - статические карточки если нет созданных
            ?>
            <div class="about-card gradient-red-blue">
                <div class="about-content">
                    <h3>О TechnoMix</h3>
                    <p>TechnoMix — ведущий интернет-магазин электроники с 2015 года. Мы предлагаем широкий ассортимент качественной техники от проверенных брендов по доступным ценам.</p>
                    <button onclick="window.location.href='#'">Узнать больше</button>
                </div>
            </div>

            <div class="about-card gradient-yellow-cyan">
                <div class="about-content">
                    <h3>Как сделать заказ</h3>
                    <p>Просто выберите товар, добавьте в корзину и оформите заказ. Наш менеджер свяжется с вами для подтверждения в течение 15 минут.</p>
                    <button onclick="window.location.href='#'">Инструкция</button>
                </div>
            </div>

            <div class="about-card gradient-purple-pink">
                <div class="about-content">
                    <h3>Гарантии и сервис</h3>
                    <p>Все товары имеют официальную гарантию до 3 лет. Бесплатная доставка по городу, сервисное обслуживание и техническая поддержка 24/7.</p>
                    <button onclick="window.location.href='#'">Подробнее</button>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

      <!-- Gradient Buttons Section -->
<section class="gradient-buttons-section">
    <div class="main__wrapper">
        <div class="buttons-container">
            <?php
            // Получаем кнопки из Custom Post Type
            $buttons_args = array(
                'post_type' => 'gradient_buttons',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
                'post_status' => 'publish'
            );

            $buttons = new WP_Query($buttons_args);

            if ($buttons->have_posts()) :
                while ($buttons->have_posts()) : $buttons->the_post();
                    $button_url = get_field('button_url') ?: '#';
                    $button_gradient = get_field('button_gradient') ?: 'tech';
                    $button_class = 'btn-' . $button_gradient;
            ?>
            <a href="<?php echo esc_url($button_url); ?>" class="gradient-btn <?php echo esc_attr($button_class); ?>">
                <?php the_title(); ?>
            </a>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // FALLBACK - статические кнопки
            ?>
            <a href="#" class="gradient-btn btn-tech">Техника для дома</a>
            <a href="#" class="gradient-btn btn-gadgets">Смартфоны и гаджеты</a>
            <a href="#" class="gradient-btn btn-kitchen">Кухонная техника</a>
            <a href="#" class="gradient-btn btn-entertainment">ТВ и развлечения</a>
            <a href="#" class="gradient-btn btn-computers">Ноутбуки и компьютеры</a>
            <a href="#" class="gradient-btn btn-audio">Аудио и наушники</a>
            <?php endif; ?>
        </div>
    </div>
</section>

    </div>
  </main>

<?php get_footer(); ?>