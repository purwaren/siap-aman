<?php

/**
 * This is the model class for table "pengajuan_akreditasi".
 *
 * The followings are the available columns in table 'pengajuan_akreditasi':
 * @property integer $id
 * @property integer $id_klinik
 * @property integer $no_urut
 * @property string $tgl_pengajuan
 * @property string $jenis_pengajuan
 * @property string $tgl_penetapan
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property BerkasAkreditasi[] $berkasAkreditasis
 */
class PengajuanAkreditasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengajuan_akreditasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_klinik', 'required'),
			array('id_klinik, no_urut, status', 'numerical', 'integerOnly'=>true),
			array('jenis_pengajuan', 'length', 'max'=>32),
			array('tgl_pengajuan, tgl_penetapan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_klinik, no_urut, tgl_pengajuan, jenis_pengajuan, tgl_penetapan, status', 'safe', 'on'=>'search'),
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
			'berkasAkreditasis' => array(self::HAS_MANY, 'BerkasAkreditasi', 'id_pengajuan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_klinik' => 'Id Klinik',
			'no_urut' => 'No Urut',
			'tgl_pengajuan' => 'Tgl Pengajuan',
			'jenis_pengajuan' => 'Jenis Pengajuan',
			'tgl_penetapan' => 'Tgl Penetapan',
			'status' => 'Status',
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
		$criteria->compare('id_klinik',$this->id_klinik);
		$criteria->compare('no_urut',$this->no_urut);
		$criteria->compare('tgl_pengajuan',$this->tgl_pengajuan,true);
		$criteria->compare('jenis_pengajuan',$this->jenis_pengajuan,true);
		$criteria->compare('tgl_penetapan',$this->tgl_penetapan,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PengajuanAkreditasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
