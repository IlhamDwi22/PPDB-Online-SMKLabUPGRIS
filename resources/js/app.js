import "./bootstrap";
import { createIcons, icons } from 'lucide';
createIcons({ icons });

// AOS (animate on scroll)
import AOS from "aos";
import "aos/dist/aos.css";

// GSAP
import { gsap } from "gsap";

// SplideJS
import Splide from "@splidejs/splide";
import "@splidejs/splide/css";

// Swiper
// core version + navigation, pagination modules:
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

AOS.init({
    once: true
});

// Inisialisasi Swiper
const swiper = new Swiper(".swiper", {
    // Gunakan modul yang diimpor
    modules: [Navigation, Pagination],
    loop: true,

    // Jika pakai pagination
    pagination: {
        el: ".swiper-pagination",
    },

    // Jika pakai navigasi panah
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

document.addEventListener("DOMContentLoaded", () => {
    gsap.set("#hero", { autoAlpha: 1 });

    const tl = gsap.timeline();

    // Animasi navbar
    tl.from("#navbar", {
        y: -100,
        opacity: 0,
        duration: 1,
        ease: "power3.out",
    })
        .from(
            "#hero-text-container > *",
            {
                y: 30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: "power2.out",
            },
            "-=0.5",
        )
        .from(
            "#hero-image-wrapper",
            {
                scale: 0.8,
                opacity: 0,
                duration: 1,
                ease: "back.out(1.5)",
            },
            "-=0.8",
        );

    // Efek melayang
    gsap.to(".floating-element", {
        y: -15,
        duration: 4.5,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut",
    });

    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    mobileMenuBtn?.addEventListener("click", () => {
        mobileMenu?.classList.toggle("hidden");
    });

    const navbar = document.getElementById("navbar");
    const mobileCta = document.getElementById("mobile-cta");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar?.classList.add("shadow-md");
            mobileCta?.classList.remove("translate-y-full");
        } else {
            navbar?.classList.remove("shadow-md");
            mobileCta?.classList.add("translate-y-full");
        }
    });
});
