<div class="row">
    <div class="col-md-2">
    
        <h3>Required</h3>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
    
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Select Subscription Plan</label>
                    <select name="plan">
                    <?php 
                    $plans = (new \Striper\Models\Plans)->getItems(); 
                    $options = array();
                    foreach($plans as $plan) {
                      $options[] = array('value' => $plan->{'stripe.id'}, 'text' => $plan->{'stripe.name'} ); 
                    }

                    ?>

                     <?php echo \Dsc\Html\Select::options($options ,$flash->old('plan')); ?>   
                    </select>

                </div> 
            </div>        
        </div>
        <!-- /.form-group -->
        
    </div>
    
</div>
    
<hr />

<div class="row">
    <div class="col-md-2">
    
        <h3>Optional</h3>
        <p class="help-block">Details about this payment Request</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
    
        <div class="form-group">
            <label>Invoice Number</label>
            <input type="text" name="number" value="<?php echo $flash->old('number'); ?>" class="form-control" />
            <p class="help-block">Use your invoice number to create a custom URL<?php if ($flash->old('number')) { ?>, which is currently <a target="_blank" href="./striper/subscription/number/<?php echo $flash->old('number'); ?>">/striper/subscription/number/<?php echo $flash->old('number'); ?></a><?php } ?>
            <?php if ($flash->old('_id')) { ?><p class="help-block">Otherwise, your URL is: <a target="_blank" href="./striper/subscription/<?php echo $flash->old('_id'); ?>">/striper/subscription/<?php echo $flash->old('_id'); ?></a><?php } ?>
        </div>
        <!-- /.form-group -->
        
        <hr />
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="<?php echo $flash->old('title'); ?>" class="form-control" />
        </div>
        <!-- /.form-group -->
       
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?php echo $flash->old('description'); ?></textarea>
            <p class="help-block">This is for internal use only.</p>
        </div>
        <!-- /.form-group -->
        
        <hr />
       
        <div class="form-group">
            <label>Message to Client</label>
            <p class="help-block">This is displayed to the client making the payment.</p>
            <textarea name="copy" class="form-control wysiwyg"><?php echo $flash->old('copy'); ?></textarea>            
        </div>
        <!-- /.form-group -->
            
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />

