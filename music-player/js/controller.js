// JavaScript Document




app.controller('homeController', function($scope){
	$scope.songs = [
            {
                id: 'one',
                title: 'Rock Workout Radio',
                description: 'By The Way',
                rating_avg:0.0,
                image: 'images/image2.jpg', 
            //    url: 'http://www.schillmania.com/projects/soundmanager2/demo/_mp3/rain.mp3'                    
            },
            {
                id: 'two',
                title: 'Rock Workout Radio',
                description: 'By The Way',
                rating_avg:2.5,
                image: 'images/image3.jpg',
              //  url: 'http://www.schillmania.com/projects/soundmanager2/demo/_mp3/walking.mp3'
             },
            {
                id: 'three',
                title: 'Rock Workout Radio',
                description: 'By The Way',
                rating_avg:3.0,
                image: 'images/image4.jpg',
             //   url: 'http://www.freshly-ground.com/misc/music/carl-3-barlp.mp3'
            },
            {
                id: 'four',
                title: 'Rock Workout Radio',
                description: 'By The Way',
                rating_avg:5.0,
                image: 'images/image5.jpg',
            //    url: 'http://www.freshly-ground.com/data/audio/binaural/Mak.mp3'
            }
         
        ];
	
	});
	

		
	
app.controller('songController', function($scope,$http){


	$http.get("api/radio/songs.php").
	  then(function(response){
		  $scope.mySongs = response.data.genres; 
		  $scope.slickConfig1Loaded = true;
          $scope.slickCurrentIndex = 0;
          $scope.slickConfig = {
          autoplay: false,
          infinite: false,
          slidesToShow: 4,
          responsive: [
        {
          breakpoint: 1140,
          settings: {
           slidesToShow: 3,
           slidesToScroll: 3
          }
      },
      {
          breakpoint: 650,
          settings: {
           slidesToShow: 2,
           slidesToScroll: 2
          }
      }
         ]
	 }
	  })
  


	});	
	
	

	
app.controller('storyController', function($scope,$http){
  

	$http.get("api/radio/stories.php").
	  then(function(response){
		  $scope.stories = response.data.genres; 
		  $scope.slickConfig1Loaded = true;
          $scope.slickCurrentIndex = 0;
    $scope.slickConfig = {
          autoplay: false,
          infinite: false,
          slidesToShow: 4,
          responsive: [
        {
          breakpoint: 1140,
          settings: {
           slidesToShow: 3,
           slidesToScroll: 3
          }
      },
      {
          breakpoint: 650,
          settings: {
           slidesToShow: 2,
           slidesToScroll: 2
          }
      }
         ]
   }
	  })
	});


app.controller('rplayedController', function($scope,$http,$log){


  $http.get("api/accounts/rplayed.php").
    then(function(response){
      $scope.recentongs = response.data.tracks; 
      var test = console.log(response.data.tracks);
      $scope.slickConfig1Loaded = true;
          $scope.slickCurrentIndex = 0;
          $scope.slickConfig = {
          autoplay: false,
          infinite: false,
          slidesToShow: 4,
          responsive: [
        {
          breakpoint: 1140,
          settings: {
           slidesToShow: 3,
           slidesToScroll: 3
          }
      },
      {
          breakpoint: 650,
          settings: {
           slidesToShow: 2,
           slidesToScroll: 2
          }
      }
         ]
   }
    });
  
 $scope.$on('track:id', function(event, data) {
  
     $http({
     url:"api/accounts/rplayed.php",
     method:"post",
     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
     data : {
       trackid: $scope.currentPlaying.id,
    }
    }).
    then(function(response){
      $scope.test = response.data; 
     
    })

});


  }); 
	
app.controller('albumController', function($scope, $http, $routeParams){
     var url_id = $routeParams.id;
     var my_link = "api/albums.php?id=" + url_id; 


    
	$http({
		url:my_link,
		method:"get"
		}).
	  then(function(response){
		  $scope.songs = response.data; 
		  var test = console.log(response.data);
		
	  })


 $scope.$on('track:id', function(event, data) {
  
     $http({
     url:"api/accounts/rplayed.php",
     method:"post",
     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
     data : {
       trackid: $scope.currentPlaying.id,
    }
    }).
    then(function(response){
      $scope.test = response.data; 
     
    })

});

	});	

app.controller('likeController', function($scope,$http){
  $scope.myLike = function() {   
     $http({
     url:"api/accounts/like.php",
     method:"post",
     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
     data : {
       trackid: $scope.currentPlaying.id,
       like: true,
       set: true
    }
    }).
    then(function(response){
      $scope.songs = response.data; 
      var test = console.log(response.data);   
    })
    };
  $scope.myunLike = function() {
     $http({
     url:"api/accounts/like.php",
     method:"post",
     headers: {'Content-Type': 'application/x-www-form-urlencoded'},
     data : {
       trackid: $scope.currentPlaying.id,
       like: false,
       set: false
    }
    }).
    then(function(response){
      $scope.songs = response.data; 
      var test = console.log(response.data);   
    })

    }; 
  
   



});



