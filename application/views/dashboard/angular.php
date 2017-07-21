<!-- Library Files -->
<script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/js/ngApp/ngModules/toaster.min.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/angular.min.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/angular-file-upload.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/dirPagination.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/moment.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/ngDialog.min.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/ui-bootstrap-tpls-2.5.0.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/angular-moment.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/ng-twitter-api.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ngModules/sha512.js')?>"></script>


<script src="<?= base_url('assets/js/ngApp/app.js')?>"></script>
<!-- Angular Controller -->
<script>
    app.factory('baseAuthUrl', function(){
        return "<?= base_url('/auth/')?>";
    });
    app.factory('baseUrl', function(){
        return "<?= base_url('/')?>";
    });
</script>
<script src="<?= base_url('assets/js/ngApp/ctrl/loginController.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ctrl/registerController.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ctrl/adminController.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/ctrl/dashboardCtrl.js')?>"></script>
<script src="<?= base_url('assets/js/ngApp/service.js')?>"></script>
