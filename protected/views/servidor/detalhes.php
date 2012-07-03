<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h3><?=$this->nome?></h3>

<?php 
$dataProvider=new CActiveDataProvider($model,
array(
    'criteria'=>$criteria,
    'pagination'=>array('pageSize'=>20,),
    'sort'=>array('defaultOrder'=>'Salario.Bruto DESC'),
)
);

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'summaryText'=>'Mostrando {start}-{end} de {count} resultado(s).',
    'emptyText'=> 'Sem resultados.',
    'pager'=> array( 'nextPageLabel'=> 'próxima >', 'prevPageLabel' => '< anterior', 'header'=> ''   ),
    'columns'=>array(
	'CPF',
    array('name'=>'DESCRICAO_CARGO', 'value'=>'$data->DESCRICAO_CARGO." ".$data->CLASSE_CARGO." ".$data->PADRAO_CARGO." ".$data->NIVEL_CARGO'),
	array('name'=> 'Salario.Bruto', 'type'=>'number', 'htmlOptions' => array('class'=>'cellNumber'), 'header'=>'Salário Bruto R$'),
    	/*array(
	    'class'=>'CButtonColumn',
	    'template'=>'{view}',
	    'viewButtonUrl'=>'Yii::app()->createUrl("/servidor/'.$nextPage.'", array("id" => $data->id))',
	),*/
    ),
));
?>
