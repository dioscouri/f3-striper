<div class="row">
    <div class="col-md-2">
    
        <h3>Payment Items</h3>
        <p class="help-block">Details about this payment Request</p>
                
    </div>
    <!-- /.col-md-2 -->
                
    <div class="col-md-10">
<table id="billing-items">
<thead>
    <th>description</th>
    <th>quantity</th>
    <th>rate</th>
    <th></th>
</thead>
<tbody>
        <?php foreach ((array) $flash->old('items') as $key=>$item) { ?>
          <tr id="item-<?php echo $key; ?>">
            <td><input type="text" name="items[<?php echo $key ?>][description]" placeholder="Name" value="<?php echo $flash->old('items.'.$key.'.description'); ?>" class="form-control" />
</td>
            <td><input type="number" name="items[<?php echo $key ?>][quantity]" placeholder="Quantity" value="<?php echo $flash->old('items.'.$key.'.quantity'); ?>" class="form-control" />
</td> 
            <td><input type="numuber" name="items[<?php echo $key ?>][rate]" placeholder="Rate" value="<?php echo $flash->old('items.'.$key.'.rate'); ?>" class="form-control" />
</td> 
            <td><a class="remove-item btn btn-xs btn-danger pull-right" onclick="StriperRemoveBillingItem(this);" href="javascript:void(0);">
                <i class="fa fa-times"></i>
            </a>
            </td>     
            
     </tr>                        
    <?php } ?>
   <tbody>
</table>
   
    <template type="text/template" id="add-item-template">
        <tr id="item-{id}">
            <td><input type="text" name="items[{id}][description]" placeholder="Name" value="" class="form-control" />
</td>
            <td><input type="number" name="items[{id}][quantity]" placeholder="Quantity" value="" class="form-control" />
</td> 
            <td><input type="numuber" name="items[{id}][rate]" placeholder="Rate" value="" class="form-control" />
</td> 
            <td><a class="remove-item btn btn-xs btn-danger pull-right" onclick="StriperRemoveBillingItem(this);" href="javascript:void(0);">
                <i class="fa fa-times"></i>
            </a>
            </td>     
        </tr>        
    </template>

    <div class="form-group">
        <a class="btn btn-warning" id="add-item">Add New Item</a>
    </div>
    
    <div id="new-items" class="form-group"></div>
    
    <script>
    jQuery(document).ready(function(){
        window.new_items = <?php echo count( $flash->old('items') ); ?>;
        jQuery('#add-item').click(function(){
            var container = jQuery('#billing-items tbody');
            var template = jQuery('#add-item-template').html();
            template = template.replace( new RegExp("{id}", 'g'), window.new_items);
            container.append(template);
            window.new_items = window.new_items + 1;
                                 
        });

        StriperRemoveBillingItem = function(el) {
            console.log(el)
            jQuery(el).parents('tr').remove();                            
        }

    });
    </script>
        
       
    
    </div>
    <!-- /.col-md-10 -->
</div>
<!-- /.row -->

<hr />