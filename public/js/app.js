var app = angular.module('dfjApp',['ui.bootstrap.showErrors'])
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

    });
