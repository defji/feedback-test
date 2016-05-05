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
            if ($scope.feedbackForm.$valid) {
                var d = $scope.feedback.dob.toString();
                $scope.feedback.dob_l = moment(d).format("YYYY-MM-DD");
                $http.post('/feedback/save', $scope.feedback).then(function(ret) {
                    console.log(ret);
                   if(ret.status==200) {
                       $scope.feedback = {};
                       $scope.feedbackForm.$setPristine();
                       $scope.feedbackForm.$setUntouched();
                       swal("Sikeres regisztráció!", "Az adatokat mentettük.", "success");
                       console.log(ret.data);
                   }
                }, function(rest) {
                    swal("Hoppá!", "Valami probléma merült fel az adatok mentésénél.", "error");
                });
            } else {
                console.log('jajj');
            }
        }

    })

