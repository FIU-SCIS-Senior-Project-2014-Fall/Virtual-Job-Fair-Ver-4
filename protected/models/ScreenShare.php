<?php

/**
 * This is the model class for table "video_interview".
 *
 * The followings are the available columns in table 'video_interview':
 * @property integer $id
 * @property integer $FK_employer
 * @property integer $FK_student
 * @property string $date
 * @property string $time
 * @property string $session_key
 * @property string $notification_id
 * @property string $ScreenShareView
 */
class ScreenShare extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ScreenShare the static model class
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
		return 'video_interview';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FK_employer, FK_student, date, time, session_key, notification_id, ScreenShareView', 'required'),
			array('FK_employer, FK_student', 'numerical', 'integerOnly'=>true),
			array('session_key, notification_id', 'length', 'max'=>45),
			array('ScreenShareView', 'length', 'max'=>90),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, FK_employer, FK_student, date, time, session_key, notification_id, ScreenShareView', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'FK_employer' => 'Fk Employer',
			'FK_student' => 'Fk Student',
			'date' => 'Date',
			'time' => 'Time',
			'session_key' => 'Session Key',
			'notification_id' => 'Notification',
			'ScreenShareView' => 'Screen Share View',
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
		$criteria->compare('FK_employer',$this->FK_employer);
		$criteria->compare('FK_student',$this->FK_student);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('session_key',$this->session_key,true);
		$criteria->compare('notification_id',$this->notification_id,true);
		$criteria->compare('ScreenShareView',$this->ScreenShareView,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}