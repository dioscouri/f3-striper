<div class="row">
    <div class="col-md-2">
    
        <h3>Site</h3>
        <p class="help-block">Site Settings</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="title" placeholder="Name" value="<?php echo $flash->old('title'); ?>" class="form-control" />
        </div>
        <!-- /.form-group -->
         <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" placeholder="" value="<?php echo $flash->old('description'); ?>" class="form-control" />
        </div>
        <!-- /.form-group -->

         <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Display</label>
                    
                    <select name="display">
                    <?php echo   \Dsc\Html\Select::options(array('yes','no'), $flash->old('site.display'));?>
                    </select>
                	<p class="help-block">Show on site</p>
                	
                </div> 
            </div>        
        </div>
       
    
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />