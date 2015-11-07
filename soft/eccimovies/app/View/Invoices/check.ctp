<?php echo $this->Html->css('invoice'); ?>

<?php if($custom): ;?> 
    <h1 id='nothing'> You do not have sufficient funds... </h1>
<?php endif; ?>
            
<div class="row text-right">  
    <div class="col-md-8">
        <button id="pay-button" onclick="window.location.href='<?php echo Router::url(array( 'action'=>'index'))?>'">Try Again</button>
    </div> 
</div> 