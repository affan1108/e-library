var modules = [];
var backApp = angular.module('app.backend', modules);
backApp
// Parse to select2
.directive('ngSelect2', function($timeout) {
  return {
    restrict: 'A',
    scope: {
      // placeholder: '@',
      ngModel: '='
    },
    link: function(scope, element, attr, ctrl) {
        // $(element).select2({
        //     placeholder: scope.placeholder
        // });

        // Detech change on model
        scope.$watch('ngModel', function(newValue, oldValue) {
            $timeout(function() {
                $(element).val(scope.ngModel);
                $(element).change();
            }, 200)
        })
    }
  }
});
'use strict';

angular.module('app.backend').factory('ApiFactory', ApiFactory);

function ApiFactory($http, $httpParamSerializer) {
    var Api = {
        Department: {
            getUsers: function (departmentId) {
                return $http({
                    method: 'GET',
                    url: '/api/department/'+departmentId+'/user?token='+TOKEN
                });
            }
        },

        // ==== User Right ====
        UserRight: {
            saveTransaction: function (memberId, listChart, total) {
                var data = {
                    'memberId': memberId,
                    'listChart': listChart,
                    'total': total,
                };
                return $http({
                    method: 'POST',
                    url: '/api/transaction/save-transaction?token='+TOKEN,
                    headers: {
                        'X-CSRF-TOKEN': CSRF
                    },
                    'data': data
                });
            },
        }
    };

    return Api;
};

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
