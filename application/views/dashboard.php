<style>

.style1 a
{
  color: white;
}
.pac-container {
    z-index: 10000 !important;
}
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">Home</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
      <a href="<?php bs() ?>jobs/add_job">
        <button type="button" class="btn btn-primary" style="margin-top: 2em">
            <i class="fa fa-plus-circle"></i> Add new Job
        </button>
      </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-3">
         <div class="widget style1 navy-bg">
            <div class="row">
               
               <div class="col-xs-12 text-center">
                <a href="<?php bs() ?>Jobs">
                  <span class=""> Total Live Jobs</span>
                  <h2 class="font-bold">
                      <?php

                          if (empty($not_completed_jobs)) 
                          {
                              echo $jobs[0]->total_jobs;
                          }
                          else
                          {
                            echo $not_completed_jobs;
                          }

                      ?>
                        
                  </h2>
                 </div>
               </a>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-lg-offset-1">
         <div class="widget style1 lazur-bg">
            <div class="row">
              <a href="<?php bs() ?>Jobs/accepted_jobs">
               <div class="col-xs-12 text-center">
                  <span> Accepted Jobs</span>
                  <h2 class="font-bold">
                      <?php

                          if (empty($job_accepted)) 
                          {
                              echo "0";
                          }
                          else
                          {
                            print_r($job_accepted);
                          }

                      ?>
                        
                  </h2>
               </div>
              </a> 
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-lg-offset-1">
         <div class="widget style1 yellow-bg">
            <div class="row">
               
               <div class="col-xs-12 text-center">
                <a href="<?php bs() ?>jobs/completed_jobs">
                  <span> Completed Jobs </span>
                  <h2 class="font-bold">
                      <?php

                          if (empty($completed_jobs[0]->completed_jobs)) 
                          {
                              echo "0";
                          }
                          else
                          {
                            echo  $completed_jobs[0]->completed_jobs;
                          }

                      ?>
                        
                  </h2>
                </div>
              </a>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
        <div class="col-lg-12">
            <div id="home-map-view" class="is-vcentered" style="width: 100%; height:400px;margin-top: 2em"></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new job</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php bs() ?>jobs/add_new_job" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="pay_per_job" placeholder="Payment Per Job" required>
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
            <input name="userfile[]" id="userfile" type="file" multiple required />
          </div>
          <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="input form-control" id="address" name="address" />
          </div>

            <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>

            <input type="hidden" class="input" name="lat" id="lat"/>
           
            <input type="hidden" class="input" name="log" id="lon"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
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

 $('#home-map-view').locationpicker({

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
          latitudeInput: $('#home-lat'),
          longitudeInput: $('#home-lon'),
          locationNameInput: $('#home-address')
      },

  });

</script>