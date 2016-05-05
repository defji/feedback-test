var compareTo = function() {
    return {
        require: "ngModel",
        scope: {
            otherModelValue: "=compareTo"
        },
        link: function(scope, element, attributes, ngModel) {

            ngModel.$validators.compareTo = function(modelValue) {
                return modelValue == scope.otherModelValue;
            };

            scope.$watch("otherModelValue", function() {
                ngModel.$validate();
            });
        }
    };
};


var app = angular.module('dfjApp',['ui.bootstrap.showErrors'])
    .directive("compareTo", compareTo)
    .controller('FeedbackCtrl',function($scope,$http) {

        $scope.save = function() {
            console.log('save');
            $scope.$broadcast('show-errors-check-validity');
            console.log($scope.feedbackForm);

            if ($scope.feedbackForm.$valid) {
                // save the user
            } else {
                console.log('jajj');
            }
        }

    })

