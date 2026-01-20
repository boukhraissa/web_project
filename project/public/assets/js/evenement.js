(function() {
    'use strict';

    const CONFIG = {
        alertDuration: 5000,
        animationDelay: 100,
        observerThreshold: 0.15,
        progressAnimationDuration: 1500
    };

    // État de l'application
    const state = {
        initialized: false,
        observers: []
    };

    /**
     * Initialisation principale
     */
    function init() {
        if (state.initialized) return;

        setupAlerts();
        setupConfirmations();
        setupIntersectionObserver();
        animateStats();
        animateProgressBars();
        setupFormValidation();
        
        state.initialized = true;
        console.log('✓ Module Événements initialisé');
    }

    /**
     * Gestion des alertes avec auto-fermeture
     */
    function setupAlerts() {
        const alerts = document.querySelectorAll('.alert');
        
        alerts.forEach(alert => {
            // Animation d'entrée
            alert.style.opacity = '0';
            alert.style.transform = 'translateX(50px)';
            
            requestAnimationFrame(() => {
                alert.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                alert.style.opacity = '1';
                alert.style.transform = 'translateX(0)';
            });

            // Bouton de fermeture
            const closeBtn = alert.querySelector('.alert-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => closeAlert(alert));
            }

            // Auto-fermeture
            setTimeout(() => {
                closeAlert(alert);
            }, CONFIG.alertDuration);
        });
    }

    /**
     * Fermer une alerte avec animation
     */
    function closeAlert(alert) {
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(50px)';
        
        setTimeout(() => {
            alert.remove();
        }, 300);
    }

    /**
     * Confirmation avant annulation
     */
    function setupConfirmations() {
        const cancelButtons = document.querySelectorAll('.btn-cancel');
        
        cancelButtons.forEach(btn => {
            btn.closest('form').addEventListener('submit', function(e) {
                const eventCard = this.closest('.event-card');
                const eventTitle = eventCard.querySelector('.event-title').textContent;
                
                if (!confirm(`Êtes-vous sûr de vouloir annuler votre demande pour "${eventTitle}" ?`)) {
                    e.preventDefault();
                }
            });
        });
    }

    /**
     * Intersection Observer pour animations au scroll
     */
    function setupIntersectionObserver() {
        const cards = document.querySelectorAll('.event-card');
        
        const observerOptions = {
            threshold: CONFIG.observerThreshold,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `opacity 0.5s ease ${index * 0.1}s, transform 0.5s ease ${index * 0.1}s`;
            
            observer.observe(card);
        });

        state.observers.push(observer);
    }

    /**
     * Animation des compteurs de statistiques
     */
    function animateStats() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            if (isNaN(target)) return;

            let current = 0;
            const increment = target / 50;
            const duration = 1500;
            const stepTime = duration / 50;

            stat.textContent = '0';

            const counter = setInterval(() => {
                current += increment;
                if (current >= target) {
                    stat.textContent = target;
                    clearInterval(counter);
                } else {
                    stat.textContent = Math.floor(current);
                }
            }, stepTime);
        });
    }

    /**
     * Animation des barres de progression
     */
    function animateProgressBars() {
        const progressBars = document.querySelectorAll('.progress-fill');
        
        progressBars.forEach(bar => {
            const targetWidth = bar.style.width;
            bar.style.width = '0';
            
            setTimeout(() => {
                bar.style.transition = `width ${CONFIG.progressAnimationDuration}ms ease-in-out`;
                bar.style.width = targetWidth;
            }, CONFIG.animationDelay);
        });
    }

    /**
     * Validation des formulaires
     */
    function setupFormValidation() {
        const forms = document.querySelectorAll('.action-form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const button = this.querySelector('button[type="submit"]');
                
                if (button && !button.disabled) {
                    // Désactiver le bouton pour éviter les doubles soumissions
                    button.disabled = true;
                    button.style.opacity = '0.6';
                    button.style.cursor = 'not-allowed';
                    
                    // Ajouter un indicateur de chargement
                    const originalContent = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Traitement...</span>';
                    
                    // Timeout de sécurité (réactiver après 5s si pas de réponse)
                    setTimeout(() => {
                        if (button.disabled) {
                            button.disabled = false;
                            button.style.opacity = '1';
                            button.style.cursor = 'pointer';
                            button.innerHTML = originalContent;
                        }
                    }, 5000);
                }
            });
        });
    }

    /**
     * Effet hover amélioré sur les cartes
     */
    function setupCardHoverEffects() {
        const cards = document.querySelectorAll('.event-card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.2s ease-in-out';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
    }

    /**
     * Smooth scroll pour les ancres
     */
    function setupSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Gestion du header au scroll
     */
    function setupHeaderScroll() {
        let lastScroll = 0;
        const header = document.querySelector('.header');
        
        if (!header) return;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                if (currentScroll > lastScroll) {
                    // Scroll vers le bas
                    header.style.transform = 'translateY(-100%)';
                } else {
                    // Scroll vers le haut
                    header.style.transform = 'translateY(0)';
                }
            }
            
            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Gestion des états de chargement
     */
    function setupLoadingStates() {
        const buttons = document.querySelectorAll('.btn');
        
        buttons.forEach(button => {
            // Effet de feedback visuel au clic
            button.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                
                setTimeout(() => {
                    this.style.transform = '';
                }, 100);
            });
        });
    }

    /**
     * Accessibilité - Navigation au clavier
     */
    function setupKeyboardNavigation() {
        const cards = document.querySelectorAll('.event-card');
        
        cards.forEach(card => {
            const button = card.querySelector('button[type="submit"]');
            
            if (button) {
                card.setAttribute('tabindex', '0');
                
                card.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        button.click();
                    }
                });
            }
        });
    }

    /**
     * Détection du support des animations
     */
    function supportsAnimations() {
        const el = document.createElement('div');
        return typeof el.style.animation !== 'undefined';
    }

    /**
     * Gestion des erreurs
     */
    function setupErrorHandling() {
        window.addEventListener('error', function(e) {
            console.error('Erreur détectée:', e.message);
        });

        window.addEventListener('unhandledrejection', function(e) {
            console.error('Promise rejetée:', e.reason);
        });
    }

    /**
     * Nettoyage avant déchargement
     */
    function cleanup() {
        state.observers.forEach(observer => {
            observer.disconnect();
        });
        state.observers = [];
    }

    /**
     * Styles dynamiques CSS
     */
    function injectDynamicStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .event-card.visible {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }

            .btn:active {
                transform: scale(0.98);
            }

            .header {
                transition: transform 0.3s ease;
            }

            @media (prefers-reduced-motion: reduce) {
                *,
                *::before,
                *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                }
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Point d'entrée - DOMContentLoaded
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            injectDynamicStyles();
            init();
            setupCardHoverEffects();
            setupSmoothScroll();
            setupHeaderScroll();
            setupLoadingStates();
            setupKeyboardNavigation();
            setupErrorHandling();
        });
    } else {
        injectDynamicStyles();
        init();
        setupCardHoverEffects();
        setupSmoothScroll();
        setupHeaderScroll();
        setupLoadingStates();
        setupKeyboardNavigation();
        setupErrorHandling();
    }

    // Nettoyage avant déchargement de la page
    window.addEventListener('beforeunload', cleanup);

    // Export pour debugging (environnement développement)
    if (typeof window !== 'undefined') {
        window.EventsModule = {
            state,
            reinit: init,
            cleanup
        };
    }

})();