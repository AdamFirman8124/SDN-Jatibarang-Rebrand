document.addEventListener('DOMContentLoaded', function () {
    // === Mobile Navigation ===
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', function () {
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.navbar') && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
            hamburger.classList.remove('active');
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: 'smooth'
                });
                // Close mobile menu if open
                if (navLinks.classList.contains('active')) {
                    navLinks.classList.remove('active');
                    hamburger.classList.remove('active');
                }
            }
        });
    });

    // Sticky navbar on scroll
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
        } else {
            navbar.style.boxShadow = 'none';
        }
    });

    // === Form Kontak Validasi ===
    const contactForm = document.querySelector('.kontak-form form');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const nama = this.querySelector('input[type="text"]');
            const email = this.querySelector('input[type="email"]');
            const pesan = this.querySelector('textarea');
            let valid = true;

            // Reset error
            this.querySelectorAll('.error').forEach(el => el.remove());

            // Validasi Nama
            if (nama.value.trim() === '') {
                showError(nama, 'Nama lengkap harus diisi');
                valid = false;
            }

            // Validasi Email
            if (email.value.trim() === '') {
                showError(email, 'Email harus diisi');
                valid = false;
            } else if (!isValidEmail(email.value.trim())) {
                showError(email, 'Email tidak valid');
                valid = false;
            }

            // Validasi Pesan
            if (pesan.value.trim() === '') {
                showError(pesan, 'Pesan harus diisi');
                valid = false;
            }

            // Jika valid, kirim form (simulasi)
            if (valid) {
                alert('Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
                this.reset();
            }
        });
    }

    // === Helper Functions ===
    function showError(input, message) {
        const formGroup = input.parentElement;
        const error = document.createElement('small');
        error.className = 'error';
        error.style.color = 'var(--danger-color)';
        error.style.display = 'block';
        error.style.marginTop = '5px';
        error.textContent = message;
        formGroup.appendChild(error);
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});

// Filter Berita (menggunakan logika yang sama dengan lomba)
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.lomba-filter .filter-btn');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');
            const beritaCards = document.querySelectorAll('.lomba-card');

            beritaCards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Animasi saat scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.lomba-card').forEach(card => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });
});

// Filter Galeri
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi lightGallery
    lightGallery(document.getElementById('lightgallery'), {
        selector: '.galeri-item',
        download: false,
        counter: false,
        getCaptionFromTitleOrAlt: false
    });

    // Filter galeri
    const filterButtons = document.querySelectorAll('.galeri-filter .filter-btn');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');
            const galeriItems = document.querySelectorAll('.galeri-item');

            galeriItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Animasi saat scroll
    const galeriItems = document.querySelectorAll('.galeri-item');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    galeriItems.forEach(item => {
        item.style.opacity = 0;
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(item);
    });
});

