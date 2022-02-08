<!DOCTYPE html>
<html>
<head>
  <style >
    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Recyle Center - Daftar Calon Bank Sampah</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrQ2BH7xnRCUao7mnUR2cvCNsXuNjEFp0&callback=initMap"></script>
    <script src="https://maps.googleapis.com/maps/api/streetview?size=600x300&location=46.414382,10.013988&heading=151.78&pitch=-0.76&key=AIzaSyDrQ2BH7xnRCUao7mnUR2cvCNsXuNjEFp0"></script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  
function initialize() {
  var peta = {
    center:new google.maps.LatLng(-7.9784695,112.5617418),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), peta);
  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(peta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });
  var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        peta.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        peta.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: peta,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          peta.fitBounds(bounds);
        });
      }
              
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVsRAmsrLve_kXqQNpzzQr_bIUxmQi7-U&libraries=places&callback=initAutocomplete"
         async defer></script>
</head>
<body>
  <div class="col-md-12">
    <h3 style="text-align: center;">Daftar Bank Sampah</h3>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="googleMap" style="width:100%;height:380px;"></div>
    <form action="<?php echo base_url('c_daftar/tambah') ?>" method="POST" onsubmit="return cek_pass();">
      <?php //echo form_open_multipart('c_daftar/tambah') cek_pass(); ?>
    <input type="hidden" name="id_dbs" value="" />
     <div class="col-md-11 ml-1">
      <div class="form-group">
       <label>Nama Penggurus :</label>
         <input type="text" class="form-control" id="n_penggurus" name="n_penggurus" required="">
      </div>
      <div class="form-group">
       <label>Alamat :</label>
         <input type="text" class="form-control" id="alamat" name="alamat">
       </div>
       <div class="form-group">
        <label>Email :</label>
         <input type="text" class="form-control" id="email" name="email">
       </div>
       <div class="form-group">
        <label>Telephone :</label>
         <input type="number" class="form-control" id="tlpn" name="tlpn">
       </div>
       <div class="form-group">
        <label>Username :</label>
         <input type="text" class="form-control" id="username" name="username" required="">
       </div>
       <div class="form-group">
        <label>Password :</label>
         <input type="Password" class="form-control" id="password" name="password" required="" >
       </div>
       <div class="form-group">
        <label>Confirm Password :</label>
         <input type="Password" class="form-control" id="confirmpass" required="" >
       </div>
       <div class="form-group">
        <label>Nama BS :</label>
         <input type="text" class="form-control" id="nama_bs" name="nama_bs">
       </div>
       <div class="form-group">
        <label>Lat :</label>
       <input id="lat" name="lat" class="form-control" readonly>
      </div>
      <div class="form-group">
       <label>Lng :</label>
        <input id="lng" name="lng" class="form-control" readonly>
      </div>
      <div class="form-group">
       <label>Foto Struktur Organisai :</label>
         <input type="file" id="userfile" name="userfile">
       </div>
       <div class="form-group">
        <label>Foto SK Dari Desa :</label>
         <input type="file" id="userfile" name="userfile">
       </div>
       <div class="form-group">
        <label>Foto Profil :</label>
         <input type="file" id="userfile" name="userfile">
       </div>
     <input type="submit" class="btn btn-primary" value="Kirim">
     <input type="reset" class="btn btn-primary" value="Reset">
     </div>
   </form>
   <?php //form_close() ?>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function cek_pass(){
    var password = $('#password').val();
    var confirm = $('#confirmpass').val();

    if(password==confirm){
        cek_username();
    }else{
      alert("Password Tidak Sama");
      return false;
    }
    // return false;
  }
</script>
<script type="text/javascript"> 
  function cek_username(){
    var username = $('#username').val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>c_daftar/get_ajax",
      data: {username: username},
      async : false,
      dataType: 'json',
      success: function(data){
        if(data.length>0){
          alert("username telah dipakai");
          return false;
        }else{
          return true;
        }
      } 
    });
  }
</script>
</body>
</html>