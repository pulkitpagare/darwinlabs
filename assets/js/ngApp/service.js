app.service('service', function (baseAuthUrl,baseUrl,$http) {
    this.authenticate = function (data) {
        return $http({
            url : baseAuthUrl + 'login',
            data : data,
            method : 'POST',
            headers: {'Content-Type': 'application/json'}
        });
    }

    this.getAllUsers = function (data) {
        return $http({
            url : baseUrl + "admin/getAllUsers",
            data : data,
            method : 'POST',
        });
    }

    this.updateUser = function (data) {
        return $http({
            url : baseUrl + 'admin/updateUser',
            data:data,
            method : 'POST',
        });
    }

    this.deleteUser =function (data) {
        return $http({
            url : baseUrl + 'admin/deleteUser',
            data:data,
            method:'POST',
        });
    }
    this.search = function (data) {
        return $http({
            url : baseUrl + 'dashboard/search',
            data:data,
            method:'POST',
        });
    }
})