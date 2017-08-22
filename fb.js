var myApp = angular.module('myModule', []);
myApp.controller("myController", function ($scope, $http) {
    $('.menu li').click(function(){
        $this=$(this);
        if(!$this.hasClass("active")){
            $(".menu").find(".active").removeClass("active");
            $this.addClass("active");
        }
    });
    $scope.buttonClick=false;
    $scope.progressClick=false;
    $scope.detailsClick=false;
    $scope.setValues = function(){
        keyVal = $scope.searchText;
        typeVal=$('.menu li.active').attr('id');
        var path="fb.php";
        if(typeVal && keyVal){
        $scope.progressClick=true;
        $http.get(path,{
            params: {key: keyVal, type: typeVal}
        }).success(function(response){
            $scope.progressClick=false;
            $scope.buttonClick=true;
            var json_fb = JSON.parse(response); 
            $scope.fb1 = json_fb.data;
        })
        }
    }
    $scope.view_details=function(id_detail){
        $scope.detailsClick=true;
        $scope.buttonClick=false;
        alert(id_detail);
        var path="/Applications/MAMP/htdocs/fb.php";
        
        $http({
        method: 'GET',
        url: 'fb.php',
        params: { 
            detailID_desc : "detailID",
            detailID: id_detail } 
        }).then(function(response){
            alert(response.data);
            var json_details = JSON.parse(response.data);
            $scope.details1 = json_details;
        })     
    }
    $scope.goBack=function(){
        $scope.detailsClick=false;
        $scope.buttonClick=true;
    }
    
});