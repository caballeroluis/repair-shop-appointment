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
 *
 * The followings are the available model relations:
 * @property Cita[] $citas
 */
class Registro extends CActiveRecord
{
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
			array('nombre, codigo_postal, email, fecha_creacion, password, codigo_activacion, username', 'required'),
			array('telefono, codigo_postal, vivo, activado', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido1, apellido2', 'length', 'max'=>45),
			array('email, username', 'length', 'max'=>128),
			array('password, imagen, codigo_activacion', 'length', 'max'=>255),
			array('fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido1, apellido2, telefono, codigo_postal, email, fecha_creacion, fecha_modificacion, password, vivo, imagen, codigo_activacion, activado, username', 'safe', 'on'=>'search'),
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
			'codigo_postal' => 'Codigo Postal',
			'email' => 'Email',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'password' => 'Password',
			'vivo' => 'Vivo',
			'imagen' => 'Imagen',
			'codigo_activacion' => 'Codigo Activacion',
			'activado' => 'Activado',
			'username' => 'Username',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
