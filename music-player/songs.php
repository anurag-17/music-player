<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Music Player</title>
  
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ionicons.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/angular.min.js"></script>
   <script src="js/angular-soundmanager2.js"></script>

    <script src="js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
    <link href="style.css" rel="stylesheet">

</head>
<body ng-app="myApp">
<?php
 header("Access-Control-Allow-Origin: *");?>
<!--Top navigation-->

<div class="full-page" ng-controller="MainCtrl">
  <sound-manager></sound-manager>
<div class="container" class="container">

     <nav class="navbar navbar-dark navbar-top-section fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 col-sm-3 col-xs-12" href="#"><img src="images/logomain.png"></a>
      <div class="collapse navbar-collapse navbar-center-section col-sm-6 col-xs-12 justify-content-md-center" id="navbarsExample10">
          <ul class="navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="#">Live Radio</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Songs</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Stories</a></li>
            <li class="nav-item"><a class="nav-link" href="#">New Releases</a></li>
                                    
          </ul>
        </div>
      <ul class="navbar-nav px-3 col-sm-3 col-xs-12 right-logos">
        <li class="nav-item text-nowrap">
          <p>Sponsored By<img src="images/logo-header-right.png"></p>
        </li>
      </ul>
</nav>
</div>
<!--Top navigation-->


<!--left navigation -->
<div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-md-block bg-light col-xs-12 sidebar lefts-sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column collapse">
              <li class="nav-item"><a class="nav-link blank-list" href="#"></a></li>
              <li class="nav-item"><a class="nav-link active" href="#"><img src="images/icon-home.png">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#"><img src="images/icon-library.png">Your Library</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Recently Played</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Boston Artist <img src="images/icon-speaker.png" class="artist-img"></a></li>
            </ul>
             
            <ul class="sidebar-botom-ul">
             <li class="nav-item"><a class="nav-link usr-list" href="#"><img src="images/user.png"> Pauljames Dimitriu</a></li>
            </ul>
          </div>
        </nav>
<!--left navigation -->
  <main role="main" class="col-md-9 ml-sm-auto left-col-9 col-xs-12 col-lg-10 px-4 music_section">
  
  <div class="row row-section-one">

  <div class="col-md-8 ml-sm-auto col-xs-12 col-left-top" ng-if="!currentPlaying.id">
  <img src="images/image.jpg">
  <div class="inner-right">
  <h1>GRANDPA TYLER’S STORYTIME (THUNDERBIRDS)</h1>
  <p><img src="images/icon-player.png"><a href="#">Name Of The Album</a></p>
  </div>
  </div>

  <div class="col-md-8 ml-sm-auto col-xs-12 col-left-top" ng-if="currentPlaying.id">
     <img ng-src="{{ currentPlaying.img_song }}">
  <div class="inner-right">
  <h1>{{ currentPlaying.album_name }}</h1>
  <p><img src="images/icon-player.png"><a href="#">{{ currentPlaying.song_name }}</a></p>
  </div>
  </div>









  <div class="col-md-4 ml-sm-auto col-xs-12s col-right-top">
  <h1>Take Control Of The Radio</h1>
  <p>Listen offline, unlimited skips, save and 
play, songs from the radio</p>
  <a href="#">Start Your 14 Days Trial</a>
 </div>
  </div>





<div class="Stations_loop mb-3">
  <h2 class="row-two-title">Name Of The Stations</h2>
  <div class="row row-section-two">
    <div class="col-md-3 ml-sm-auto col-xs-6" music-player="play" add-song="song" ng-repeat="song in songs">
      <div class="col-left-one">
    <img ng-src="{{ song.img_song }}">
    <h3>{{ song.album_name }}</h3>
    <p><img src="images/icon-player-mini.png">{{ song.song_name }}</p>
    </div>
  </div>

   </div>
</div>



<div class="Stations_loop mb-3" ng-repeat="mySong in mySongs">

    <h2 class="row-two-title"> {{ mySong.title }} </h2>
     <div class="row row-section-two">
    <div class="col-md-3 mb-4 col-xs-6 " music-player="play" add-song="song" ng-repeat="program in mySong.programs">
      <div class="col-left-one">
      <img ng-src="{{ program.image }}">
          <h3>{{ program.title }}</h3>
       <p><img src="images/icon-player-mini.png">{{ program.description }}</p>
    </div>
  </div>

   </div>
  </div>
  
  </main>
      </div>
    </div>
	
  
  <!--bottom navigation -->  
   <nav class="navbar fixed-bottom navbar-light bg-light botom-menu">
  
  <div class="row fix-bottom-footer-row">
  <div class="col-md-2 col-sm-3 col-xs-11 col-bottom-left" ng-if="currentPlaying.id">
  <img ng-src="{{ currentPlaying.img_song }}"><div class="right-col-bottom-left">
  <h2>{{ currentPlaying.album_name }}</h2>
  <p>{{ currentPlaying.song_name }}</p>
  </div>
  <div class="clear"></div>
  </div>
   
  <div class="col-md-2 col-sm-3 col-xs-11 col-bottom-left" ng-if="!currentPlaying.id">
  <img src="images/player-thumb.jpg"><div class="right-col-bottom-left">
  <h2>Name Of The Album</h2>
  <p>Artist (Category)</p>
  </div>
  <div class="clear"></div>
  </div>




  <div class="col-md-1 col-sm-1 col-xs-1 add-more-link">
  <a href="javascript:void(0);" music-player add-song="song"><span>+</span></a>
  </div>
  <div class="col-md-6 col-sm-5 col-xs-8 col-bottom-middle">
    <div class="player-inner">
    <ul>
    <li><a href="javascript:void(0);" ><i class="ion-thumbsdown"></i></a></li>
    <li><a href="javascript:void(0);" prev-track><i class="ion-ios-skipbackward"></i></a></li>
    <li class="play-pause"><a href="javascript:void(0);" play-pause-toggle data-play="<i class='icon ion-ios-play'></i>" data-pause="<i class='ion-ios-pause'></i>"><i class="ion-ios-play"></i></a></li>
    <li><a href="javascript:void(0);" next-track><i class="ion-ios-skipforward"></i></a></li>
    <li><a href="javascript:void(0);" ><i class="ion-thumbsup"></i></a></li>
    </ul>
    <div class="player-line"><span class="player-position">{{currentPostion}}</span>
      <span class="nprogress" seek-track>
         <span><span class="fill" ng-style="{left : ( progress + '%' ) }"></span></span>
      </span>
         <span class="player-position">{{currentDuration}}</span></div>
    </div>
  </div>
   <div class="clear"></div>
  
  <div class="col-md-3 col-sm-3 col-sm-auto col-bottom-last">
  <div class="player-line">
  


    <a href="javascript:void(0);" mute-music>
       <span ng-if="mute"><i class="ion-android-volume-off"></i></span>
       <span ng-if="!mute">
       <i class="ion-android-volume-up"></i>
      </span>

     </a>
       
    
<input type="range" min="1" max="100" value="{{ volume }}" ng-change="myFunc()"  ng-model="volume" class="slider" id="myRange" volume-bar>
  
    </div>
   
  </div>
  
</nav> 
    
</div>

</body>
</html>
