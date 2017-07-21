<?php include "header.php";?>

<div class="container" ng-controller="registerController">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" ng-submit="uploader.queue[0].upload()">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" ng-model="username" name="name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" ng-model="email" name="email" value="" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" ng-model="password" name="password" required>
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" ng-model="confirmPassword" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file" class="col-md-4 control-label">Choose Profile Picture</label>
                            <div class="col-md-6">
                                <label class="custom-file">
                                    <input type="file" id="file" name="file" nv-file-select uploader="uploader" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";?>