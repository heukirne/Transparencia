<?php

class Orgao extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tpOrgaoSuperiorLotacao';
	}

	public function search()
	{
		return new CActiveDataProvider('Orgao', array(
			'sort'=>array(
				'defaultOrder'=>'Nome ASC',
			),
		));
	}
}