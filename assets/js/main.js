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


// Кнопка "Наверх"
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTop');

    // Показываем/скрываем кнопку при скролле
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('show');
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
});

// Обработка кастомных цветов бургер-меню
document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.burger-menu__item a');

    menuLinks.forEach(link => {
        const textColor = link.getAttribute('data-text-color');
        const hoverBg = link.getAttribute('data-hover-bg');
        const hoverText = link.getAttribute('data-hover-text');

        console.log('Found link:', link);
        console.log('Text color:', textColor);
        console.log('Hover bg:', hoverBg);
        console.log('Hover text:', hoverText);

        // Применяем цвет текста всегда (убрали проверку)
        if (textColor) {
            link.style.color = textColor;
            console.log('Applied text color:', textColor);
        }

        // Обработка hover эффектов (убрали проверки на дефолтные значения)
        link.addEventListener('mouseenter', function() {
            console.log('Mouse enter');
            if (hoverBg) {
                this.style.backgroundColor = hoverBg;
                console.log('Applied hover bg:', hoverBg);
            }
            if (hoverText) {
                this.style.color = hoverText;
                console.log('Applied hover text:', hoverText);
            }
            const img = this.querySelector('img');
            if (img) {
                img.style.filter = 'brightness(0) invert(1)';
                console.log('Applied image filter');
            }
        });

        link.addEventListener('mouseleave', function() {
            console.log('Mouse leave');
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

