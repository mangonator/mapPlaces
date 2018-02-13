/* Scripts */
var coordinatePickingMode = false;

//Initialize map
function initMap() {
  var testlocation = {lat: 60.169116, lng: 24.929076};
  var testResults = [{lat: 60.169290, lng: 24.928217}, {lat: 60.169497, lng: 24.933689}, {lat: 60.170768, lng: 24.941535}, {lat: 60.175841, lng: 24.804531}];
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: new google.maps.LatLng(60.169116,24.929076)
  });
  //Loop test locations to map
  for (var i = 0; i < testResults.length; i++) {
    var latLng = new google.maps.LatLng(testResults[i].lat,testResults[i].lng);
    var marker = new google.maps.Marker({
        position: latLng,
        map: map
    });
  }
  //Click event for coordinate picking
  map.addListener('click', function(e) {
    if (coordinatePickingMode === true){
      GetCoordinatesFromMap(e.latLng, map);
    } else {
      //do nothing
    }
  });
}
//Function for getting coordinates from map
function GetCoordinatesFromMap(latLng, map) {
  //Optional code for if we want to add a marker on the map too
  // var marker = new google.maps.Marker({
  //   position: latLng,
  //   map: map
  // });
  // map.panTo(latLng);
  console.log("New map marker added, lat: " + latLng.lat() + " lng: " + latLng.lng());
  $("#lat").val(latLng.lat());
  $("#lng").val(latLng.lng());
  coordinatePickingMode = false;
  $("#pickFromMapBtn").html("Pick from map");
  $("#map").removeClass("pickingModeActive");
}
//We only want to pick coordinates when button is pressed so we handle that with this function for now
function setPickingMode(){
  if (coordinatePickingMode === false){
    coordinatePickingMode = true;
    $("#pickFromMapBtn").html("Cancel picking");
    $("#map").addClass("pickingModeActive");
  } else {
    coordinatePickingMode = false;
    $("#pickFromMapBtn").html("Pick from map");
    $("#map").removeClass("pickingModeActive");
  }
}

//AJAX content loading
function loadAjax(page){
  switch (page) {
    case "new":
    $("#addPlace").load("../places/new/addNew.html");
        break; 
    case "edit":
    $("#listPlaces").load("../places/edit/listplaces.php");
        break; 
    case "search":
    $("#searchPlaces").load("../places/search/searchplaces.php");
        break; 
    default: 
    //Do nothing
  }
}

$( document ).ready(function() {
  loadAjax('new');
});