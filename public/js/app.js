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

var ageCheck = function() {
    return {
        // restrict to an attribute type.
        restrict: 'A',
        // element must have ng-model attribute.
        require: 'ngModel',
        link: function(scope, ele, attrs, ctrl){

            // add a parser that will process each time the value is
            // parsed into the model when the user updates it.
            ctrl.$parsers.unshift(function(value) {
                if(value){
                    var age = moment().diff(value, 'years');;

                    var valid =  (age<18) ? false : true;
                    ctrl.$setValidity('invalidDob', valid);
                }
                return valid ? value : undefined;
            });

        }
    }
};



var app = angular.module('dfjApp',['ngMessages'])
    .directive("compareTo", compareTo)
    .directive("ageCheck", ageCheck)
    .controller('FeedbackCtrl',function($scope,$http) {

        $scope.interests = [
          '',
          'Internetes hirdetés',
          'Nyomtatott sajtó',
          'Ismerősön keresztül',
          'E-mail hirdetés',
          'TV reklám',
          'Egyéb'
        ];

        $scope.save = function() {
            console.log('save');
            console.log($scope.feedbackForm);

            if ($scope.feedbackForm.$valid) {
                // save the user
            } else {
                console.log('jajj');
            }
        }

    })

