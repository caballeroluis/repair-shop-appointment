<?php

class Registro extends CFormModel {

  public $username;
  public $password;
  public $repetir_password;
  public $nombre;
  public $email;
  public $codigo_postal;
  public $apellido1;
  public $apellido2;
  public $telefono;
  public $vivo;
  public $activado;
  public $imagen;
  public $codigo_activacion;
  public $fecha_creacion;
  public $fecha_modificacion;
  public $terminos;

  public function rules() {

    return array(
        array('nombre, codigo_postal, email, fecha_creacion, password, codigo_activacion, username', 'required', 'message' => 'Este campo es obligatorio'),
        array('telefono, codigo_postal, vivo, activado', 'numerical', 'integerOnly' => true, 'message' => 'Campo nummérico'),
        array('nombre, apellido1, apellido2', 'length', 'max' => 45, 'tooLong' => 'Máximo 45 caracteres'),
        array('email, username', 'length', 'max' => 128, 'tooLong' => 'Máximo 128 caracteres'),
        array('password, imagen, codigo_activacion', 'length', 'max' => 255, 'tooLong' => 'Máximo 255 caracteres'),
        array('fecha_modificacion', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, nombre, apellido1, apellido2, telefono, codigo_postal, email, fecha_creacion, fecha_modificacion, password, vivo, imagen, codigo_activacion, activado, username', 'safe', 'on' => 'search'),
        array(
            'nombre',
            'match',
            'pattern' => '/^[a-z0-9áéíóúñàèìòùäëïöüç\s]+$/i',
            'message' => 'El tipo de datos introducido es incorrecto'
        ),
        array(
            'email',
            'email',
            'message' => 'El formato de email introducido no es correcto',
        ),
        array(
          'password',
          'match',
          'pattern' => '/^.*(?=.{8,16})(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!#$%&? |\'\/"çªº`@^*_+=-¿¡;:,.\<\>\{\}\[\]]).*$/',
          'message' => 'Obligatorio letras (mayúsculas y minúsculas), números, algún símbolo y más de 8 caracteres',
        ),
        array(
          'repetir_password',
          'match',
          'pattern' => '/^.*(?=.{8,16})(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!#$%&? |\'\/"çªº`@^*_+=-¿¡;:,.\<\>\{\}\[\]]).*$/',
          'message' => 'Obligatorio letras (mayúsculas y minúsculas), números, algún símbolo y más de 8 caracteres',
        ),
        array(
            'repetir_password',
            'compare',
            'compareAttribute' => 'password',
            'message' => 'Las contraseñas no coinciden',
        )
        ,array(
          'codigo_postal',
          'length', 'max' => 5,
        ),
        array(
          'codigo_postal',
          'match',
          'pattern' => '/^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/',
          'message' => 'Código postal inválido',
        ),
        array(
            'terminos',
            'required',
            'message' => 'Por favor, debe aceptar los términos y condiciones del servicio marcando la casilla.'
        ),
    );
  }

}
