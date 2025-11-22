class Carousel {
    constructor(container) {
        this.container = container;
        this.inner = container.querySelector('.carousel__inner');
        this.cards = container.querySelectorAll('.card');
        this.prevBtn = container.querySelector('.carousel__btn--prev');
        this.nextBtn = container.querySelector('.carousel__btn--next');

        this.currentIndex = 0;
        this.cardsPerView = 3; // Оставляем 3 карточки для всех экранов
        this.totalCards = this.cards.length;
        this.autoPlayInterval = null;

        this.init();
    }

    init() {
        // Обработчики для кнопок
        this.prevBtn.addEventListener('click', () => this.prev());
        this.nextBtn.addEventListener('click', () => this.next());

        // Запуск автоматического переключения
        this.startAutoPlay();

        // Остановка авто-прокрутки при наведении
        this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.container.addEventListener('mouseleave', () => this.startAutoPlay());

        // Для тач-устройств - остановка авто-прокрутки при касании
        this.container.addEventListener('touchstart', () => this.stopAutoPlay());
        this.container.addEventListener('touchend', () => {
            setTimeout(() => this.startAutoPlay(), 3000);
        });
    }

    updateCarousel() {
        const cardWidth = this.cards[0].offsetWidth + 20; // width + gap
        const translateX = -this.currentIndex * cardWidth;
        this.inner.style.transform = `translateX(${translateX}px)`;
    }

    next() {
        if (this.currentIndex < this.totalCards - this.cardsPerView) {
            this.currentIndex++;
        } else {
            this.currentIndex = 0; // Возврат к началу
        }
        this.updateCarousel();
    }

    prev() {
        if (this.currentIndex > 0) {
            this.currentIndex--;
        } else {
            this.currentIndex = this.totalCards - this.cardsPerView; // Переход к концу
        }
        this.updateCarousel();
    }

    startAutoPlay() {
        this.stopAutoPlay(); // Останавливаем предыдущий интервал
        this.autoPlayInterval = setInterval(() => {
            this.next();
        }, 4000); // Переключение каждые 4 секунды
    }

    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
}

// Инициализация карусели когда DOM загружен
document.addEventListener('DOMContentLoaded', () => {
    const carouselContainer = document.querySelector('.carousel');
    if (carouselContainer) {
        new Carousel(carouselContainer);
    }
});