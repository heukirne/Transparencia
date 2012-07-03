<?php

class Unidade extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tpUnidadeLotacao';
	}

	public function search()
	{
		return new CActiveDataProvider('Unidade', array(
			'sort'=>array(
				'defaultOrder'=>'Nome ASC',
			),
		));
	}
}
