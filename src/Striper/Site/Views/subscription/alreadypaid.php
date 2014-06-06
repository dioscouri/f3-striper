<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>
        
<div class="container">
        

        <h1>Already Paid. </h1>
    <?php if (!empty($subscription->title)) { ?>
            <div class="panel-heading">
                <h1 class="panel-title">
                    <?php echo $subscription->title; ?>
                </h1>
            </div>
        <?php } ?>
    
    <hr />
   
    
    <div class="panel panel-default">
        
        
        <div class="panel-body">
            <?php if (!empty($subscription->copy)) { ?>
                <div>        
                    <?php echo $subscription->copy; ?>
                </div>
                
                <hr/>
            <?php } ?>

        </div>
    
    </div>
    
</div>
