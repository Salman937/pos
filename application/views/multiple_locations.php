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
                <a href="#">Add Multiple Locations</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="panel panel-default">
    <div class="panel-heading">Add Job Multiple Locations</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-1">
          <form method="post" action="<?php bs() ?>jobs/multiple_locations" enctype="multipart/form-data">

          <input type="hidden" name="companname" value="<?php echo $jobs_details[0]->company_name ?>">

          <input type="hidden" name="old_img" value="<?php echo $jobs_details[0]->company_logo ?>">

          <input type="hidden" name="mission_title" value="<?php echo $jobs_details[0]->mission_title ?>">

          <input type="hidden" name="pay_per_job" value="<?php echo $jobs_details[0]->pay_per_job ?>">

          <input type="hidden" name="short_desc" value="<?php echo $jobs_details[0]->short_desc ?>">

          <input type="hidden" name="brief_desc" value="<?php echo $jobs_details[0]->brief_desc ?>">
          

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
            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Add</button> 
            <a href="<?php echo base_url() ?>/dashboard">
              <button type="button" class="btn btn-primary btn-lg col-sm-offset-8">
                <i class="fa fa-check-circle"></i> Done
              </button> 
            </a>  

          </div>
           
      </div>
      </div>
    </div>
   
    </form>
</div>
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

