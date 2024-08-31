"use strict";

angular.module('app.backend').controller('UserController', UserController);

function UserController($scope, $http, $httpParamSerializer) {
    $scope.user = null;
    $scope.nama = 'awank';
};
