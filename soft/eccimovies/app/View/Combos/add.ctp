<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
?>

<div class="combos form">
<?php echo $this->Form->create('Combo'); ?>
	<fieldset>
		<legend><?php echo __('Add Combo'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('discount');
		echo $this->Form->input('Product');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Add')); ?>

	<p>
	<?php 
		echo "<li id = 'fom-button'>"; 
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-arrow-left"></span> Back ',
			array('action' => 'index'),
			array('target' => '_self', 'escape' => false)
		);
		echo "</li>";
	?>
	</p>

</div>
