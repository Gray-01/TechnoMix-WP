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
        <a href="<?php echo esc_url(home_url('/')); ?>">TechnoMix</a>
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
              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/energy.svg" alt="Энергообеспечение">
                  </div>
                  <span class="sidebar__text">Энергообеспечение</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/smartphones.svg" alt="Смартфоны">
                  </div>
                  <span class="sidebar__text">Смартфоны и телефоны</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/laptops.svg" alt="Ноутбуки">
                  </div>
                  <span class="sidebar__text">Ноутбуки и планшеты</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/kitchen.svg" alt="Кухонная техника">
                  </div>
                  <span class="sidebar__text">Техника для кухни</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/home.svg" alt="Техника для дома">
                  </div>
                  <span class="sidebar__text">Техника для дома</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/tv.svg" alt="Телевизоры">
                  </div>
                  <span class="sidebar__text">Телевизоры</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/smartwatch.svg" alt="Смарт-часы">
                  </div>
                  <span class="sidebar__text">Смарт-часы</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/audio.svg" alt="Аудио техника">
                  </div>
                  <span class="sidebar__text">Аудио, фото, видео</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/gaming.svg" alt="Игровые консоли">
                  </div>
                  <span class="sidebar__text">Игровые консоли</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/beauty.svg" alt="Красота и здоровье">
                  </div>
                  <span class="sidebar__text">Красота и здоровье</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/dishes.svg" alt="Посуда">
                  </div>
                  <span class="sidebar__text">Посуда</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/chemistry.svg" alt="Бытовая химия">
                  </div>
                  <span class="sidebar__text">Бытовая химия</span>
                </a>
              </li>

              <li class="sidebar__item">
                <a href="#" class="sidebar__link">
                  <div class="sidebar__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidebar/kids.svg" alt="Детские товары">
                  </div>
                  <span class="sidebar__text">Детские товары</span>
                </a>
              </li>
            </ul>
          </nav>
        </aside>

        <!-- КАРУСЕЛЬ -->
        <div class="carousel">
          <div class="carousel__inner">

            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product1.png" alt="Товар 1">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product2.png" alt="Товар 2">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product3.png" alt="Товар 3">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product4.png" alt="Товар 4">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product5.png" alt="Товар 5">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product6.png" alt="Товар 6">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product7.png" alt="Товар 7">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product8.png" alt="Товар 8">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product9.png" alt="Товар 9">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product10.png" alt="Товар 10">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product11.png" alt="Товар 11">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product12.png" alt="Товар 12">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product13.png" alt="Товар 13">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product14.png" alt="Товар 14">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product15.png" alt="Товар 15">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product16.png" alt="Товар 16">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product17.png" alt="Товар 17">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product18.png" alt="Товар 18">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product19.png" alt="Товар 19">
            </div>
            <div class="card">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/product20.png" alt="Товар 20">
            </div>

          </div>

          <!-- КНОПКИ -->
          <button class="carousel__btn carousel__btn--prev">&#10094;</button>
          <button class="carousel__btn carousel__btn--next">&#10095;</button>

        </div>

      </section>

      <section class="about-section">
        <div class="main__wrapper">
          <div class="about-container">

            <div class="about-card">
              <div class="about-content">
                <h3>О TechnoMix</h3>
                <p>TechnoMix — ведущий интернет-магазин электроники с 2015 года. Мы предлагаем широкий ассортимент
                  качественной техники от проверенных брендов по доступным ценам.</p>
                <button>Узнать больше</button>
              </div>
            </div>

            <div class="about-card">
              <div class="about-content">
                <h3>Как сделать заказ</h3>
                <p>Просто выберите товар, добавьте в корзину и оформите заказ. Наш менеджер свяжется с вами для
                  подтверждения в течение 15 минут.</p>
                <button>Инструкция</button>
              </div>
            </div>

            <div class="about-card">
              <div class="about-content">
                <h3>Гарантии и сервис</h3>
                <p>Все товары имеют официальную гарантию до 3 лет. Бесплатная доставка по городу, сервисное обслуживание
                  и техническая поддержка 24/7.</p>
                <button>Подробнее</button>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- Gradient Buttons Section -->
      <section class="gradient-buttons-section">
        <div class="main__wrapper">
          <div class="buttons-container">
            <button class="gradient-btn btn-tech">Техника для дома</button>
            <button class="gradient-btn btn-gadgets">Смартфоны и гаджеты</button>
            <button class="gradient-btn btn-kitchen">Кухонная техника</button>
            <button class="gradient-btn btn-entertainment">ТВ и развлечения</button>
            <button class="gradient-btn btn-computers">Ноутбуки и компьютеры</button>
            <button class="gradient-btn btn-audio">Аудио и наушники</button>
          </div>
        </div>
      </section>

    </div>
  </main>

<?php get_footer(); ?>