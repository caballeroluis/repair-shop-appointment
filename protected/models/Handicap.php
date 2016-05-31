<?php

/**
 * This is the model class for table "handicap".
 *
 * The followings are the available columns in table 'handicap':
 * @property integer $id
 * @property string $nombre
 * @property integer $recargo
 * @property integer $minutos_duracion
 * @property string $imagen
 * @property integer $vivo
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $observaciones
 * @property string $informacion
 * @property integer $mano_id
 *
 * The followings are the available model relations:
 * @property Mano $mano
 */
class Handicap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'handicap';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mano_id', 'required'),
			array('recargo, minutos_duracion, vivo, mano_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('imagen, observaciones, informacion', 'length', 'max'=>255),
			array('fecha_creacion, fecha_modificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, recargo, minutos_duracion, imagen, vivo, fecha_creacion, fecha_modificacion, observaciones, informacion, mano_id', 'safe', 'on'=>'search'),
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
			'mano' => array(self::BELONGS_TO, 'Mano', 'mano_id'),
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
			'recargo' => 'Recargo',
			'minutos_duracion' => 'Minutos Duracion',
			'imagen' => 'Imagen',
			'vivo' => 'Vivo',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'observaciones' => 'Observaciones',
			'informacion' => 'Informacion',
			'mano_id' => 'Mano',
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
		$criteria->compare('recargo',$this->recargo);
		$criteria->compare('minutos_duracion',$this->minutos_duracion);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('vivo',$this->vivo);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('informacion',$this->informacion,true);
		$criteria->compare('mano_id',$this->mano_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Handicap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
