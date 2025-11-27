// Обработка кастомных цветов сайдбар меню
document.addEventListener('DOMContentLoaded', function() {
    const sidebarLinks = document.querySelectorAll('.sidebar__link');

    sidebarLinks.forEach(link => {
        const textColor = link.getAttribute('data-text-color');
        const hoverBg = link.getAttribute('data-hover-bg');
        const hoverText = link.getAttribute('data-hover-text');
        const hoverIcon = link.getAttribute('data-hover-icon');

        // Применяем цвет текста
        if (textColor) {
            link.style.color = textColor;
        }

        // Обработка hover эффектов
        link.addEventListener('mouseenter', function() {
            if (hoverBg) this.style.backgroundColor = hoverBg;
            if (hoverText) this.style.color = hoverText;

            const icon = this.querySelector('.sidebar__icon');
            const iconImg = this.querySelector('.sidebar__icon img');
            if (icon && hoverBg) icon.style.backgroundColor = hoverBg;
            if (iconImg && hoverIcon) {
                iconImg.style.filter = 'brightness(0) saturate(100%) invert(54%) sepia(99%) saturate(2000%) hue-rotate(345deg) brightness(101%) contrast(101%)';
            }
        });

        link.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
            if (textColor) this.style.color = textColor;

            const icon = this.querySelector('.sidebar__icon');
            const iconImg = this.querySelector('.sidebar__icon img');
            if (icon) icon.style.backgroundColor = '#f5f5f5';
            if (iconImg) iconImg.style.filter = 'brightness(0) opacity(0.7)';
        });
    });
});