<h4>Email Settings</h4>
                    
                    <hr />

				<div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Mode</label>
                                <select name="mode" class="form-control">
                                    <option value="test" <?php if ($flash->old('mode') == 'test') { echo "selected='selected'"; } ?>>Test</option>
                                    <option value="live" <?php if ($flash->old('mode') == 'live') { echo "selected='selected'"; } ?>>Live</option>
                                </select>                                                        
                            </div>
                            <div class="col-md-9">
                                                                
                            </div>
                        </div>                        
                    </div>
                    <!-- /.form-group -->                    
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Test Secret Key</label>
                                <input name="test[secret_key]" placeholder="Test Secret Key" value="<?php echo $flash->old('test.secret_key'); ?>" class="form-control" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label>Test Publishable Key</label>
                                <input name="test[publishable_key]" placeholder="Test Publishable Key" value="<?php echo $flash->old('test.publishable_key'); ?>" class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Live Secret Key</label>
                                <input name="live[secret_key]" placeholder="Live Secret Key" value="<?php echo $flash->old('live.secret_key'); ?>" class="form-control" type="text" />
                            </div>
                            <div class="col-md-6">
                                <label>Live Publishable Key</label>
                                <input name="live[publishable_key]" placeholder="Live Publishable Key" value="<?php echo $flash->old('live.publishable_key'); ?>" class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    