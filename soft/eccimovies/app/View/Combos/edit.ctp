<?php
	echo $this->Html->css('addresses');
	echo $this->Html->css('general');
	echo $this->Html->css('product');
	//echo $this->Html->css('signup');
?>

	<hr>

	<div class="title">
	<h2> <?php echo __('Edit combo'); ?> </h2>
	</div>

	<hr>

<div class="combos form">
<?php echo $this->Form->create('Combo', array('class' => 'form-horizontal', 'role' => 'form')); ?>
	<fieldset>
    <div class="updateProduct_form">
	<?php
		echo $this->Form->input('id',
			array(
				'div' => 'form-group',
				'label' => array(
					'class' => 'control-label col-sm-2'
				)
			)
		);
		echo $this->Form->input('code',
			array(
				'div' => 'form-group',
				'autofocus' => 'autofocus',
				'label' => array(
					'class' => 'control-label col-sm-2'
				)
			)
		);
		echo $this->Form->input('name',
			array(
				'div' => 'form-group',
				'label' => array(
					'class' => 'control-label col-sm-2'
				)
			)
		);
		echo $this->Form->input('discount',
			array(
				'div' => 'form-group',
				'label' => array(
					'class' => 'control-label col-sm-2'
				)
			)
		);
	?>
	</div>
	</fieldset>
	<hr>
	<div id= "action" style="text-align:center">
		<?php echo $this->Form->submit(__('Add', true), array('name' => 'ok', 'div' => false)); ?>
		&nbsp;
		<?php echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel', 'formnovalidate' => true, 'div' => false)); ?>
	</div>

	<fieldset>
	<?php
		echo $this->Form->input('Product',
			array(
				//'div' => 'form-group',
				'multiple' => 'checkbox',
				'label' => 'Modify product list',
				/*'label' => array(
					'class' => 'control-label col-sm-2'
				)*/
			)
		);
	?>
	</fieldset>

	<?php echo $this->Form->end(); ?>

	<hr>
	<p>
	<?php
		echo "<div id = 'goBack'>";
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-arrow-left"></span> Go back',
			array('action' => 'index'),
			array('class' => 'btn btn-default', 'target' => '_self', 'escape' => false)
		);
		echo "</div>";
	?>
	</p>

</div>
