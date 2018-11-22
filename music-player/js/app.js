'use strict';


var app = angular.module('myApp',['angularSoundManager','slickCarousel','ngRoute','mgcrea.ngStrap']);

    app.config(function($routeProvider){
       $routeProvider
        .when("/",{
          templateUrl: "view/home.html",
	    	  controller: "homeController"

        })
        .when("/songs",{
          templateUrl: "view/songs.html",
	    	  controller: "songController"
        })
        .when("/stories",{
          templateUrl:"view/stories.html",
		      controller:"storyController"
        })
        .when("/rplayed",{
          templateUrl:"view/rplayed.html",
          controller:"rplayedController"
        })
        .when("/albums/:id",{
          templateUrl:"view/albums.html",
		      controller:"albumController"
        })
		.otherwise({
			redirectTo:"/",
			});
		

    });


  // controller function






  

  
    
