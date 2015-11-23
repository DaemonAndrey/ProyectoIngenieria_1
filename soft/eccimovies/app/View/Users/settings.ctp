<?php echo $this->Html->css('addresses'); ?>
<?php echo $this->Html->css('general'); ?> 
<?php
// Si soy cliente
if($user_id != null && $custom)
{
	?>
    <nav class="navbar navbar-inverse" id="navigation-bar">
      <div class="container-fluid">
        <div>
          <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="active"><?php echo $this->Html->link('Account Settings',array('controller' => 'users', 'action' => 'settings'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><a href="#", class="nav-buttons">Wishlist</a></li>  
          </ul>
        </div>
      </div>
    </nav>
	
	<div class="_index">
        <hr>
		<h2><?php echo __('Account Settings'); ?></h2>
        <hr>
		
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo ('First Name'); ?></th>
					<th><?php echo ('Last Name'); ?></th>

					<th class="actions"><?php echo __('Details'); ?></th>
					<th class="actions"><?php echo __('Update'); ?></th>
					<th class="actions"><?php echo __('Delete'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($settings as $uaddress):
                if( $uaddress['User']['id'] === $user_id)
                {
                    ?>
                    <tr>
					<td><?php echo h($uaddress['User']['first_name']); ?>&nbsp;</td>
					<td><?php echo h($uaddress['User']['last_name']); ?>&nbsp;</td>
					<td>
						<?php
							echo $this->Html->link(
								'<i class="glyphicon glyphicon-eye-open"></i>',
								array('action' => 'view', $uaddress['User']['id']),
								array('escape' => false)
							);
						?>
					</td>
					<td>
						<?php
							echo $this->Html->link(
								'<i class="glyphicon glyphicon-pencil"></i>',
								array('action' => 'edit', $uaddress['User']['id']),
								array('escape' => false)
							);
						?>
					</td>
					<td>
						<?php
							echo $this->Form->postLink(
								'<i class="glyphicon glyphicon-trash"></i>',
								array('action' => 'delete', $uaddress['User']['id']),
								array(
									'escape' => false,
									'confirm' => __('Are you sure you want to delete your account?', $uaddress['User']['id'])
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