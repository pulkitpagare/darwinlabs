app.controller('registerController', function ($scope ,baseAuthUrl,service,FileUploader) {
    var uploader = $scope.uploader = new FileUploader({
        alias : 'file',
        url : baseAuthUrl + 'register',
        removeAfterUpload : false,
    });

    uploader.onBeforeUploadItem = function(item) {
        $scope.showProgress = true;
        item.formData.push({
            username : $scope.username,
            email : $scope.email,
            password : $scope.password,
            confirmPassword : $scope.confirmPassword,
        });
    };
    uploader.onProgressItem = function(fileItem, progress) {
        $scope.uploadProgress = progress;
    };
    uploader.onProgressAll = function(progress) {
        // console.info('onProgressAll', progress);
    };
    uploader.onSuccessItem = function(fileItem, response, status, headers) {
        if(response.status){
            toastr.success(response.message,"Registration");
            setTimeout(function(){ window.location = baseAuthUrl + 'login'; }, 5000);


        }else{
            for (var key in response.errors) {
                if (response.errors.hasOwnProperty(key)) {
                    toastr.error(response.errors[key],key);
                }
            }
        }
    };
    uploader.onErrorItem = function(fileItem, response, status, headers) {
        console.info('onErrorItem', fileItem, response, status, headers);
        toastr.error(response.message.title,response.message.description);
    };
    uploader.onCancelItem = function(fileItem, response, status, headers) {
        // console.info('onCancelItem', fileItem, response, status, headers);
    };
    uploader.onCompleteItem = function(fileItem, response, status, headers) {
        // console.info('onCompleteItem', fileItem, response, status, headers);
    };
    uploader.onCompleteAll = function() {
        // console.info('onCompleteAll');
    };

})