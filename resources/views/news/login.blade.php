<x-navigation :navigation="False" :panel="False"/>

<div class="container">
        <div class="row justify-content-center p-2">
            <div class="col-3 col-sm-6">
                <div class="row no-gutters">
                    <div class="p-5 bg-white col">
                        <div class="text-center mb-5  pt-4">
                            <img src="img/kmedia.png" class="img-fluid logo2" alt="LOGO">
                            <h5 class="mt-3 mb-3">Welcome to K-Media News</h5>
                            
                        </div>
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="text-center" id="errorshow" style="color:red"></div><br>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control user" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control pass" placeholder="Password">
                        </div>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" id="loginadmin" class="btn btn-outline-primary btn-block btn-lg logsub">Log
                                        In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   