import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Gestion du panier
window.cart = {
    items: JSON.parse(localStorage.getItem('cart') || '[]'),
    
    add(service) {
        const existing = this.items.find(item => item.id === service.id);
        if (existing) {
            existing.quantity++;
        } else {
            this.items.push({ ...service, quantity: 1 });
        }
        this.save();
        this.showNotification('✨ Prestation ajoutée au panier!');
    },
    
    remove(serviceId) {
        this.items = this.items.filter(item => item.id !== serviceId);
        this.save();
        this.showNotification('🗑️ Article retiré du panier');
    },
    
    updateQuantity(serviceId, quantity) {
        const item = this.items.find(item => item.id === serviceId);
        if (item) {
            item.quantity = Math.max(1, quantity);
            this.save();
        }
    },
    
    getTotal() {
        return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    },
    
    getCount() {
        return this.items.reduce((sum, item) => sum + item.quantity, 0);
    },
    
    clear() {
        this.items = [];
        this.save();
    },
    
    save() {
        localStorage.setItem('cart', JSON.stringify(this.items));
        window.dispatchEvent(new CustomEvent('cart-updated'));
    },
    
    showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-4 bg-black text-white px-8 py-4 rounded-full shadow-2xl z-50 animate-slide-in font-semibold';
        notification.textContent = message;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.classList.add('animate-slide-out');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    if (animateElements.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        animateElements.forEach(el => observer.observe(el));
    }
});
