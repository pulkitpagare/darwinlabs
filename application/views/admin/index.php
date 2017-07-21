<?php include "header.php";?>

<div class="container" ng-controller="adminController" ng-init="bootUp()">
    <h3>Users List</h3>
    <div class="form-group">
        <label for="usr">Search:</label>
        <input type="text" ng-model="searchUsername" required class="form-control" id="usr">
    </div>
    <div class="box">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>S. No.</th>
                <th>Username</th>
                <th>Created At</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="user in usersData | filter : searchUsername" total-items="totalItems">
                <td ng-bind="$index+1+(currentPage*10)"></td>
                <td><span ng-bind="user.username"></span> </td>
                <td ng-bind="user.created_at | amCalendar:referenceTime:formats"></td>
                <td ng-bind="user.email"></td>
                <td>
                    <button ng-click="editDialog($index)" class="btn btn-info btn-sm"><i class="fa fa-check-circle-o"></i> Edit</button>
                </td>
                <td>
                    <button ng-click="deleteUser(user.id)" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <ul uib-pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()"></ul>
</div>
<script type="text/ng-template" id="editDialog">
    <h1>Edit User</h1>
    <form ng-submit="updateUser()">
        <div class="form-group">
            <label for="usr">Username:</label>
            <input type="text" ng-model="username" required class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label for="usr">Email:</label>
            <input type="text" ng-model="email" required class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label for="usr">Password:</label>
            <input type="text" ng-model="password" required class="form-control" id="usr">
        </div>
        <div class="form-group">
            <input type="submit" value="submit"/>
        </div>
    </form>
</script>
<?php include "footer.php";?>

