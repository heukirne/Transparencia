<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h3><?=$this->nome?></h3>

<p>Seleciona qualquer item da tabela para ver mais detalhes.</p>

<?php 
$dataProvider=new CActiveDataProvider($model,
array(
    'criteria'=>$criteria,
    'pagination'=>array('pageSize'=>20,),
    'sort'=>array('defaultOrder'=>'totalSalarioBruto DESC'),
)
);

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'summaryText'=>'Mostrando {start}-{end} de {count} resultado(s).',
    'emptyText'=> 'Sem resultados.',
    'pager'=> array( 'nextPageLabel'=> 'próxima >', 'prevPageLabel' => '< anterior', 'header'=> ''   ),
    'columns'=>array(
	array('name'=>'Nome', 'value'=>'CHtml::link(utf8_encode($data->Nome),array("servidor/'.$nextPage.'","id"=>$data->id))', 'type'=>'raw'),
	array('name'=> 'numeroServidores', 'htmlOptions' => array('class'=>'cellNumber'), 'header'=> 'Número de Servidores'),
	array('name'=> 'minSalarioBruto', 'type'=>'number', 'htmlOptions' => array('class'=>'cellNumber'), 'header'=>'Minimo R$'),
	array('name'=> 'mediaSalarioBruto', 'type'=>'number', 'htmlOptions' => array('class'=>'cellNumber'), 'header'=>'Média R$'),
	array('name'=> 'maxSalarioBruto', 'type'=>'number', 'htmlOptions' => array('class'=>'cellNumber'), 'header'=>'Maximo R$'),
	array('name'=> 'totalSalarioBruto', 'type'=>'number', 'htmlOptions' => array('class'=>'cellNumber'), 'header'=>'Total Salário R$'),
    	/*array(
	    'class'=>'CButtonColumn',
	    'template'=>'{view}',
	    'viewButtonUrl'=>'Yii::app()->createUrl("/servidor/'.$nextPage.'", array("id" => $data->id))',
	),*/
    ),
));
?>
