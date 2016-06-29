var angular = require('angular');
var $ = require('jquery');
var loginApp = angular.module('loginApp',[]);
loginApp.controller('TestController',['$scope','$http','$log',function($scope,$http,$log){
  $scope.login_errors = "";
  $scope.greetings = 'Hola mundo';
  $scope.test = (function(){$log.log($scope.username)});
  $scope.logmein = (function(){
    $http({
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      method: 'POST',
      url: '/login',
      data: $.param({ // This is needed due to AngularJS default JSON post
        'user_name':$scope.username,
        'user_password_hash':$scope.password
      })
    }).then(function successCallback(response){
      // Success
      $log.log(response);
      if(response.data.errors > 0){
      $scope.login_errors = response.data.error_desc;
      }
    },function errorCallback(response){
    });
  });
}]);
