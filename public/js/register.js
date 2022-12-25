$('#password, #password_confirmation').on('keyup', function () {
    if ($('#password').val().length == 0 && $('#password_confirmation').val().length == 0) {
        $('#alerta').prop('hidden', true);
        $('#password, #password_confirmation').attr('class', 'form-control');
        $('#btnRegistrarse').prop('disabled', true);

    } else if ($('#password').val() == $('#password_confirmation').val()) {
        $('#alerta').prop('hidden', true);
        $('#password, #password_confirmation').attr('class', 'form-control is-valid');
        $('#btnRegistrarse').prop('disabled', false);
    } else {
        $('#alerta').html('Las contraseñas no coinciden').css('color', 'red').prop('hidden', false);
        $('#password, #password_confirmation').attr('class', 'form-control is-invalid');
        $('#btnRegistrarse').prop('disabled', true);
    }
});
