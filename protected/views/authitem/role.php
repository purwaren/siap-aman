<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Hak Akses'=>array('index'),
	'Perbarui Akses',
);

$this->menu=array(
	array('label'=>'Pengaturan Akses', 'url'=>array('index')),
	array('label'=>'Pengaturan Peran', 'url'=>array('admin')),
);
?>

<h1>Pengaturan Peran : <?php echo $model->name?></h1>

<div class="form grid-view">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authitem-form',
	'enableAjaxValidation'=>false,
));
?>
	<p class="note">Anda bisa menambahkan atau mencabut akses yang sudah dimiliki oleh peran ini.</p>
	
	<?php
	$row_data=''; 
	foreach($class as $row){
		$sql = 'SELECT * FROM authitem WHERE name like :name ORDER BY name ASC';
		$items = Authitem::model()->findAllBySql($sql,array(
			':name'=>$row['name'].'_%'
		));
		$i=0;
		
		foreach($items as $item)
		{
			$access = $parent->hasChild($item['name']);
			if($i==0)
			{
				$row_data .= '<tr><td rowspan="'.count($items).'">'.ucfirst($row['name']).'</td>
						<td>'.CHtml::checkBox('authitem[]',$access,array('value'=>$item['name'])).'&nbsp;'.$item['name'].'</td>
						<td>'.$item['description'].'</td>';
			}
			else
			{
				$row_data .= '<tr><td>'.CHtml::checkBox('authitem[]',$access,array('value'=>$item['name'])).'&nbsp;'.$item['name'].'</td>
						<td>'.$item['description'].'</td></tr>';
			}
			$i++;
		}
		
	}?>
	<table class="items">
		<thead>
			<tr>
				<th>Kategori</th>
				<th>Item Hak Akses</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php echo $row_data?>
		</tbody>
	</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Simpan',array('name'=>'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

