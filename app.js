//funcion para validar formularios antes de enviar al servidor
$(document).ready(function() {
    $('form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            herria: {
                message: 'El pueblo no es valido',
                validators: {
                    notEmpty: {
                        message: 'Pueblo obligatorio'
                    },
                    stringLength: {
                        min: 9,
                        max: 9,
                        message: 'El dni tiene que tener 9 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'El dni solo puede contener numeros y letra'
                    }
                }
            },
            izena: {
                container: '#firstNameMessage',
                message: 'El Nombre no es valido',
                validators: {
                    notEmpty: {
                        message: 'Nombre Obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El nombre solo puede contener letras'
                    }
                }
            },
            abizena: {
            	message: 'El Nombre no es valido',
                validators: {
                    notEmpty: {
                        message: 'Nombre Obligatorio'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El nombre solo puede contener letras'
                    }
                }
            },
            user: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    }
                }
            }
        }
    });
});