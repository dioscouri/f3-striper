<?php 
	$opts = array(
			array( 'value' => 1, 'text' => 'Yes' ),
			array( 'value' => 0, 'text' => 'No' ),
	);

?>

        <div class="row">
            <div class="col-md-2">

                <h3>Striper</h3>

            </div>
            <!-- /.col-md-2 -->

            <div class="col-md-10">

                <div class="form-group">
                    <label>Enabled?</label>
                    <select name="social[providers][Striper][enabled]" class="form-control">
                    	<?php  echo \Dsc\Html\Select::options( $opts, $item->{'social.providers.Striper.enabled'} ); ?>
                    </select>
                
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label>Client ID</label>
                    <input type="text" name="social[providers][Striper][keys][id]" placeholder="Client ID" value="<?php echo $item->{'social.providers.Instagram.keys.id'}; ?>" class="form-control" />
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label>Client Secret</label>
                    <input type="text" name="social[providers][Striper][keys][secret]" placeholder="Client Secret" value="<?php echo$item->{'social.providers.Instagram.keys.secret'}; ?>" class="form-control" />
                </div>
                <!-- /.form-group -->

            </div>
            <!-- /.col-md-10 -->

        </div>
        <!-- /.row -->
        
        <hr />
