// Script untuk dropdown menu pada navbar
document.addEventListener('DOMContentLoaded', function() {
    // Toggle hamburger menu di mobile
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
    
    // Toggle dropdown menu
    const dropdowns = document.querySelectorAll('.dropdown');
    
    // Hapus event listener dropdown sebelumnya (jika ada)
    function handleDropdownClick(e) {
        // Cek jika lebar layar lebih kecil dari 768px (mobile)
        if (window.innerWidth < 768) {
            e.preventDefault();
            this.querySelector('.dropdown-menu').classList.toggle('show');
        }
    }
    
    dropdowns.forEach(dropdown => {
        const dropdownLink = dropdown.querySelector('a');
        if (dropdownLink) {
            // Hanya menambahkan event listener click pada tampilan mobile
            dropdownLink.addEventListener('click', handleDropdownClick);
        }
    });
    
    // Toggle dropdown pada hover di desktop
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('mouseenter', function() {
            if (window.innerWidth >= 768) {
                this.querySelector('.dropdown-menu').classList.add('show');
            }
        });
        
        dropdown.addEventListener('mouseleave', function() {
            if (window.innerWidth >= 768) {
                this.querySelector('.dropdown-menu').classList.remove('show');
            }
        });
    });
    
    // Menutup dropdown saat klik di luar
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
    
    // Update dropdown behavior saat resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
            navLinks.classList.remove('active');
        }
    });
}); 