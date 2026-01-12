/**
 * THEME SCRIPT - REVISADO (Single/Custom + Dark Mode Fixed)
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

// 2. PANEL DE CONFIGURACIÓN (HTML)
let themesettings = `
<div class="sidebar-contact">
    <div class="toggle-theme" data-bs-toggle="offcanvas" data-bs-target="#theme-setting">
        <i class="fa-solid fa-gear ti-spin"></i>
    </div>
</div>
<div class="sidebar-themesettings offcanvas offcanvas-end" id="theme-setting">
    <div class="offcanvas-header d-flex align-items-center justify-content-between bg-primary">
        <div><h6 class="text-white mb-0">Theme Customizer</h6></div>
        <a href="#" class="close d-flex align-items-center justify-content-center" data-bs-dismiss="offcanvas"><i class="isax isax-close-circle"></i></a>
    </div>
    <div class="themesettings-inner offcanvas-body">
        <div class="accordion accordion-customicon1 accordions-items-seperate" id="settingtheme">
            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#layoutsetting">
                        Select Layouts <i class="ti ti-circle-chevron-up ms-auto text-primary"></i>
                    </button>
                </h2>
                <div id="layoutsetting" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-0">
                        <div class="row gx-3">
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="defaultLayout" value="default">
                                    <label for="defaultLayout"><span class="layout-type">Default</span></label>
                                </div>
                            </div>
                             <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="singleLayout" value="single">
                                    <label for="singleLayout"><span class="layout-type">Single</span></label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="theme-layout mb-3">
                                    <input type="radio" name="LayoutTheme" id="miniLayout" value="mini">
                                    <label for="miniLayout"><span class="layout-type">Mini</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text-gray-9 fw-semibold fs-16" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarcolor">
                        Theme Colors <i class="ti ti-circle-chevron-up ms-auto text-primary"></i>
                    </button>
                </h2>
                <div id="sidebarcolor" class="accordion-collapse collapse show">
                    <div class="accordion-body pb-2">
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="primaryColor" value="primary">
                                <label for="primaryColor" class="primary-clr"></label>
                            </div>
                            <div class="theme-colorsset me-2 mb-2">
                                <input type="radio" name="color" id="customColor" value="custom">
                                <label for="customColor" class="bg-primary-subtle rounded-circle"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="p-3 border-top">
        <div class="row gx-3">
            <div class="col-12">
                <a href="javascript:void(0);" id="resetbutton" class="btn btn-light w-100"><i class="ti ti-restore me-1"></i>Reset to Single</a>
            </div>
        </div>
    </div>
</div>`;

// 3. LÓGICA DE INTERACCIÓN
document.addEventListener("DOMContentLoaded", function() {
    document.body.insertAdjacentHTML('beforeend', themesettings);

    const layoutRadios = document.querySelectorAll('input[name="LayoutTheme"]');
    const colorRadios = document.querySelectorAll('input[name="color"]');
    const resetButton = document.getElementById('resetbutton');
    const darkModeToggle = document.getElementById("dark-mode-toggle");
    const lightModeToggle = document.getElementById("light-mode-toggle");

    // --- LÓGICA DARK/LIGHT MODE (Botones de arriba) ---
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

    // Inicializar iconos de dark mode
    const currentTheme = localStorage.getItem("theme") || "light";
    setTheme(currentTheme);

    // --- LÓGICA DE LAYOUT Y COLOR ---
    function applySetting(name, value) {
        document.documentElement.setAttribute(`data-${name}`, value);
        localStorage.setItem(name, value);

        if (name === 'layout') {
            if (value === 'mini') document.body.classList.add("mini-sidebar");
            else document.body.classList.remove("mini-sidebar");
        }
    }

    layoutRadios.forEach(radio => {
        radio.addEventListener('change', (e) => applySetting('layout', e.target.value));
    });

    colorRadios.forEach(radio => {
        radio.addEventListener('change', (e) => applySetting('color', e.target.value));
    });

    resetButton?.addEventListener('click', function() {
        localStorage.clear();
        localStorage.setItem('layout', 'single');
        localStorage.setItem('color', 'custom');
        window.location.reload();
    });

    // Sincronizar Radios visualmente
    const currentLayout = localStorage.getItem('layout') || 'single';
    const currentColor = localStorage.getItem('color') || 'custom';
    
    const lRadio = document.querySelector(`input[name="LayoutTheme"][value="${currentLayout}"]`);
    if (lRadio) lRadio.checked = true;

    const cRadio = document.querySelector(`input[name="color"][value="${currentColor}"]`);
    if (cRadio) cRadio.checked = true;
});

    document.addEventListener("DOMContentLoaded", function() {
        const loader = document.getElementById('ID-load');
        const wrapper = document.querySelector('.main-wrapper');

        // Usamos un pequeño delay para asegurar que el navegador ya procesó la fuente
        window.addEventListener('load', function() {
            if (loader) loader.classList.add('fade-out');
            if (wrapper) wrapper.classList.add('content-visible');
        });
    });