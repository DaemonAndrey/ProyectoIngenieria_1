<?php echo $this->Html->css('addresses'); ?>
<?php
// Si soy cliente
if($user_id != null && $custom)
{
	?>
	
	<div class="_index">
        <hr>
		<h2><?php echo __('Manage Address Book'); ?></h2>
        <hr>
		
        <p>
        <?php 
			echo "<li id = 'fom-button'>"; 
			echo $this->Html->link(	'<span class="glyphicon glyphicon-plus"></span> Add address ',
									array('controller'=>'addresses','action' => 'add'),
									array('target' => '_self', 'escape' => false)
								);
								
			echo "</li>";
			?>
        </p>
        
        <hr>
		
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo ('Country'); ?></th>
					<th><?php echo ('State'); ?></th>
		<!--
					<th><?php echo ('full_address'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
		-->
					<th><?php echo ('Type'); ?></th>
					<th class="actions"><?php echo __('Details'); ?></th>
					<th class="actions"><?php echo __('Update'); ?></th>
					<th class="actions"><?php echo __('Delete'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($addresses as $uaddress):
                if( $uaddress['Address']['user_id'] === $user_id)
                {
                    ?>
                    <tr>
					<td><?php echo h($uaddress['State']['Country']['name']); ?>&nbsp;</td>
					<td><?php echo h($uaddress['State']['name']); ?>&nbsp;</td>
					<td><?php echo h($uaddress['Address']['type']); ?>&nbsp;</td>
					<td>
						<?php
							echo $this->Html->link(
								'<i class="glyphicon glyphicon-eye-open"></i>',
								array('action' => 'view', $uaddress['Address']['id']),
								array('escape' => false)
							);
						?>
					</td>
					<td>
						<?php
							echo $this->Html->link(
								'<i class="glyphicon glyphicon-pencil"></i>',
								array('action' => 'edit', $uaddress['Address']['id']),
								array('escape' => false)
							);
						?>
					</td>
					<td>
						<?php
							echo $this->Form->postLink(
								'<i class="glyphicon glyphicon-trash"></i>',
								array('action' => 'delete', $uaddress['Address']['id']),
								array(
									'escape' => false,
									'confirm' => __('Are you sure you want to delete # %s?', $uaddress['Address']['id'])
								)
							);
						?>
					</td>
				</tr>
                <?php
                }
                endforeach;
                unset($uaddress);
				?>
			</tbody>
		</table>
        <hr>
	</div>
	<?php
}
// Si soy administrador o gerente
if($user_id != null && !$custom)
{
	?> <h1> NOTHING TO SEE HERE... </h1> <?php
}
// Si no estoy loggeado o soy manager
if($user_id == null)
{
	?> <h1> PLEASE LOGIN OR SIGNUP </h1> <?php
}
?>