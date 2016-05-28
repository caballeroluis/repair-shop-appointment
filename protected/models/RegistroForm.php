<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido1
 * @property string $apellido2
 * @property integer $telefono
 * @property integer $codigo_postal
 * @property string $email
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $password
 * @property integer $vivo
 * @property string $imagen
 * @property string $codigo_activacion
 * @property integer $activado
 * @property string $username
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Cita[] $citas
 */
class RegistroForm extends CActiveRecord
{
  public $username;
  public $password;
  public $nombre;
  public $email;
  public $codigo_postal;
  public $apellido1;
  public $apellido2;
  public $telefono;
  public $vivo = 1;
  public $activado = 0;
  public $imagen;
  public $codigo_activacion;
  public $fecha_creacion;
  public $fecha_modificacion = '00000-00-00 00:00:00';
  public $repetir_password;
  public $terminos = 0;
  
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('telefono, codigo_postal, vivo, activado', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido1, apellido2', 'length', 'max'=>45),
			array('email, username', 'length', 'max'=>128),
			array('password, imagen, codigo_activacion, observaciones', 'length', 'max'=>255),
			array('fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido1, apellido2, telefono, codigo_postal, email, fecha_creacion, fecha_modificacion, password, vivo, imagen, codigo_activacion, activado, username, observaciones', 'safe', 'on'=>'search'),
                    
                        //mis validaciones
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
                        array('username', 'unique'),
                        array('email', 'unique'),
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
                        ),
                        array(
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
                          'match',
                          'pattern' => '/1/',
                          'message' => 'Debe aceptar los términos para utilizar el servicio',
                        ),
                    );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'citas' => array(self::HAS_MANY, 'Cita', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido1' => 'Apellido1',
			'apellido2' => 'Apellido2',
			'telefono' => 'Telefono',
			'codigo_postal' => 'Codigo Postal <span class="required">*</span>',
			'email' => 'Email <span class="required">*</span>',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'password' => 'Password (Contraseña) <span class="required">*</span>',
			'vivo' => 'Vivo',
			'imagen' => 'Imagen',
			'codigo_activacion' => 'Codigo Activacion',
			'activado' => 'Activado',
			'username' => 'Username (Nombre de la cuenta) <span class="required">*</span>',
			'observaciones' => 'Observaciones',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido1',$this->apellido1,true);
		$criteria->compare('apellido2',$this->apellido2,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('codigo_postal',$this->codigo_postal);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('vivo',$this->vivo);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('codigo_activacion',$this->codigo_activacion,true);
		$criteria->compare('activado',$this->activado);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegistroForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
