<?php

/**
 * This is the model class for table "riwayat_pendidikan_dosen".
 *
 * The followings are the available columns in table 'riwayat_pendidikan_dosen':
 * @property integer $id
 * @property integer $id_dosen
 * @property integer $id_jenjang
 * @property string $nama_institusi
 * @property string $lulus
 */
class RiwayatPendidikanDosen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'riwayat_pendidikan_dosen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dosen, id_jenjang, nama_institusi, lulus', 'required'),
			array('id_dosen, id_jenjang', 'numerical', 'integerOnly'=>true),
			array('nama_institusi', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_dosen, id_jenjang, nama_institusi, lulus', 'safe', 'on'=>'search'),
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
			'id_dosen' => 'Id Dosen',
			'id_jenjang' => 'Id Jenjang',
			'nama_institusi' => 'Nama Institusi',
			'lulus' => 'Lulus',
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
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jenjang',$this->id_jenjang);
		$criteria->compare('nama_institusi',$this->nama_institusi,true);
		$criteria->compare('lulus',$this->lulus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RiwayatPendidikanDosen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
