app.controller('loginController', function (baseUrl,$scope, service) {

    $scope.authenticate = function () {
        service.authenticate({
            email : $scope.email,
            password : $scope.password
        }).then(function success(response){
            if(response.data.status){
                window.location = baseUrl + response.data.data;
            }else{
                for (var key in response.data.errors) {
                    if (response.data.errors.hasOwnProperty(key)) {
                        toastr.error(response.data.errors[key],"Login Failed");
                    }
                }
            }
        }, function failure(response) {
            console.log(response.data);
        });

    }
})