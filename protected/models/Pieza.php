<?php

/**
 * This is the model class for table "pieza".
 *
 * The followings are the available columns in table 'pieza':
 * @property integer $id
 * @property string $nombre
 * @property integer $precio
 * @property integer $precio_instalar
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $vivo
 * @property integer $marca_pieza_id
 * @property string $imagen
 * @property string $observaciones
 * @property integer $minutos_instalacion
 * @property string $informacion
 *
 * The followings are the available model relations:
 * @property Cita[] $citas
 * @property MarcaPieza $marcaPieza
 */
class Pieza extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pieza';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('precio, precio_instalar, vivo, marca_pieza_id, minutos_instalacion', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('imagen, observaciones, informacion', 'length', 'max'=>255),
			array('fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, precio, precio_instalar, fecha_creacion, fecha_modificacion, vivo, marca_pieza_id, imagen, observaciones, minutos_instalacion, informacion', 'safe', 'on'=>'search'),
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
			'citas' => array(self::MANY_MANY, 'Cita', 'cita_has_pieza(pieza_id, cita_id)'),
			'marcaPieza' => array(self::BELONGS_TO, 'MarcaPieza', 'marca_pieza_id'),
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
			'precio' => 'Precio',
			'precio_instalar' => 'Precio Instalar',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'vivo' => 'Vivo',
			'marca_pieza_id' => 'Marca Pieza',
			'imagen' => 'Imagen',
			'observaciones' => 'Observaciones',
			'minutos_instalacion' => 'Minutos Instalacion',
			'informacion' => 'Informacion',
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
		$criteria->compare('precio',$this->precio);
		$criteria->compare('precio_instalar',$this->precio_instalar);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('vivo',$this->vivo);
		$criteria->compare('marca_pieza_id',$this->marca_pieza_id);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('minutos_instalacion',$this->minutos_instalacion);
		$criteria->compare('informacion',$this->informacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pieza the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
