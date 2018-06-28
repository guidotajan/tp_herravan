(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        $('.is-invalid').removeClass('is-invalid');
        let valid = true;
        const descripcion = $('input[name=descripcion]');
        const price = $('input[name=precio]');
        const stock = $('input[name=stock]');
        if (!descripcion.val()) {
          descripcion.addClass('is-invalid');
          valid = false;
        }
        if (isNaN(price.val()) || Number(price.val()) <= 0) {
          price.addClass('is-invalid');
          valid = false;
        }
        if (isNaN(stock.val()) || Number(stock.val() < 0)) {
          stock.addClass('is-invalid');
          valid = false;
        }
        if (!valid) {
          event.preventDefault();
          event.stopPropagation();
        }
      }, false);
    });
  }, false);
})();