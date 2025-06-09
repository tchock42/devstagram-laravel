// import './bootstrap';

import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar el archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){ // si el value ya tiene asignado un nombre de imagen
            const imagenPublicada = {};  // objeto provisional
            imagenPublicada.size = 1234; // valor obligatorio
            imagenPublicada.name = document.querySelector('[name="imagen"]').value; // nombre de la imagen

            this.options.addedfile.call(this, imagenPublicada);  // agrega nombre de archivo a instancia de dropzone

            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);  // agrega el archivo a instancia desde uploads

            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");      // agrega las clases de dropzone
        }
    },
});

dropzone.on('success', function(file, response){            // evento de archivo colocado en el dropzone con exito y toma la respuesta de la api
    document.querySelector('[name="imagen"]').value = response.imagen   // asigna el nombre de la imagen al value del input relacionado al name imagen
})


dropzone.on('removedfile', function(){         // evento de archivo quitado
    document.querySelector('[name="imagen"]').value= "";
})