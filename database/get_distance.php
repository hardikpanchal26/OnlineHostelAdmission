

<html>
  <body>
    <form id="distanceform" action="determining_factors.php" method="post" />
      <input type="hidden" id="location" name="location" />
    </form>
  </body>
</html>

<?php
  session_start();
  include 'connect.php';
       
       $formid = $_SESSION['formid'];
       $sql = "SELECT `acpcid` FROM `hostel_application` WHERE formid = '$formid'";   
       $result=mysqli_query($connection,$sql);
       $result=mysqli_fetch_array($result,MYSQLI_ASSOC);
       $acpcid = $result['acpcid'];

       $sql = "SELECT * FROM `registered_student` WHERE acpcid = '$acpcid'";   
       $result=mysqli_query($connection,$sql);
       $result=mysqli_fetch_array($result,MYSQLI_ASSOC);
       $college = $result['college'];

       
       $sql = "SELECT location FROM college_hostels where collegename = '$college'";   
       $result=mysqli_query($connection,$sql);
       $location1result=mysqli_fetch_array($result,MYSQLI_ASSOC);
       $location1=$location1result['location'];
       
       $sql = "SELECT `distance` FROM `hostel_application` WHERE formid = '$formid'";   
       $result=mysqli_query($connection,$sql);
       $location2result=mysqli_fetch_array($result,MYSQLI_ASSOC);
       $location2=$location2result['distance'];
       mysqli_close($connection);    
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyA9kMASRkOAbPFdzd4u5o_F0JyXKieOSQk" type="text/javascript"></script>
<script type="text/javascript">

  var location1;
  var location2;

  $(document).ready(function() {
    console.log('test');
    initialize();
        event.preventDefault();
        address1 = "<?php echo $location1; ?>";
        address2 = "<?php echo $location2; ?>";
        showLocation();
  });
  
  var geocoder, location1, location2;

  function initialize() {
    geocoder = new GClientGeocoder();
  }

  function showLocation() {
    geocoder.getLocations(address1, function (response) {
      
        location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
        geocoder.getLocations(address2, function (response) {
        
            location2 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
            calculateDistance();
        });
      
    });
  }

  function calculateDistance()
  {
      var glatlng1 = new GLatLng(location1.lat, location1.lon);
      var glatlng2 = new GLatLng(location2.lat, location2.lon);
      var miledistance = glatlng1.distanceFrom(glatlng2, 3959).toFixed(1);
      var kmdistance = (miledistance * 1.89590).toFixed(1);
      document.getElementById("location").value=kmdistance;

      document.getElementById("distanceform").submit();
  }
</script>