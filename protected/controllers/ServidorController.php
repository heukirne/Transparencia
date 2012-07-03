<?php

class ServidorController extends CController
{
	public $layout='column1';
	public $defaultAction='inicio';

  	public $menu=array();
       public $breadcrumbs=array();
	public $nome="Órgãos do Poder Executivo";

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}


	public function actionInicio()
	{
		$vars['nextPage'] = 'lotacao';
		$vars['model'] = 'Orgao';
		$vars['criteria'] = array( 'condition' => 'totalSalarioBruto > 0'); 
		$this->render('index', $vars);
	}

        public function actionLotacao($id=0)
        {
                $vars['nextPage'] = 'unidade';
                $vars['model'] = 'Lotacao';
		  $vars['criteria'] = array();
                if ($id!=0) {
			$vars['criteria'] =  array( 'condition'=>'idOrgaoSuperiorLotacao=:id and totalSalarioBruto > 0',
        				    'params'=>array('id'=>$id) );
		       $Orgao = Orgao::model()->findByPk($id);
		  	$this->nome = $Orgao->Nome;	
		  }
                $this->render('index',$vars);
        }

        public function actionUnidade($id=0)
        {
                $vars['nextPage'] = 'detalhes';
                $vars['model'] = 'Unidade';
		  $vars['criteria'] = array();
		  if ($id!=0) {
                      $vars['criteria'] =  array( 'condition'=>'idOrgaoLotacao=:id and totalSalarioBruto > 0',
                                            'params'=>array('id'=>$id) );
                  $Lotacao = Lotacao::model()->findByPk($id);
		    $this->nome = $Lotacao->Nome;
		  }
		$this->render('index',$vars);
        }

        public function actionDetalhes($id=0)
        {
		$vars['criteria'] = array('with'=> array('Salario'));
		if ($id!=0) {
                  $Unidade = Unidade::model()->findByPk($id);
		    $this->nome = $Unidade->Nome;
                  $vars['criteria'] =  array( 'condition'=>'COD_UORG_LOTACAO=:id',
                                            'params'=>array('id'=>$id),
						  'with'=> array('Salario') );
		}
              $vars['model'] = 'Servidor';
		$this->render('detalhes',$vars);
        }

	public function actionCargo()
	{
		$this->nome = 'Cargos do Poder Executivo';
		$vars['nextPage'] = 'classe';
		$vars['model'] = 'Cargo';
		$vars['criteria'] = array( 'condition' => 'totalSalarioBruto > 0'); 
		$this->render('index', $vars);
	}

       public function actionClasse($id=0)
        {
                $vars['nextPage'] = 'padrao';
                $vars['model'] = 'Classe';
		  $vars['criteria'] = array();
		  if ($id!=0) {
                      $vars['criteria'] =  array( 'condition'=>'idDescricaoCargo=:id and totalSalarioBruto > 0',
                                            'params'=>array('id'=>$id) );
                  $Cargo = Cargo::model()->findByPk($id);
		    $this->nome = $Cargo->Nome;
		  }
		$this->render('index',$vars);
        }

       public function actionPadrao($id=0)
        {
                $vars['nextPage'] = 'nivel';
                $vars['model'] = 'Padrao';
		  $vars['criteria'] = array();
		  if ($id!=0) {
                      $vars['criteria'] =  array( 'condition'=>'idClasseCargo=:id and totalSalarioBruto > 0',
                                            'params'=>array('id'=>$id) );
                  $Classe = Classe::model()->findByPk($id);
		    $this->nome = $Classe->Nome;
		  }
		$this->render('index',$vars);
        }

       public function actionNivel($id=0)
        {
                $vars['nextPage'] = 'detalhesN';
                $vars['model'] = 'Nivel';
		  $vars['criteria'] = array();
		  if ($id!=0) {
                      $vars['criteria'] =  array( 'condition'=>'idPadraoCargo=:id and totalSalarioBruto > 0',
                                            'params'=>array('id'=>$id) );
                  $Padrao = Padrao::model()->findByPk($id);
		    $this->nome = $Padrao->Nome;
		  }
		$this->render('index',$vars);
        }

        public function actionDetalhesN($id=0) {
		$vars['criteria'] = array('with'=> array('Salario'));
		if ($id!=0) {
                  $Nivel = Nivel::model()->findByPk($id);
		    $this->nome = $Nivel->Nome;
                  $vars['criteria'] =  array( 'condition'=>'idNivelCargo=:id',
                                            'params'=>array('id'=>$id),
						  'with'=> array('Salario') );
		}
              $vars['model'] = 'Servidor';
		$this->render('detalhes',$vars);
        }

	public function actionSobre()
	{
		$this->nome = 'Sobre o Projeto';
		$this->render('about');
	}	

}
