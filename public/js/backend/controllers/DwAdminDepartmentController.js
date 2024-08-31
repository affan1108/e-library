"use strict";

angular.module('app.backend').controller('DwAdminDepartmentController', DwAdminDepartmentController);

function DwAdminDepartmentController($http, ApiFactory) {
    $scope = this;

    this.department_id = null;
    this.listUsers = [];

    this.getListUser = function () {
    	ApiFactory.Department.getUsers(this.department_id)
    	.then(function (res) {
    		$scope.listUsers = res.data.data;
    	}, function errorCallback(res) {
    		$scope.listUsers = [];
    	});
    }
};
