// ===== ACTIVE MENU + CLICK SCROLL FIX =====

const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");

// CLICK → scroll + active
navLinks.forEach(link => {
    link.addEventListener("click", function (e) {
        const targetId = this.getAttribute("href");

        // Only handle valid section links
        if (targetId.startsWith("#")) {
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                e.preventDefault();

                // Smooth scroll
                window.scrollTo({
                    top: targetSection.offsetTop - 80,
                    behavior: "smooth"
                });

                // Active class update instantly
                navLinks.forEach(l => l.classList.remove("active"));
                this.classList.add("active");
            }
        }
    });
});

// SCROLL → active update
window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        const sectionHeight = section.clientHeight;

        if (window.scrollY >= sectionTop &&
            window.scrollY < sectionTop + sectionHeight) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("active");

        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});


const scrollBtn = document.getElementById("scrollTopBtn");

// Show button after scroll
window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        scrollBtn.style.display = "flex";
    } else {
        scrollBtn.style.display = "none";
    }
};

// Scroll to top
scrollBtn.onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
};

const bookingModal = document.getElementById('bookingModal');

bookingModal.addEventListener('shown.bs.modal', function () {
    bookingModal.querySelector('input').focus();
});