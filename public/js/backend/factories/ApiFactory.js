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
