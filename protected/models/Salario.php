<?php

class Salario extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'ServidoresSalario';
	}

	public function search()
	{
		return new CActiveDataProvider('Salario', array(
			'sort'=>array(
				'defaultOrder'=>'Nome ASC',
			),
		));
	}
}