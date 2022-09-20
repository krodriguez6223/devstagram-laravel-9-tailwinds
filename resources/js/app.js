 if(document.querySelector('#dropzone')){
    Dropzone.options.dropzone = {

        dictDefaultMessage:"Sube tu imagen aquí",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar imagen",
        maxFiles: 1,
        uploadMultiple:false,

        init: function() {

          if (document.querySelector('[name="imagen"]').value.trim()) {
              const imagenPublicada = {}
              imagenPublicada.size = 1234;
              imagenPublicada.name = document.querySelector('[name="imagen"]').value;

              this.options.addedfile.call(this, imagenPublicada);
              this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
              imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
            
          }
         
          this.on("success", function(file, response){
           document.querySelector('[name="imagen"]').value = response.imagen

          });

            this.on("removedfile", function(){
           document.querySelector('[name="imagen"]').value = "";
          });

        }
  }
}
  