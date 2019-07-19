<?php

/**
 * This is the model class for table "berkas_akreditasi".
 *
 * The followings are the available columns in table 'berkas_akreditasi':
 * @property integer $id
 * @property integer $id_pengajuan
 * @property integer $tipe_berkas
 * @property string $file_path
 * @property string $deskripsi
 * @property string $created_by
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property PengajuanAkreditasi $idPengajuan
 */
class BerkasAkreditasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'berkas_akreditasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pengajuan, file_path', 'required'),
			array('id_pengajuan, tipe_berkas', 'numerical', 'integerOnly'=>true),
			array('file_path', 'length', 'max'=>128),
			array('deskripsi', 'length', 'max'=>512),
			array('created_by', 'length', 'max'=>32),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_pengajuan, tipe_berkas, file_path, deskripsi, created_by, created_at', 'safe', 'on'=>'search'),
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
			'idPengajuan' => array(self::BELONGS_TO, 'PengajuanAkreditasi', 'id_pengajuan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pengajuan' => 'Id Pengajuan',
			'tipe_berkas' => 'Tipe Berkas',
			'file_path' => 'File Path',
			'deskripsi' => 'Deskripsi',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
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
		$criteria->compare('id_pengajuan',$this->id_pengajuan);
		$criteria->compare('tipe_berkas',$this->tipe_berkas);
		$criteria->compare('file_path',$this->file_path,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BerkasAkreditasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
