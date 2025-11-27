const burgerBtn = document.getElementById('burgerBtn');
const burgerMenu = document.getElementById('burgerMenu');
const overlay = document.getElementById('overlay');

// Открытие/закрытие по кнопке
burgerBtn.addEventListener('click', () => {
    burgerBtn.classList.toggle('active');
    burgerMenu.classList.toggle('active');
    overlay.classList.toggle('active');
});

// Закрытие по клику на фон
overlay.addEventListener('click', () => {
    burgerBtn.classList.remove('active');
    burgerMenu.classList.remove('active');
    overlay.classList.remove('active');
});


// Кнопка "Наверх" - ОДИН ОБРАБОТЧИК
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTop');

    if (scrollToTopBtn) {
        console.log('Кнопка "Наверх" найдена в DOM');

        // Показываем/скрываем кнопку при скролле
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
                console.log('Кнопка показана');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        // Плавная прокрутка наверх
        scrollToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // ★ ИСПРАВЛЕННАЯ ОБРАБОТКА ЦВЕТОВ КНОПКИ ★
        const buttonColor = scrollToTopBtn.getAttribute('data-color');
        const buttonHover = scrollToTopBtn.getAttribute('data-hover');

        console.log('Цвета кнопки:', buttonColor, buttonHover);

        // УБИРАЕМ ПРОВЕРКУ - применяем цвета всегда!
        if (buttonColor && buttonHover) {
            // Устанавливаем основной градиент
            scrollToTopBtn.style.background = `linear-gradient(135deg, ${buttonColor} 0%, ${buttonHover} 100%)`;

            // Обработчики для hover эффекта
            const originalGradient = `linear-gradient(135deg, ${buttonColor} 0%, ${buttonHover} 100%)`;
            const hoverGradient = `linear-gradient(135deg, ${buttonHover} 0%, ${buttonColor} 100%)`;

            scrollToTopBtn.addEventListener('mouseenter', function() {
                this.style.background = hoverGradient;
            });

            scrollToTopBtn.addEventListener('mouseleave', function() {
                this.style.background = originalGradient;
            });

            console.log('Кастомные цвета применены');
        } else {
            console.log('Цвета не найдены, используются стандартные из CSS');
        }
    } else {
        console.log('Кнопка "Наверх" НЕ найдена в DOM!');
    }
});

// Обработка кастомных цветов бургер-меню
document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.burger-menu__item a');

    menuLinks.forEach(link => {
        const textColor = link.getAttribute('data-text-color');
        const hoverBg = link.getAttribute('data-hover-bg');
        const hoverText = link.getAttribute('data-hover-text');

        // Применяем цвет текста всегда
        if (textColor) {
            link.style.color = textColor;
        }

        // Обработка hover эффектов
        link.addEventListener('mouseenter', function() {
            if (hoverBg) {
                this.style.backgroundColor = hoverBg;
            }
            if (hoverText) {
                this.style.color = hoverText;
            }
            const img = this.querySelector('img');
            if (img) {
                img.style.filter = 'brightness(0) invert(1)';
            }
        });

        link.addEventListener('mouseleave', function() {
            // Возвращаем стандартный фон
            this.style.backgroundColor = '#F2F2F2';
            // Возвращаем кастомный цвет текста
            if (textColor) {
                this.style.color = textColor;
            }
            const img = this.querySelector('img');
            if (img) {
                img.style.filter = '';
            }
        });
    });
});