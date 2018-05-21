<style>

.style1 a
{
  color: white;
}
.visible
{
  display: none;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">Add New Job</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="panel panel-default">
    <div class="panel-heading">Add New Job</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-1">
            <form method="post" action="<?php bs() ?>jobs/add_new_job" id="new_job" onsubmit="return submitResult();" enctype="multipart/form-data">
          <div class="form-group">
            <label for="companname">Company Name</label>
            <input type="text" class="form-control" name="companname" placeholder="Enter Company Name" required>
          </div>
          <div class="form-group">
            <label for="companylogo">Company Logo</label>
            <input type="file" name="img" required>
          </div>
          <div class="form-group">
            <label for="mission_title">Mission Title </label>
            <input type="text" class="form-control" name="mission_title" placeholder="Enter Mission Title" required>
          </div>
          <div class="form-group">
            <label for="payment_per">Payment Per Job </label>
            <input type="number" class="form-control" name="pay_per_job" placeholder="Payment Per Job" required>
          </div>
          <div class="form-group">
            <label for="short_desc">Add Short Description </label>
            <textarea class="form-control" rows="2" name="short_desc" placeholder="Add Short Description With Mission Title" required></textarea>
          </div>
          <div class="form-group">
            <label for="short_desc">Add Mission Brief Description </label>
            <textarea class="form-control" rows="5" name="brief_desc" placeholder="Add Short Description With Mission Title" required></textarea>
          </div>
          <div class="form-group">
            <label for="userfile">Upload images </label>
            <div class="col-md-12" style="">

              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="1st_img" class="">
                  <img src="<?php bs() ?>assets/img/add.png" id="first_img" width="100" height="100">
                </label>
                <input id="1st_img" name="userfile[]" type="file" class="1st_img visible" style="display: none;">
              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="2nd_img" class="">
                <img src="<?php bs() ?>assets/img/add.png" id="sec_img" width="100" height="100">
                </label>
                <input id="2nd_img" name="userfile[]" type="file" class="2nd_img visible" style="display: none;">

              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="3rd_img" class="">
                <img src="<?php bs() ?>assets/img/add.png" id="thr_img" width="100" height="100">
                </label>
                <input id="3rd_img" name="userfile[]" type="file" class="3rd_img visible" style="display: none;">

              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="4th_img" class="">
                  <img src="<?php bs() ?>assets/img/add.png" id="fourth_img" width="100" height="100">
                </label>
                <input id="4th_img" name="userfile[]" type="file" class="4th_img visible" style="display: none;">
              </div>

              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="5th_img" class="">
                  <img src="<?php bs() ?>assets/img/add.png" id="five_img" width="100" height="100">
                </label>
                <input id="5th_img" name="userfile[]" type="file" class="5th_img visible" style="display: none;">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="payment_per">Latitude </label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude">
          </div>
          <div class="form-group">
            <label for="payment_per">longitude</label>
            <input type="text" class="form-control" name="log" id="lon" placeholder="longitude">
          </div>
          <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="input form-control" id="address" name="address" />
          </div>

            <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>

            <!-- <input type="hidden" class="input" name="lat" id="lat"/> -->
           
            <input type="hidden" name="check_status" id="check_status" value="" />
            <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Save</button> 
          </div>
           
      </div>
      </div>
    </div>
   
    </form>
</div>

<script>

 $('#map-view').locationpicker({

   location: {latitude: 25.7276167, longitude: -80.24209209999998},
   enableAutocomplete: true,
   radius:0,
   onchanged: function (currentLocation, radius, isMarkerDropped) {
       var addressComponents = $(this).locationpicker('map').location.addressComponents;
       // updateControls(addressComponents);
   },
   oninitialized: function(component) {
       var addressComponents = $(component).locationpicker('map').location.addressComponents;
       // updateControls(addressComponents);
   },
   inputBinding: {
       latitudeInput: $('#lat'),
       longitudeInput: $('#lon'),
       locationNameInput: $('#address')
   },

 });

</script>


<script>

function readURL(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#five_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".5th_img").change(function() 
{
  readURL(this);
});

function first_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#first_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".1st_img").change(function() 
{
  first_img(this);
});


function second_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#sec_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".2nd_img").change(function() 
{
  second_img(this);
});

function thr_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#thr_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".3rd_img").change(function() 
{
  thr_img(this);
});

function fourth_img(input) 
{

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#fourth_img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".4th_img").change(function() 
{
  fourth_img(this);
});

</script>


<script>

function submitResult() 
{
   if (confirm("Do you want to add multiple locations to this job") == false ) 
   {
      $('#check_status').val('false');
      $('#new_job').removeAttr('onsubmit').submit();
   } 
   else 
   {
      return true ;
   }
}
</script>