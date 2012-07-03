<?php

class Servidor extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'ServidoresExecutivo';
	}

	public function primaryKey() { return 'Matricula'; }

	public function relations()
	{
		return array(
			'Salario' => array(self::HAS_ONE, 'Salario', 'Matricula'),
		);
	}

	public function search()
	{
		return new CActiveDataProvider('Servidor', array(
			'sort'=>array(
				'defaultOrder'=>'Nome ASC',
			),
		));
	}
}