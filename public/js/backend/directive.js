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