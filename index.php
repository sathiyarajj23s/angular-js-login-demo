<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</head>
    <!-- ng app - angular js application -->
<body ng-app="login_app">
        <!-- ng controller - control  the (variables and application) in angular js application  -->
        <div ng-controller="login_controller" >
            <!-- ng init - initialize a variable -->
            <form name="userlogin" ng-init="age='25';">
                
                Email: <input type="email" ng-model="email" required><span></span><br><br>
                
                Password : <input type="password" ng-model="password" required><br><br>

                <!-- Age : <input type="text" ng-model="age"><br><br> -->
                        <!-- data binding -->
                    <span  style="color:red">{{faild}}</span>
                    <span   style="color:green" >{{success}}</span>
                    <button type="submit" ng-disabled="userlogin.$invalid" ng-click="submit_form(userlogin.$valid)">Submit</button>
                    <!-- <input type="reset" ng-click="this.form.reset();" value="Reset" /> -->
            
            
            </form>

        </div>
            
</body>

        <script>
                var app = angular.module("login_app", []);

                    app.controller("login_controller", ['$scope', '$http', function($scope, $http) {
                        $scope.url = "auth.php";
                        $scope.submit_form = function(isvalid) {
                           
                           if (isvalid) {
                            // send HTTP Post request
                                $http.post($scope.url, {
                                    "email": $scope.email,
                                    "password": $scope.password,
                                    "age": $scope.age
                                }).then(function success(resp) {

                                    console.log(resp);
                                    
                                    if(!resp['data']['err']){

                                        $scope.success = "Login Success";
                                       
                                    }else{

                                        $scope.faild = "Email or Password is incorrect !";
                                       
                                        
                                    }

                                });


                            } else {

                                alert("Form is invalid");
                            }
                        }



                    }]);
        </script>

</html>