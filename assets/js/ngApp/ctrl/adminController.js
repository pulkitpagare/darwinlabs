app.controller('adminController',function ($scope,service,ngDialog,baseUrl) {
    $scope.totalItems = 14;
    $scope.itemsPerPage = 5;
    $scope.usersData = [];
    $scope.groups = {};
    $scope.count = 0;
    $scope.currentPage = 0;

    $scope.bootUp = function () {
        getUsers();
    }

    function getUsers() {
        service.getAllUsers({currentPage:$scope.currentPage}).then(function (response) {
            $scope.usersData = response.data.data;
            $scope.totalItems = response.data.total;
        },function (response) {
            console.log(response.data);
        });
    }
    
    $scope.editDialog = function (id) {
        $scope.id = $scope.usersData[id].id;
        $scope.username = $scope.usersData[id].username;
        $scope.email = $scope.usersData[id].email;
        $scope.dialog = ngDialog.open({
            template : 'editDialog',
            controller : 'adminController',
            scope : $scope,
        });
    }
    $scope.pageChanged = function () {
        service.getAllUsers({currentPage:$scope.currentPage}).then(function (response) {
            $scope.usersData = response.data.data;
            $scope.totalItems = response.data.total;
        },function (response) {
            console.log(response.data);
        });
    }

    $scope.updateUser = function () {
        console.log($scope.id);
        console.log($scope.username);
        service.updateUser({
            id: $scope.id ,
            username : $scope.username,
            email : $scope.email,
            password:$scope.password
        }).then( function success(response) {
            if(response.data.status){
                toastr.success("User has been Updated");
                getUsers();
                $scope.dialog.close();
                setTimeout(function(){ location.reload(); }, 3000);

            }
        }, function fai(response) {
            console.log(response);
        })
    }

    $scope.deleteUser = function (id) {
        service.deleteUser({
            id:id,
        }).then(function success(response) {
           if(response.data.status){
               toastr.success("User has been Deleted");
               getUsers();
               setTimeout(function(){ location.reload(); }, 5000);
           }
        }, function (response) {

        });
    }
});
