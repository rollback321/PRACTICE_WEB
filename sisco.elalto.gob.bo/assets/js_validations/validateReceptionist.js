$(document).ready(function() {
    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[A-Za-z0-9áéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s"_()'\/.,:-]+$/.test(value);
    }, "Caracteres especiales permitidos (/-.,:),letras y números3333.");

    $.validator.addMethod("alfanumOespacioVacio", function(value, element) {
        if (element.value == '') return true;
        else return /^[A-Za-z0-9áéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s_"()'\/.,:-]+$/.test(value);
    }, "Caracteres especiales permitidos (/.-,:),letras y números2222.");

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "El valor no debe ser igual a 'Seleccionar Técnico'");

    $.validator.addMethod("username", function(value, element) {
        var regex = /^[0-9A-Za-z/._@]+$/;
        return regex.test(value);
    }, "El nombre de Usario debe tener entre: números, letras minúsculas o Mayúsculas. NO puede tener otros símbolos ni espacio en blanco.");

    $.validator.addMethod("userpassword", function(value, element) {
        //var regex = /^([0-9A-Za-z\d$@$!%*?&]|[^ ]){3,15}$/;
        var regex = /^([0-9A-Za-z/._@]){4,20}$/;
        return regex.test(value);
    }, "La contraseña debe tener entre 4 y 20 caracteres, compuesta por: números, letras minúsculas o mayúsculas. NO puede tener otros símbolos ni espacio en blanco.");

    var validateForm_CrearHojadeRuta = {
        rules: {
            cite: {
                alfanumOespacioVacio: true,
                maxlength: 80
            },
            ref: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 100
            },
            descrip_doc: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            obs_doc: {
                alfanumOespacioVacio: true,
                maxlength: 200,
            },
            nro_contacto: {
                required: true,
                digits: true,
                maxlength: 20
            },
        },
        messages: {
            cite: {
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 15 palabras"
            },
            ref: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 15 palabras"
            },
            descrip_doc: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            obs_doc: {
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            nro_contacto: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_EditarHojadeRuta = {
        rules: {
            cite_edit: {
                alfanumOespacioVacio: true,
                maxlength: 80
            },
            ref_edit: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 100
            },
            descrip_doc_edit: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            obs_doc_edit: {
                alfanumOespacioVacio: true,
                maxlength: 200
            },
            nro_contacto_edit: {
                required: true,
                digits: true,
                maxlength: 20
            },
        },
        messages: {
            cite_edit: {
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 15 palabras"
            },
            ref_edit: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 15 palabras"
            },
            descrip_doc_edit: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            obs_doc_edit: {
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            nro_contacto_edit: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_DerivacionExterna = {
        rules: {
            list_usuarios: {
                required: true,
                valueNotEquals: "0"
            },
            a_proveido: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            a_obs: {
                required: false,
                alfanumOespacioVacio: true,
                minlength: 2,
                maxlength: 200
            }
        },
        messages: {
            list_usuarios: {
                required: "Este campo es requerido",
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            a_proveido: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            a_obs: {
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };


    var validateForm_DerivacionExternaReception = {
        rules: {
            list_usuarios: {
                required: true,
                valueNotEquals: "0"
            },
            a_proveidoDerivacionExterna: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            a_obsDerivacionExterna: {
                required: false,
                alfanumOespacioVacio: true,
                minlength: 2,
                maxlength: 200
            }
        },
        messages: {
            list_usuarios: {
                required: "Este campo es requerido",
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            a_proveidoDerivacionExterna: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            a_obsDerivacionExterna: {
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };


    var validateForm_DerivacionInterna = {
        rules: {
            usuInterno_id: {
                valueNotEquals: "0"
            },
            prev_descripcion: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            prev_observacion: {
                alfanumOespacioVacio: true,
                minlength: 2,
                maxlength: 200
            },
            prevFecha_plazo: {
                required: true,
                digits: true,
                maxlength: 10
            }
        },
        messages: {
            usuInterno_id: {
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            prev_descripcion: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            prev_observacion: {
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            prevFecha_plazo: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };





    var validateForm_DerivacionMultipleExterna= {
        rules: {
            list_usuariosME: {
                valueNotEquals: "0"
            },
            a_provMultipleExterno: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            a_obsMultipleExterno: {
                alfanumOespacioVacio: true,
                minlength: 2,
                maxlength: 200
            },
            Fecha_plazoMultipleExterno: {
                required: true,
                digits: true,
                maxlength: 10
            }
        },
        messages: {
            list_usuariosME: {
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            a_provMultipleExterno: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            a_obsMultipleExterno: {
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            Fecha_plazoMultipleExterno: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };



    var validateForm_DerivacionMultipleInterna = {
        rules: {
            usuInterno_idResponsable: {
                valueNotEquals: "0"
            },
            a_provMultiple: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            a_obsMultiple: {
                alfanumOespacioVacio: true,
                minlength: 2,
                maxlength: 200
            },
            prevFecha_plazoMultiple: {
                required: true,
                digits: true,
                maxlength: 10
            }
        },
        messages: {
            usuInterno_idResponsable: {
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            a_provMultiple: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            a_obsMultiple: {
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            prevFecha_plazoMultiple: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };


    var validateForm_DerivacionDirecta = {
        rules: {
            list_usuariosDIRECTA: {
                valueNotEquals: "0"
            },
            a_provExternoDIRECTA: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
            a_obsExternoDIRECTA: {
                alfanumOespacioVacio: true,
                minlength: 2,
                maxlength: 200
            },
            Fecha_plazoExternoDIRECTA: {
                required: true,
                digits: true,
                maxlength: 10
            }
        },
        messages: {
            list_usuariosDIRECTA: {
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            a_provExternoDIRECTA: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            a_obsExternoDIRECTA: {
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
            Fecha_plazoExternoDIRECTA: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    

    
    var validateForm_AsignarProcedencia= {
        rules: {
            list_usuariosProcedencia: {
                valueNotEquals: "0"
            },
        },
        messages: {
            list_usuariosProcedencia: {
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_EditarProcedencia= {
        rules: {
            list_usuariosProcedenciaEditar: {
                valueNotEquals: "0"
            },
        },
        messages: {
            list_usuariosProcedenciaEditar: {
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_SugerirDestino = {
        rules: {
            list_usuarioss: {
                required: true,
                valueNotEquals: "0"
            },
            prov_asigDestino: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
        },
        messages: {
            list_usuarioss: {
                required: "Este campo es requerido",
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            prov_asigDestino: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };
    var validateForm_EditarDestino = {
        rules: {
            list_usuariosss: {
                required: true,
                valueNotEquals: "0"
            },
            prov_EditDestino: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 200
            },
        },
        messages: {
            list_usuariosss: {
                required: "Este campo es requerido",
                valueNotEquals: "Por favor seleccione un Funcionario!"
            },
            prov_EditDestino: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 30 palabras"
            },
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.msg_validar').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };
    var validateForm_CrearTecnico = {
        rules: {
            nombres: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            apellidos: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            cargo: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            ci: {
                required: true,
                digits: true,
                maxlength: 20
            },
            celular: {
                required: true,
                digits: true,
                maxlength: 20
            },
            nameUser: {
                required: true,
                username: true,
                minlength: 4,
                maxlength: 20
            },
            password: {
                required: true,
                userpassword: true
            },
            password2: {
                required: true,
                equalTo: '[name="password"]'
            }
        },
        messages: {
            nombres: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            apellidos: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            cargo: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            ci: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            celular: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            nameUser: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!"
            },
            password: {
                required: "Este campo es requerido",
            },
            password2: {
                required: "Este campo es requerido",
                equalTo: "Las Contraseñas NO SON IGUALES."
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_EditarTecnico = {
        rules: {
            nombresUpdate: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            apellidosUpdate: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            cargoUpdate: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            ciUpdate: {
                required: true,
                digits: true,
                maxlength: 20
            },
            celularUpdate: {
                required: true,
                digits: true,
                maxlength: 20
            },
            nameUserUpdate: {
                required: true,
                username: true,
                minlength: 4,
                maxlength: 20
            },
            passwordUpdate: {
                required: true,
                userpassword: true
            },
            password2Update: {
                required: true,
                equalTo: '[name="passwordUpdate"]'
            }
        },
        messages: {
            nombresUpdate: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            apellidosUpdate: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            cargoUpdate: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            ciUpdate: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            celularUpdate: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            nameUserUpdate: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!"
            },
            passwordUpdate: {
                required: "Este campo es requerido",
            },
            password2Update: {
                required: "Este campo es requerido",
                equalTo: "Las Contraseñas NO SON IGUALES."
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_Secretaria = {
        rules: {
            nombresSecretaria: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            apellidosSecretaria: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            cargoSecretaria: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            ciSecretaria: {
                required: true,
                digits: true,
                maxlength: 20
            },
            celularSecretaria: {
                required: true,
                digits: true,
                maxlength: 20
            },
            nameUserSecretaria: {
                required: true,
                username: true,
                minlength: 4,
                maxlength: 20
            },
            passwordSecretaria: {
                required: true,
                userpassword: true
            },
            password2Secretaria: {
                required: true,
                equalTo: '[name="passwordSecretaria"]'
            }
        },
        messages: {
            nombresSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            apellidosSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            cargoSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            ciSecretaria: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            celularSecretaria: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            nameUserSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!"
            },
            passwordSecretaria: {
                required: "Este campo es requerido",
            },
            password2Secretaria: {
                required: "Este campo es requerido",
                equalTo: "Las Contraseñas NO SON IGUALES."
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    var validateForm_EditSecretaria = {
        rules: {
            nombresUpdateSecretaria: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            apellidosUpdateSecretaria: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            cargoUpdateSecretaria: {
                required: true,
                alfanumOespacio: true,
                minlength: 2,
                maxlength: 40
            },
            ciUpdateSecretaria: {
                required: true,
                digits: true,
                maxlength: 20
            },
            celularUpdateSecretaria: {
                required: true,
                digits: true,
                maxlength: 20
            },
            nameUserUpdateSecretaria: {
                required: true,
                username: true,
                minlength: 4,
                maxlength: 20
            },
            passwordUpdateSecretaria: {
                required: true,
                userpassword: true
            },
            password2UpdateSecretaria: {
                required: true,
                equalTo: '[name="passwordUpdateSecretaria"]'
            }
        },
        messages: {
            nombresUpdateSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            apellidosUpdateSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            cargoUpdateSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!. Ingrese aproximadamente 4 palabras"
            },
            ciUpdateSecretaria: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            celularUpdateSecretaria: {
                required: "Este campo es requerido",
                digits: "solo se aceptan digitos",
                maxlength: "Ha excedido el máximo de {0} digitos!"
            },
            nameUserUpdateSecretaria: {
                required: "Este campo es requerido",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "Ha excedido el máximo de {0} caracteres!"
            },
            passwordUpdateSecretaria: {
                required: "Este campo es requerido",
            },
            password2UpdateSecretaria: {
                required: "Este campo es requerido",
                equalTo: "Las Contraseñas NO SON IGUALES."
            }
        },
        errorElement: 'span',
        _errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        get errorPlacement() {
            return this._errorPlacement;
        },
        set errorPlacement(value) {
            this._errorPlacement = value;
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    };

    //Validate
    $(".secretary #form_crearHoja").validate(validateForm_CrearHojadeRuta);
    $(".secretary_edit #form_editarHoja").validate(validateForm_EditarHojadeRuta);
    $(".secretary #form_derivarHojaRutaExterna").validate(validateForm_DerivacionExterna);
    $(".secretary #form_derivarHojaRutaExternaReception").validate(validateForm_DerivacionExternaReception);
    $(".secretary #form_derivarHojaRutainterna").validate(validateForm_DerivacionInterna);
    $(".secretary #form_crearUser").validate(validateForm_CrearTecnico);
    $(".secretary #form_UpdateUser").validate(validateForm_EditarTecnico);
    $(".secretary #form_crearUserSecretaria").validate(validateForm_Secretaria);
    $(".secretary #form_UpdateUserSecretaria").validate(validateForm_EditSecretaria);
    $(".secretary #form_derivarHojaRutaExternaDirecta").validate(validateForm_DerivacionDirecta);
    $(".secretary #form_derivarHojaRutaMultipleExterna").validate(validateForm_DerivacionMultipleExterna);
    $(".secretary #form_derivarHojaRutaMultipleInterna").validate(validateForm_DerivacionMultipleInterna);
    $(".secretary #form_derivarHojaRutaMultipleInterna").validate(validateForm_DerivacionMultipleInterna);
    $(".secretary #form_asignar_Procedencia").validate(validateForm_AsignarProcedencia);
    $(".secretary #form_editar_Procedencia").validate(validateForm_EditarProcedencia);
    $(".secretary #form_asignar_Destino").validate(validateForm_SugerirDestino);
    $(".secretary #form_editar_Destino").validate(validateForm_EditarDestino);
   
    $("#formCrearCopias").validate(validateForm_DerivacionExterna);
});

/*===============================================================
=        Section Validar Derivación Externa Hoja de Ruta        =
===============================================================*/
var wizard_externa = $(".secretary #form_derivarHojaRutaExterna"); 
var wizard_externaReception = $(".secretary #form_derivarHojaRutaExternaReception"); // almacenar en caché el selector de elementos de formulario
var wizard_interna = $(".secretary #form_derivarHojaRutainterna");
var form_crearHojaRuta = $(".secretary #form_crearHoja");
var form_editarHojaRuta = $(".secretary_edit #form_editarHoja");
var form_crearTecnico = $(".secretary #form_crearUser");
var form_editarTecnico = $(".secretary #form_UpdateUser");
var form_crearSecretaria = $(".secretary #form_crearUserSecretaria");
var form_editarSecretaria = $(".secretary #form_UpdateUserSecretaria");



$(".validar_stepper_1").on('click', function() {
    if (wizard_externa.validate().element('.secretary #form_derivarHojaRutaExterna select[name="list_usuarios"]')) { // validar el campo de entrada    
        stepper.next();
    }
});

$(".validar_stepper_2").on('click', function() {
    $('.secretary #form_derivarHojaRutaExterna textarea[name="a_proveido"], .secretary #form_derivarHojaRutaExterna textarea[name="a_obs"]').validate();
    if ($('.secretary #form_derivarHojaRutaExterna textarea[name="a_proveido"], .secretary #form_derivarHojaRutaExterna textarea[name="a_obs"]').valid()) {
        stepper.next();
    }
});
$(".validar_stepper_2Reception").on('click', function() {
    $('.secretary #form_derivarHojaRutaExterna textarea[name="a_proveidoDerivacionExterna"], .secretary #form_derivarHojaRutaExterna textarea[name="a_obsDerivacionExterna"]').validate();
    if ($('.secretary #form_derivarHojaRutaExterna textarea[name="a_proveidoDerivacionExterna"], .secretary #form_derivarHojaRutaExterna textarea[name="a_obsDerivacionExterna"]').valid()) {
        stepper.next();
    }
});
//Limpiar campos Formulario Derivacion Externa/Interna
function limpiarControles() {
    $('select#select_nivel_2 option[value="0"]').prop('selected', true);
    $('select#select_nivel_3 option[value="0"]').prop('selected', true);
    $("select#list_usuarios option").each(function() {
        $(this).remove();
    });
    wizard_externa[0].reset();

    var externo = wizard_externa.validate();
    externo.resetForm();
    $(".form-group .is-invalid").removeClass("is-invalid");
    // $(".form-group .error").removeClass("error");

    stepper.previous();
    stepper.previous();
}
//Limpiar campos Formulario VentanillaUnica
// function limpiarControlesVentanilla() {
//     $('select#select_nivel_2 option[value="0"]').prop('selected', true);
//     $('select#select_nivel_3 option[value="0"]').prop('selected', true);
//     $("select#list_usuarios option").each(function() {
//         $(this).remove();
//     });
 
// }
//Limpiar campos de Formulario derivacion Interna
function limpiarControlesIn() {
    wizard_interna[0].reset();
    var interno = wizard_interna.validate();
    interno.resetForm();
    $(".form-group .is-invalid").removeClass("is-invalid");
    // $(".form-group .error").removeClass("error");
}
//Frases proveidosMultiple
// $('select#select_proveidoMultiple').on('change', function() {
//     $('#a_provMultiple').val($(this).find(":selected").text() + ' ');
//     $('#a_provMultiple').focus();
//     $('#select_proveidoMultiple').val($('#select_proveidoMultiple > option:first').val());
// });
//Frases proveidos
$('select#select_proveido').on('change', function() {
    $('#a_proveido').val($(this).find(":selected").text() + ' ');
    $('#a_proveido').focus();
    $('#prev_descripcion').val($(this).find(":selected").text() + ' ');
    $('#prev_descripcion').focus();
    $('#select_proveido').val($('#select_proveido > option:first').val());
});

//limpias campos Formulario Crear/Update Hoja de Ruta
function limpiarCamposHDR() {
    form_crearHojaRuta[0].reset();
    var form = form_crearHojaRuta.validate();
    form.resetForm();
    form_editarHojaRuta[0].reset();
    var form = form_editarHojaRuta.validate();
    form.resetForm();
    $(".form-group .is-invalid").removeClass("is-invalid");
}
//limpias campos Formulario Crear/Update Tecnico
function limpiarCamposCT() {
    form_crearTecnico[0].reset();
    var form = form_crearTecnico.validate();
    form.resetForm();
    form_editarTecnico[0].reset();
    var form = form_editarTecnico.validate();
    form.resetForm();
    $(".form-group .is-invalid").removeClass("is-invalid");
}

function limpiarCampoSecre() {
    form_crearSecretaria[0].reset();
    var form = form_crearSecretaria.validate();
    form.resetForm();
    form_editarSecretaria[0].reset();
    var form = form_editarSecretaria.validate();
    form.resetForm();
    $(".form-group .is-invalid").removeClass("is-invalid");
}