<?php

/**
 * This is the model class for table "usertype".
 *
 * The followings are the available columns in table 'usertype':
 * @property integer $id
 * @property string $type
 *
 * The followings are the available model relations:
 * @property UsertypeProfilefieldMap[] $usertypeProfilefieldMaps
 * @property User[] $users
 * @property UsertypeProfilefieldMap[] $usertypeProfilefieldMaps1
 */
class UserType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usertype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, type', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type', 'safe', 'on'=>'search'),
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
			'usertypeProfilefieldMaps' => array(self::MANY_MANY, 'UsertypeProfilefieldMap', 'profilefield_visibility_map(FK_visibleto, FK_profilefield)'),
			'users' => array(self::HAS_MANY, 'User', 'FK_usertype'),
			'usertypeProfilefieldMaps1' => array(self::HAS_MANY, 'UsertypeProfilefieldMap', 'FK_usertype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}