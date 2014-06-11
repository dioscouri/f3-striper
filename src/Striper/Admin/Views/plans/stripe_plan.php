<div class="row">
    <div class="col-md-2">
    
        <h3>Required</h3>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
    	 <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Name</label>
                    <input type="text" name="stripe[name]" value="<?php echo $flash->old('stripe.name'); ?>" class="form-control" />
                	<p class="help-block">Name of the plan, to be displayed on invoices and in the web interface.</p>
                </div> 
            </div>        
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>ID</label>
                    <input type="text" name="stripe[id]" value="<?php echo $flash->old('stripe.id'); ?>" class="form-control" />
                	<p class="help-block">Unique string of your choice that will be used to identify this plan when subscribing a customer. This could be an identifier like "gold" or a primary key from your own database.</p>
                </div> 
            </div>        
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Amount</label>
                    <input type="number" name="stripe[amount]" value="<?php echo $flash->old('stripe.amount'); ?>" class="form-control" /> // in cents (ie $20.00 == 2000)
                	<p class="help-block">A positive integer in cents (or 0 for a free plan) representing how much to charge (on a recurring basis).</p>
                	
                </div> 
            </div>        
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Currency</label>
                    <input type="text" name="stripe[currency]" value="<?php echo $flash->old('stripe.currency'); ?>" class="form-control" />
                	<p class="help-block">3-letter ISO code for currency.</p>
                	
                </div> 
            </div>        
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Interval</label>
                    <?php $intervals = array('week','month','year'); ?>
                    <select name="stripe[interval]">
                    <?php echo   \Dsc\Html\Select::options($intervals, $flash->old('stripe.interval'));?>
                    </select>
                	<p class="help-block">3-letter ISO code for currency.</p>
                	
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
        <p class="help-block">Options</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
    
       <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Interval Count</label>
                    <input type="text" name="stripe[interval_count]" value="<?php echo $flash->old('stripe.interval_count'); ?>" class="form-control" />
                	<p class="help-block">The number of intervals between each subscription billing. For example, interval=month and interval_count=3 bills every 3 months. Maximum of one year interval allowed (1 year, 12 months, or 52 weeks).</p>
                	
                </div> 
            </div>        
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Trial Period Days</label>
                    <input type="text" name="stripe[trial_period_days]" value="<?php echo $flash->old('stripe.trial_period_days'); ?>" class="form-control" />
                	<p class="help-block">Specifies a trial period in (an integer number of) days. If you include a trial period, the customer won't be billed for the first time until the trial period ends. If the customer cancels before the trial period is over, she'll never be billed at all.</p>
                	
                </div> 
            </div>        
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label>Statement Description</label>
                    <input type="text" name="stripe[statement_description]" value="<?php echo $flash->old('stripe.statement_description'); ?>" class="form-control" />
                	<p class="help-block">An arbitrary string to be displayed on your customers' credit card statements (alongside your company name) for charges created by this plan. This may be up to 15 characters. As an example, if your website is RunClub and you specify Silver Plan, the user will see RUNCLUB SILVER PLAN. The statement description may not include <>"' characters. While most banks display this information consistently, some may display it incorrectly or not at all.</p>
                	
                </div> 
            </div>        
        </div>
        <hr />
    
       
            
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />

<?php // echo $this->renderLayout('Striper/Admin/Views::paymentrequests/fields_basics_publication.php'); ?>

<?php // echo $this->renderLayout('Striper/Admin/Views::paymentrequests/fields_basics_categories.php'); ?>

<?php // echo $this->renderLayout('Striper/Admin/Views::paymentrequests/fields_basics_tags.php'); ?>