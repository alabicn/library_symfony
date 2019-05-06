
    var mymap = L.map('mapid').setView([48.557575, 6.90], 8);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		minZoom: 5,
		maxZoom: 18,
		id: 'mapbox.streets',
		accessToken: 'pk.eyJ1IjoibWNocjcwIiwiYSI6ImNqcWY2c2s2YjRtNG80OGxjM25idGQyZ3gifQ.-T-WbbrfrUbJMp3UkBIPxA'
	}).addTo(mymap);
	
	mymap.setMaxBounds(mymap.getBounds());
 
	var logoLibrary = L.icon({
		iconUrl: "{{ asset('assets/img/random/remove.png') }}",
    
		iconSize:     [32, 32], // size of the icon
	});
	
    var obj;
    
	$(document).ready(function(){

        setInterval(function(){
            $.post(
                "{{ path('libraries') }}",
                function(data){
                    $("#mapid").html(function(){
                            for(i=0; i<data.length; i++){
                                var marker = L.marker([data[i].latitude, data[i].longitude], {icon: logoElan}).addTo(mymap);
                                marker.bindPopup(data[i].adresse_postale).openPopup();
				            }
			            })
                    });               
                });
	        });