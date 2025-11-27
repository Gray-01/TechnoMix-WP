<?php
/**
 * Template for about_cards single posts
 */
get_header(); ?>

<style>
/* Сброс стилей для устранения белого фона */
body {
    background: linear-gradient(#000000, #01042d) !important;
    margin: 0 !important;
    padding: 0 !important;
}

#page,
.site,
.site-content,
.content-area,
.site-main {
    background: transparent !important;
    margin: 0 !important;
    padding: 0 !important;
}

/* Стили для детальной страницы карточки */
.about-detail-section {
    padding: 60px 0 100px; /* Увеличил нижний паддинг для футера */
    background: linear-gradient(#000000, #01042d);
    font-family: 'RobotoSerif', sans-serif;
    min-height: calc(100vh - 160px); /* Увеличил отступ от футера */
    margin: 0;
    position: relative;
    z-index: 1;
}

.about-detail-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
}

.about-detail-card {
    background-color: #040a20;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    padding: 40px 30px;
    position: relative;
    overflow: hidden;
    margin-bottom: 30px;
    max-height: none; /* Убрал ограничение высоты */
}

.about-detail-card:before {
    content: "";
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(45deg, #ff0000, #0037ff);
    transform: skew(2deg, 2deg);
    z-index: -1;
}

.about-detail-content h1 {
    font-size: 32px;
    color: #fff;
    margin-bottom: 25px;
    text-align: center;
    font-family: 'RobotoSerif', sans-serif;
    line-height: 1.3;
}

.about-full-text {
    color: rgba(255, 255, 255, 0.9);
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 40px;
    max-height: none; /* Убрал ограничение высоты */
    overflow: visible; /* Разрешаем переполнение */
}

.about-full-text h2 {
    color: #fff;
    margin: 25px 0 15px;
    font-size: 24px;
    font-family: 'RobotoSerif', sans-serif;
}

.about-full-text h3 {
    color: #fff;
    margin: 20px 0 12px;
    font-size: 20px;
    font-family: 'RobotoSerif', sans-serif;
}

.about-full-text h4 {
    color: #fff;
    margin: 18px 0 10px;
    font-size: 18px;
    font-family: 'RobotoSerif', sans-serif;
}

.about-full-text p {
    margin-bottom: 16px;
}

.about-full-text strong {
    color: #fff;
    font-weight: 600;
}

.about-full-text em {
    color: rgba(255, 255, 255, 0.8);
    font-style: italic;
}

.about-full-text ul,
.about-full-text ol {
    margin-left: 20px;
    margin-bottom: 20px;
}

.about-full-text li {
    margin-bottom: 8px;
    line-height: 1.5;
}

.about-back-btn {
    background: transparent;
    border: 1px solid #fff;
    color: #fff;
    padding: 12px 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'RobotoSerif', sans-serif;
    font-size: 14px;
    border-radius: 5px;
    display: block;
    margin: 20px auto 0;
    width: fit-content;
}

.about-back-btn:hover {
    background: #fff;
    color: #000;
    transform: translateY(-2px);
}

/* Дополнительные отступы для длинного контента */
.about-detail-meta {
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/* Гарантируем что футер будет ниже */
.site-footer {
    position: relative;
    z-index: 2;
    margin-top: auto;
}

/* Адаптивность */
@media (max-width: 768px) {
    .about-detail-section {
        padding: 40px 0 80px; /* Увеличил для мобильных */
        min-height: calc(100vh - 120px);
    }

    .about-detail-card {
        padding: 25px 20px;
        margin-bottom: 20px;
    }

    .about-detail-content h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .about-full-text {
        font-size: 15px;
        line-height: 1.5;
    }

    .about-full-text h2 {
        font-size: 22px;
    }

    .about-full-text h3 {
        font-size: 18px;
    }

    .about-detail-meta {
        margin-top: 30px;
        padding-top: 15px;
    }
}

/* Экстренное решение - если все еще налазит */
footer {
    margin-top: 50px !important;
    position: relative !important;
}
</style>

<section class="about-detail-section">
    <div class="main__wrapper">
        <div class="about-detail-container">
            <article class="about-detail-card">
                <div class="about-detail-content">
                    <h1><?php the_title(); ?></h1>

                    <div class="about-full-text">
                        <?php
                        // Показываем полное описание из ACF поля
                        $full_description = get_field('card_full_description');

                        if ($full_description) {
                            echo apply_filters('the_content', $full_description);
                        } else {
                            // Если полного описания нет, показываем обычный контент
                            if (get_the_content()) {
                                the_content();
                            } else {
                                // Если и контента нет, показываем превью текст
                                $preview_text = get_field('card_preview_text');
                                if ($preview_text) {
                                    echo '<p>' . esc_html($preview_text) . '</p>';
                                } else {
                                    echo '<p>Описание скоро появится...</p>';
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="about-detail-meta">
                        <div class="back-button">
                            <button onclick="window.history.back()" class="about-back-btn">
                                ← Назад к карточкам
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>