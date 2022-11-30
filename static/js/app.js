document.getElementById("year").innerHTML = new Date().getFullYear();
// let longitude = 10;
// let latitude = 10;

//Function To Open Modal
function openModal() {
  $("#manualLocationModal").modal("show");
}

//Function to Fetch User Location
function getCurrentLocationHandler(e) {
  if (navigator && navigator.geolocation) {
    // let location_timeout = setTimeout("geolocFail()", 10000);
    navigator.geolocation.getCurrentPosition(
      (pos) => {
        const coords = pos.coords;

        let userLocation = {
          present: true,
          lat: coords.latitude,
          lng: coords.longitude,
        };
        // console.log(userLocation);

        //Update Longitude Values on Student Dashboard
        document.getElementById("js-longitude").innerHTML = userLocation.lng;
        document.getElementById("js-latitude").innerHTML = userLocation.lat;
        // console.log(typeof document.getElementById("js-longitude").innerHTML);
        //Update Lat and Long on Form
        document.querySelector(".student-longitude").value = userLocation.lng;
        document.querySelector(".student-latitude").value = userLocation.lat;

        return;
      },
      (error) => {
        if (error.message.includes("denied")) {
          console.log({
            hasError: true,
            message:
              "Could Not Get Your Location, Permision To Access Your Device GPS Was Denied, Kindly Allow Access And Try Again",
          });

          handlePermission();
          return;
        }

        return console.log({
          hasError: true,
          message:
            "Could Not Get Your Location,Ensure You Have An Active Intenet Connection",
        });
      }
    );
    return;
  }

  return console.log({
    hasError: true,
    message:
      "Could Not Get Your Location,Ensure You Are Using A GPS Enabled Device And Your Location Services Are Turned On",
  });
}

getCurrentLocationHandler();
// //fetch Locations after assigning them to divs

document.getElementById("help-btn").addEventListener("click", function (e) {
  let Latitude = document.querySelector(".student-latitude").value;
  let Longitude = document.querySelector(".student-longitude").value;

  if (Latitude == "0" && Longitude == "0") {
    e.preventDefault();
    //Revoke Function
    openModal();
  } else {
  }
});
