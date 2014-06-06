<div class="row">
    <div class="col-md-2">
    
        <h3>Payment Items</h3>
        <p class="help-block">Details about this payment Request</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
		<div class="well"> TODO make dynamic, variable</div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="items[0][description]" placeholder="Name" value="<?php echo $flash->old('items.0.description'); ?>" class="form-control" />
        </div>
        <!-- /.form-group -->

        <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="items[0][quantity]" placeholder="Quantity" value="<?php echo $flash->old('items.0.quantity'); ?>" class="form-control" />
           
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label>Rate</label>
            <input type="text" name="items[0][rate]" placeholder="Rate" value="<?php echo $flash->old('items.0.rate'); ?>" class="form-control" />
           
        </div>
        <!-- /.form-group -->
        <hr>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="items[1][description]" placeholder="Name" value="<?php echo $flash->old('items.1.description'); ?>" class="form-control" />
        </div>
        <!-- /.form-group -->

        <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="items[1][quantity]" placeholder="Quantity" value="<?php echo $flash->old('items.1.quantity'); ?>" class="form-control" />
           
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label>Rate</label>
            <input type="text" name="items[1][rate]" placeholder="Rate" value="<?php echo $flash->old('items.1.rate'); ?>" class="form-control" />
           
        </div>
        <!-- /.form-group -->
    
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />