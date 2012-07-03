<?php

class Lotacao extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tpOrgaoLotacao';
	}

	public function search()
	{
		return new CActiveDataProvider('Lotacao', array(
			'sort'=>array(
				'defaultOrder'=>'Nome ASC',
			),
		));
	}
}