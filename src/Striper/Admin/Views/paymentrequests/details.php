<div class="row">
    <div class="col-md-2">
    
        <h3>Details</h3>
        <p class="help-block">Details about this payment Request</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
    
        <div class="form-group">
            <div class="row">
                <div class="col-md-9">
                    <label>Invoice Number</label>
                    <input type="text" name="number" value="<?php echo $flash->old('number'); ?>" class="form-control" />
                    <p class="help-block">This determines the page's URL<?php if ($flash->old('number')) { ?>, which is currently <a target="_blank" href="./striper/paymentrequest/number/<?php echo $flash->old('number'); ?>">/striper/paymentrequest/number/<?php echo $flash->old('number'); ?></a><?php } ?>
                </div>
                <div class="col-md-3">
                    <label>Amount</label>
                    <input type="text" name="amount" value="<?php echo $flash->old('amount'); ?>" class="form-control" />
                </div> 
            </div>        
        </div>
        <!-- /.form-group -->
    
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
       
        <div class="form-group">
            <label>Message to Client</label>
            <textarea name="copy" class="form-control wysiwyg"><?php echo $flash->old('copy'); ?></textarea>
            <p class="help-block">This is displayed to the client making the payment.</p>
        </div>
        <!-- /.form-group -->
            
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />

<?php // echo $this->renderLayout('Striper/Admin/Views::paymentrequests/fields_basics_publication.php'); ?>

<?php // echo $this->renderLayout('Striper/Admin/Views::paymentrequests/fields_basics_categories.php'); ?>

<?php // echo $this->renderLayout('Striper/Admin/Views::paymentrequests/fields_basics_tags.php'); ?>