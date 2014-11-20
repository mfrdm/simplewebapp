<?php

/**
 * This is the model class for table "{{vehicle}}".
 *
 * The followings are the available columns in table '{{vehicle}}':
 * @property integer $id
 * @property integer $id_make
 * @property string $model
 * @property string $type
 * @property string $engine_type_displacement
 * @property string $transmission
 * @property string $fuell_supply_system
 * @property integer $doors
 * @property integer $seets
 * @property integer $wheelchair_accessible
 */
class Vehicle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{vehicle}}';
	}
	public $id_make_name;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_make, model, fuell_supply_system', 'required'),
			array('id_make, doors, seets, wheelchair_accessible', 'numerical', 'integerOnly'=>true),
			array('model, transmission', 'length', 'max'=>25),
			array('type, engine_type_displacement', 'length', 'max'=>50),
			array('fuell_supply_system', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_make, model, type, engine_type_displacement, transmission, fuell_supply_system, doors, seets, wheelchair_accessible, id_make_name', 'safe', 'on'=>'search'),
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
			'idMake' => array(self::BELONGS_TO, 'Vehiclemake', 'id_make'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_make' => 'Make/Manufacture',
			'model' => 'Model',
			'type' => 'Type',
			'engine_type_displacement' => 'Engine Type Displacement',
			'transmission' => 'Transmission',
			'fuell_supply_system' => 'Fuell Supply System',
			'doors' => 'Doors',
			'seets' => 'Seets',
			'wheelchair_accessible' => 'Wheelchair Accessible',
			'id_make_name' => 'Make/Manufacture'
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
		$criteria->compare('id_make',$this->id_make);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('engine_type_displacement',$this->engine_type_displacement,true);
		$criteria->compare('transmission',$this->transmission,true);
		$criteria->compare('fuell_supply_system',$this->fuell_supply_system,true);
		$criteria->compare('doors',$this->doors);
		$criteria->compare('seets',$this->seets);
		$criteria->compare('wheelchair_accessible',$this->wheelchair_accessible);
		$criteria->with=array('idMake');
		$criteria->compare('idMake.name',$this->id_make_name,true);	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
		        'attributes'=>array(
		            'id_make_name'=>array(
		                'asc'=>'idMake.name',
		                'desc'=>'idMake.name DESC',
		            ),	
		            '*',
		        ),
		        'defaultOrder'=>'idMake.name,t.model'
    		),			
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehicle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	private static $_item;

 	public static function getStatuses()
	{
		if(!isset(self::$_item))
			self::loadStatus();
		return self::$_item;                
    }

	public static function getStatus($code=NULL)
	{
		if(!isset(self::$_item))
			self::loadStatus();
		if (isset($code))
			return isset(self::$_item[$code]) ? self::$_item[$code] : false;
	}    
	
	private static function loadStatus()
	{				
		self::$_item[0]='No';
		self::$_item[1]='Yes';
	}

}
