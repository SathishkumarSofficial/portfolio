/*
|--------------------------------------------------------------------------
| Premium Portfolio Javascript
|--------------------------------------------------------------------------
|
| Handles animations, custom cursor, particles background, dark mode,
| portfolio project filters, dynamic counters, and AJAX contact form.
|
*/

document.addEventListener('DOMContentLoaded', () => {
    // 1. Hide Loader
    const loader = document.getElementById('loader-wrapper');
    if (loader) {
        window.addEventListener('load', () => {
            loader.style.opacity = '0';
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        });
        // Fallback in case window load doesn't trigger
        setTimeout(() => {
            loader.style.opacity = '0';
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        }, 3000);
    }

    // 2. Custom Cursor Tracking
    const cursor = document.querySelector('.custom-cursor');
    const cursorDot = document.querySelector('.custom-cursor-dot');
    
    if (cursor && cursorDot) {
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            cursorDot.style.left = e.clientX + 'px';
            cursorDot.style.top = e.clientY + 'px';
            
            cursor.style.opacity = '1';
            cursorDot.style.opacity = '1';
        });

        document.addEventListener('mouseleave', () => {
            cursor.style.opacity = '0';
            cursorDot.style.opacity = '0';
        });

        // Hover scale effect on links/buttons
        const interactiveElements = document.querySelectorAll('a, button, .clickable, .form-control');
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.style.width = '60px';
                cursor.style.height = '60px';
                cursor.style.borderColor = 'rgba(0, 82, 255, 0.5)';
                cursor.style.backgroundColor = 'rgba(0, 82, 255, 0.05)';
            });
            el.addEventListener('mouseleave', () => {
                cursor.style.width = '40px';
                cursor.style.height = '40px';
                cursor.style.borderColor = 'var(--blue-primary)';
                cursor.style.backgroundColor = 'transparent';
            });
        });
    }

    // 3. Theme Toggle (Dark / Light Mode)
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const themeIcon = themeToggleBtn ? themeToggleBtn.querySelector('i') : null;
    
    // Retrieve theme from localStorage or default to dark
    const currentTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', currentTheme);
    updateThemeIcon(currentTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
            
            // Re-trigger particles color refresh if canvas exists
            if (window.refreshParticles) {
                window.refreshParticles(newTheme);
            }
        });
    }

    function updateThemeIcon(theme) {
        if (!themeIcon) return;
        if (theme === 'light') {
            themeIcon.className = 'fa-solid fa-moon';
            themeToggleBtn.setAttribute('title', 'Switch to Dark Mode');
        } else {
            themeIcon.className = 'fa-solid fa-sun';
            themeToggleBtn.setAttribute('title', 'Switch to Light Mode');
        }
    }

    // 4. Scroll Progress & Sticky Navbar & Back to Top
    const scrollProgress = document.getElementById('scroll-progress');
    const navbar = document.querySelector('.navbar');
    const backToTopBtn = document.getElementById('back-to-top');

    window.addEventListener('scroll', () => {
        // Scroll Progress
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        if (scrollProgress) {
            scrollProgress.style.width = scrolled + '%';
        }

        // Sticky Navbar
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
                navbar.style.padding = '10px 0';
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.style.padding = '20px 0';
            }
        }

        // Back to Top Button
        if (backToTopBtn) {
            if (window.scrollY > 400) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        }
    });

    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 5. Hero Canvas Particles Background
    const canvas = document.getElementById('particles-canvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [];
        let animationId;

        function initCanvas() {
            canvas.width = canvas.parentElement.offsetWidth;
            canvas.height = canvas.parentElement.offsetHeight;
        }

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 1;
                this.speedX = Math.random() * 0.4 - 0.2;
                this.speedY = Math.random() * 0.4 - 0.2;
                this.color = getParticleColor();
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x > canvas.width || this.x < 0) this.speedX = -this.speedX;
                if (this.y > canvas.height || this.y < 0) this.speedY = -this.speedY;
            }

            draw() {
                ctx.fillStyle = this.color;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function getParticleColor() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            return currentTheme === 'light' ? 'rgba(0, 82, 255, 0.15)' : 'rgba(0, 82, 255, 0.3)';
        }

        function createParticles() {
            particles = [];
            const numberOfParticles = Math.min(Math.floor((canvas.width * canvas.height) / 15000), 100);
            for (let i = 0; i < numberOfParticles; i++) {
                particles.push(new Particle());
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            
            // Connect nearby particles
            const maxDistance = 100;
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const lineColor = currentTheme === 'light' ? 'rgba(0, 82, 255, 0.04)' : 'rgba(0, 82, 255, 0.08)';
            
            for (let a = 0; a < particles.length; a++) {
                for (let b = a; b < particles.length; b++) {
                    const dx = particles[a].x - particles[b].x;
                    const dy = particles[a].y - particles[b].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < maxDistance) {
                        ctx.strokeStyle = lineColor;
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(particles[a].x, particles[a].y);
                        ctx.lineTo(particles[b].x, particles[b].y);
                        ctx.stroke();
                    }
                }
            }

            animationId = requestAnimationFrame(animateParticles);
        }

        window.refreshParticles = function() {
            particles.forEach(p => p.color = getParticleColor());
        };

        initCanvas();
        createParticles();
        animateParticles();

        window.addEventListener('resize', () => {
            cancelAnimationFrame(animationId);
            initCanvas();
            createParticles();
            animateParticles();
        });
    }

    // 6. AOS Animation init
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-quad'
        });
    }

    // 7. Typed.js animation
    const typedTarget = document.getElementById('typed-text');
    if (typedTarget && typeof Typed !== 'undefined') {
        const strings = JSON.parse(typedTarget.getAttribute('data-strings') || '[]');
        new Typed('#typed-text', {
            strings: strings.length > 0 ? strings : ['Full Stack Developer', 'PHP Laravel Developer', 'Backend Developer'],
            typeSpeed: 60,
            backSpeed: 40,
            backDelay: 2000,
            loop: true
        });
    }

    // 8. Skill Progress Bars Animation (Trigger on scroll into view)
    const progressBars = document.querySelectorAll('.progress-bar');
    if (progressBars.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const val = bar.getAttribute('data-level');
                    bar.style.width = val + '%';
                    observer.unobserve(bar);
                }
            });
        }, { threshold: 0.1 });

        progressBars.forEach(bar => observer.observe(bar));
    }

    // 9. Animated Counters
    const counters = document.querySelectorAll('.counter-number');
    if (counters.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target') || '0');
                    let count = 0;
                    const speed = 2000 / target; // complete in 2 seconds

                    const updateCount = () => {
                        count++;
                        counter.innerText = count;
                        if (count < target) {
                            setTimeout(updateCount, speed);
                        } else {
                            counter.innerText = target + '+';
                        }
                    };

                    updateCount();
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    }

    // 10. Swiper Carousels
    // Achievements Slider
    if (document.querySelector('.achievements-swiper') && typeof Swiper !== 'undefined') {
        new Swiper('.achievements-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    }

    // 11. Projects Search & Dynamic Filtering
    const filterButtons = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('project-search');
    const projectItems = document.querySelectorAll('.project-item');

    function filterProjects() {
        const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter').toLowerCase();
        const searchQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';

        projectItems.forEach(item => {
            const name = item.querySelector('.card-title').innerText.toLowerCase();
            const description = item.querySelector('.card-text').innerText.toLowerCase();
            const techString = item.getAttribute('data-tech').toLowerCase();
            
            // Check technology filter match
            let matchesFilter = false;
            if (activeFilter === 'all') {
                matchesFilter = true;
            } else {
                // Check if active filter matches any tech badges
                const techs = techString.split(',');
                matchesFilter = techs.some(t => t.includes(activeFilter) || activeFilter.includes(t));
            }

            // Check search text query match
            const matchesSearch = name.includes(searchQuery) || description.includes(searchQuery) || techString.includes(searchQuery);

            if (matchesFilter && matchesSearch) {
                // Show item
                item.style.display = 'block';
                // Trigger animation entry if using GSAP/AOS
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            } else {
                // Hide item
                item.style.display = 'none';
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
            }
        });
    }

    if (filterButtons.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                filterButtons.forEach(b => b.classList.remove('active'));
                e.currentTarget.classList.add('active');
                filterProjects();
            });
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterProjects);
    }

    // 12. AJAX Contact Form Validation & Submit
    const contactForm = document.getElementById('contact-form');
    const formResponse = document.getElementById('form-response');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Clear prior errors
            const errorContainers = contactForm.querySelectorAll('.invalid-feedback');
            errorContainers.forEach(el => el.remove());
            const inputs = contactForm.querySelectorAll('.is-invalid');
            inputs.forEach(el => el.classList.remove('is-invalid'));

            // Show submitting spinner
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...';

            const formData = new FormData(contactForm);
            
            try {
                const response = await fetch(contactForm.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();
                
                if (response.ok && data.success) {
                    // Success
                    if (formResponse) {
                        formResponse.className = 'alert alert-success mt-3';
                        formResponse.innerHTML = `<i class="fa-solid fa-circle-check me-2"></i>${data.message}`;
                        formResponse.style.display = 'block';
                    }
                    contactForm.reset();
                } else {
                    // Validation or other errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const inputEl = contactForm.querySelector(`[name="${field}"]`);
                            if (inputEl) {
                                inputEl.classList.add('is-invalid');
                                const errorDiv = document.createElement('div');
                                errorDiv.className = 'invalid-feedback';
                                errorDiv.innerText = data.errors[field][0];
                                inputEl.parentElement.appendChild(errorDiv);
                            }
                        });
                    }
                    if (formResponse) {
                        formResponse.className = 'alert alert-danger mt-3';
                        formResponse.innerHTML = `<i class="fa-solid fa-circle-exclamation me-2"></i>${data.message || 'Validation failed. Please check the inputs.'}`;
                        formResponse.style.display = 'block';
                    }
                }
            } catch (err) {
                if (formResponse) {
                    formResponse.className = 'alert alert-danger mt-3';
                    formResponse.innerHTML = `<i class="fa-solid fa-triangle-exclamation me-2"></i>An error occurred: ${err.message}. Please check your connection.`;
                    formResponse.style.display = 'block';
                }
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        });
    }

    // 13. GSAP animations (floating elements)
    if (typeof gsap !== 'undefined') {
        // Intro hero animations
        gsap.from('.hero-content h5', { duration: 1, y: 30, opacity: 0, ease: 'back.out(1.7)' });
        gsap.from('.hero-content h1', { duration: 1, y: 30, opacity: 0, delay: 0.2, ease: 'back.out(1.7)' });
        gsap.from('.hero-content p', { duration: 1, y: 30, opacity: 0, delay: 0.4, ease: 'power3.out' });
        gsap.from('.hero-content .hero-buttons', { duration: 1, y: 30, opacity: 0, delay: 0.6, ease: 'power3.out' });
        gsap.from('.hero-image-col', { duration: 1.5, scale: 0.8, opacity: 0, delay: 0.4, ease: 'elastic.out(1, 0.75)' });
        
        // Gentle micro-interactions on floating shapes
        gsap.to('.shape-1', {
            y: 'random(-20, 20)',
            x: 'random(-20, 20)',
            duration: 4,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });
        gsap.to('.shape-2', {
            y: 'random(-15, 15)',
            x: 'random(-15, 15)',
            rotation: 360,
            duration: 8,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });
    }
});
