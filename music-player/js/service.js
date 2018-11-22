// JavaScript Document
app.filter('secondsToDateTime', function() {
    return function(seconds) {
        var d = new Date(0,0,0,0,0,0,0);
        d.setSeconds(seconds);
        return d;
    };
});



ngSoundManager.directive('volumeCustome', ['angularPlayer',
    function(angularPlayer) {
        return {
            restrict: "EA",
            link: function(scope, element, attrs) {
                element.bind('input', function(event) {
                    
                    
                    var volume = $('#myRange').val();
                    angularPlayer.adjustVolumeSlider(volume);
                    

                });
                scope.volume = angularPlayer.getVolume();
                scope.$on('music:volume', function(event, data) {
                    scope.$apply(function() {
                        scope.volume = data;
                    });
                });
            }
        };
    }
]);


