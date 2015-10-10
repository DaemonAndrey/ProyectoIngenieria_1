<h1 style="color:white"><?php echo utf8_encode($catego['Category']['category_name']);?></h1>

<div class="row text-center">
	<div class="col-xs-12">
		<?php echo $this->Html->image($catego['Category']['id'].'.jpg',array('alt' => 'Prueba','style'=>'width:200px;height:300px','class'=>'img-rounded')); ?>
	</div>
	
</div>
