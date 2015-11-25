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
            <li><?php echo $this->Html->link('Account Settings',array('controller' => 'users', 'action' => 'settings'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Your Orders',array('controller' => 'invoices', 'action' => 'my_invoices'), array('class' => 'nav-buttons')); ?></li>
            <li><?php echo $this->Html->link('Payment Methods',array('controller' => 'paymentMethods', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li class="active"><?php echo $this->Html->link('Address Book', array('controller' => 'addresses', 'action' => 'index'), array('class' => 'nav-buttons')); ?></li>
            <li><?php
                    $options = array('controller'=>'wishlists','action' => 'edit', -1);
					if(isset($_SESSION['Auth']['User']['wishlist']))
                    {
                        $options = array('controller'=>'wishlists','action' => 'edit', $_SESSION['Auth']['User']['wishlist']);
					}
					echo $this->Html->link(	'Wishlist',
                                           $options,
                                           array('target' => '_self',
                                                 'escape' => false,
                                                 'class' => 'nav-buttons'
                                                )
                                          )
                ?>
              </li>  
          </ul>
        </div>
      </div>
    </nav>
	
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