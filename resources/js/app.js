require('./bootstrap');
require('./stisla.js');

import Swal from 'sweetalert2'
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

window.Alpine = Alpine
Alpine.plugin(focus)
Alpine.start()

Livewire.on("alert-success", message => {
    Toast.fire({
        icon: 'success',
        title: message
    })
})
Livewire.on("alert-error", message => {
    Toast.fire({
        icon: 'error',
        title: message
    })
})

Livewire.on("mini-sidebar", () => {
    $("#sidebarToggle").trigger({ type: "click" });
})

let modalsElement = document.getElementById("laravel-livewire-modals");

$(modalsElement).on("hidden.bs.modal", () => {
    Livewire.emit("resetModal");
});

Livewire.on("showBootstrapModal", () => {
    $(modalsElement).modal("show");
});

Livewire.on("hideModal", () => {
    $(modalsElement).modal("hide");
});