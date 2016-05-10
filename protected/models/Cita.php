<?php

/**
 * This is the model class for table "cita".
 *
 * The followings are the available columns in table 'cita':
 * @property string $fecha_cita
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property integer $vivo
 * @property string $fecha_cal_recogida
 * @property string $fecha_gusto_recogida
 * @property integer $precio_cal
 * @property string $observaciones
 * @property integer $estado_id
 * @property integer $cliente_id
 *
 * The followings are the available model relations:
 * @property Cliente $cliente
 * @property Estado $estado
 * @property Mano[] $manos
 * @property Pieza[] $piezas
 */
class Cita extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_cita, fecha_creacion, cliente_id', 'required'),
			array('vivo, precio_cal, estado_id, cliente_id', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>255),
			array('fecha_modificacion, fecha_cal_recogida, fecha_gusto_recogida', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fecha_cita, fecha_creacion, fecha_modificacion, vivo, fecha_cal_recogida, fecha_gusto_recogida, precio_cal, observaciones, estado_id, cliente_id', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
			'manos' => array(self::MANY_MANY, 'Mano', 'cita_has_mano(cita_fecha_cita, mano_id)'),
			'piezas' => array(self::MANY_MANY, 'Pieza', 'cita_has_pieza(cita_fecha_cita, pieza_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fecha_cita' => 'Fecha Cita',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'vivo' => 'Vivo',
			'fecha_cal_recogida' => 'Fecha Cal Recogida',
			'fecha_gusto_recogida' => 'Fecha Gusto Recogida',
			'precio_cal' => 'Precio Cal',
			'observaciones' => 'Observaciones',
			'estado_id' => 'Estado',
			'cliente_id' => 'Cliente',
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

		$criteria->compare('fecha_cita',$this->fecha_cita,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('vivo',$this->vivo);
		$criteria->compare('fecha_cal_recogida',$this->fecha_cal_recogida,true);
		$criteria->compare('fecha_gusto_recogida',$this->fecha_gusto_recogida,true);
		$criteria->compare('precio_cal',$this->precio_cal);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('cliente_id',$this->cliente_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
