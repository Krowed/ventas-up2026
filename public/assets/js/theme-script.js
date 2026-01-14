/**
 * THEME SCRIPT - LIMPIO (Sin Panel de Configuración)
 */

// 1. EJECUCIÓN INMEDIATA: Aplica atributos antes de que se vea la página
(function() {
    const html = document.documentElement;
    const savedLayout = localStorage.getItem('layout') || 'single';
    const savedColor = localStorage.getItem('color') || 'custom';
    const savedTheme = localStorage.getItem('theme') || 'light';
    const savedSidebar = localStorage.getItem('sidebarTheme') || 'light';
    const savedTopbar = localStorage.getItem('topbar') || 'white';
    const savedSize = localStorage.getItem('size') || 'default';
    const savedWidth = localStorage.getItem('width') || 'fluid';

    html.setAttribute('data-layout', savedLayout);
    html.setAttribute('data-color', savedColor);
    html.setAttribute('data-bs-theme', savedTheme);
    html.setAttribute('data-sidebar', savedSidebar);
    html.setAttribute('data-topbar', savedTopbar);
    html.setAttribute('data-size', savedSize);
    html.setAttribute('data-width', savedWidth);
})();

// 2. LÓGICA DE INTERACCIÓN
document.addEventListener("DOMContentLoaded", function() {
    // Se eliminó la inserción de 'themesettings' y el panel lateral

    const darkModeToggle = document.getElementById("dark-mode-toggle");
    const lightModeToggle = document.getElementById("light-mode-toggle");

    // --- LÓGICA DARK/LIGHT MODE ---
    function setTheme(mode) {
        document.documentElement.setAttribute("data-bs-theme", mode);
        localStorage.setItem("theme", mode);
        localStorage.setItem("darkMode", mode === "dark" ? "enabled" : "disabled");
        
        if (mode === "dark") {
            darkModeToggle?.classList.remove("activate");
            lightModeToggle?.classList.add("activate");
        } else {
            lightModeToggle?.classList.remove("activate");
            darkModeToggle?.classList.add("activate");
        }
    }

    darkModeToggle?.addEventListener("click", () => setTheme("dark"));
    lightModeToggle?.addEventListener("click", () => setTheme("light"));

    // Inicializar estado visual de los botones
    const currentTheme = localStorage.getItem("theme") || "light";
    setTheme(currentTheme);

    // --- MANEJO DEL LOADER ---
    const loader = document.getElementById('ID-load');
    const wrapper = document.querySelector('.main-wrapper');

    window.addEventListener('load', function() {
        if (loader) loader.classList.add('fade-out');
        if (wrapper) wrapper.classList.add('content-visible');
    });
});