<div class="row">
    <div class="col-md-2">
    
        <h3>Client</h3>
        <p class="help-block">Client Information</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="client[name]" placeholder="Name" value="<?php echo $flash->old('client.name'); ?>" class="form-control" />
        </div>
        <!-- /.form-group -->

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="client[email]" placeholder="Email" value="<?php echo $flash->old('client.email'); ?>" class="form-control" />
           
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label>Company</label>
            <input type="text" name="client[company]" placeholder="Company" value="<?php echo $flash->old('client.company'); ?>" class="form-control" />
           
        </div>
        <!-- /.form-group -->
    
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />