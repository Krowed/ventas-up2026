function notify(message, type = 'info', duration = 3000) {
    const container = document.getElementById('wa-toast-container');

    const toast = document.createElement('div');
    toast.className = `wa-toast ${type}`;

    const text = document.createElement('span');
    text.textContent = message;

    toast.appendChild(text);
    container.appendChild(toast);

    // ⏳ SALIDA CON BARRIDO
    setTimeout(() => {
        toast.classList.add('is-hiding');

        toast.addEventListener(
            'animationend',
            () => toast.remove(),
            { once: true }
        );
    }, duration);
}

// Helpers PRO
notify.success = (msg) => notify(msg, 'success');
notify.warning = (msg) => notify(msg, 'warning');
notify.error = (msg) => notify(msg, 'error');
notify.info = (msg) => notify(msg, 'info');


window.confirmarAccion = (titulo, texto, callback) => {
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, confirmar',
        buttonsStyling: false,
        customClass: {
            popup: 'rounded-md shadow-xl border dark:border-slate-700 dark:bg-slate-800',
            confirmButton: 'text-white btn bg-primary px-5 py-2 rounded-md ltr:mr-3 focus:outline-none',
            cancelButton: 'text-white bg-red-500 btn px-5 py-2 rounded-md focus:outline-none',
            actions: 'flex justify-center gap-3'
        }
    }).then((result) => {
        if (result.isConfirmed) callback();
    });
};

// confirmarAccion('¿Borrar?', 'No hay vuelta atrás', () => { ... tu lógica ... });
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function toggleBtnWaitMe(btn, isLoading, customText = 'Cargando...') {
    let $btn = $(btn);

    if (isLoading) {
        // Guardamos el HTML original
        if (!$btn.data('original-text')) {
            $btn.data('original-text', $btn.html());
        }

        // Guardamos el ancho real ANTES de modificar nada
        let w = $btn.outerWidth();

        // Aseguramos contexto para waitMe
        $btn.css('position', 'relative');

        // Vaciar visualmente el botón
        $btn.html('&nbsp;');

        $btn.css({
            'min-width': w + 'px'
        });

        $btn.prop('disabled', true).addClass('btn-loading-active');

        $btn.waitMe({
            effect: 'ios',
            text: customText,
            bg: 'rgba(255,255,255,0)',
            color: '#ffffff',
            maxSize: 15,
            textPos: 'horizontal',
            fontSize: '13px'
        });
    } else {
        $btn.waitMe('hide');

        if ($btn.data('original-text')) {
            $btn.html($btn.data('original-text'));
        }

        $btn.prop('disabled', false).removeClass('btn-loading-active');
        $btn.css({
            'min-width': '',
            'position': ''
        });
    }
}


