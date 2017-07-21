app.controller('dashboardCtrl', function ($scope,service) {
    $scope.searchUsername = "";
    $scope.totalItems = 3;
    $scope.itemsPerPage = 5;
    $scope.tweets = [{text:"PULKIT is great",source : "<a href='http://pulkit.com'>Pulkit</a>",retweet_count:'140'}
    ,{text:"PULKIT is great",source : "<a href='http://pulkit.com'>Pulkit</a>",retweet_count:'140'}
    ,{text:"PULKIT is great",source : "<a href='http://pulkit.com'>Pulkit</a>",retweet_count:'140'}];
    $scope.groups = {};
    $scope.count = 0;
    $scope.currentPage = 0;
    $scope.search = function () {
        service.search({
            search:$scope.searchUsername
        }).then(function (response) {
            console.log(response.data);
            $scope.tweets = response.data;
            $scope.totalItems = $scope.tweets.length;
        }, function (response) {
            console.log(response.data);
        });
    }

});