
(() => {
    'use strict'
  
    //validaçao dos formularios com bootstrap JS// 
    const forms = document.querySelectorAll('.needs-validation')
  
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()