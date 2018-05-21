<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Jobs</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">All Jobs</a>
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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-briefcase" aria-hidden="true"></i> Jobs</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                        <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Logo</th>
                                <th>Company</th>
                                <th>Mission Title</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Payment Per Job</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($jobs as $job): ?>
                                
                            <tr class="gradeX">
                                <td  class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                    <?php echo date('m-d-Y' , strtotime($job->date)) ?> 
                                </td>
                                <td class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                    <img src="<?php echo $job->company_logo ?>" width='40'>
                                </td>
                                <td  class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                    <?php echo $job->company_name ?>
                                </td>
                                <td class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                    <?php echo $job->mission_title ?>
                                </td>
                                <td class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                  <?php echo $job->location ?>
                                </td>
                                <td class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                    <?php echo $job->short_desc; ?>
                                </td>
                                <td class="clickable-row" data-href='jobs/job_update/<?php echo $job->id ?>'>
                                    <?php echo $job->pay_per_job; ?>
                                </td>
                                <td>
                                    <a href="<?php bs() ?>jobs/delete/<?php echo $job->id ?>" class="btn btn-danger btn-xs"> 
                                        <i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                        <?php endforeach ?>    

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="update_job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Job</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php bs() ?>jobs/update_jobs" enctype="multipart/form-data">
          <div class="form-group">
            <label for="companname">Company Name</label>
            <input type="text" class="form-control" id="company_name"   value="" name="companname" required>
            <input type="hidden" class="form-control" id="users_id" value="" name="users_id" required>
            <input type="hidden" class="form-control" id="job_accepted" value="" name="job_accepted" required>
            <input type="hidden" class="form-control" id="job_id" value="" name="job_id" required>
          </div>
          <div class="form-group">
            <label for="companylogo">Company Logo</label>
            <input type="file" name="img">
            <input type="hidden" name="old_img" id="old_img">
          </div>
          <div class="form-group">
            <label for="mission_title">Mission Title </label>
            <input type="text" class="form-control" id="mission_title" name="mission_title" value="" required>
          </div>
          <div class="form-group">
            <label for="payment_per">Payment Per Job </label>
            <input type="text" class="form-control" id="pay_per_job" name="pay_per_job" value="" required>
          </div>
          <div class="form-group">
            <label for="short_desc">Add Short Description </label>
            <textarea class="form-control" rows="2" id="short_desc" name="short_desc" value="" required></textarea>
          </div>
          <div class="form-group">
            <label for="short_desc">Add Mission Brief Description </label>
            <textarea class="form-control" rows="5" id="brief_desc" name="brief_desc" value="" required></textarea>
          </div>
          <div class="form-group">
            <label for="new_userfile">Upload images </label>
            <div class="row">
              <div class="col-md-12" style="">

                <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="1st_img" class="">
                  <img src="<?php bs() ?>assets/img/add.png" id="first_img" width="100" height="100">
                </label>
                <input id="1st_img" name="userfile[]" type="file" class="1st_img visible" style="display: none;">
              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="2nd_img" class="">
                <img src="<?php bs() ?>assets/img/add.png" id="sec_img" width="100" height="100" style="padding-left: 10px">
                </label>
                <input id="2nd_img" name="userfile[]" type="file" class="2nd_img visible" style="display: none;">

              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="3rd_img" class="">
                <img src="<?php bs() ?>assets/img/add.png" id="thr_img" width="100" height="100" style="padding-left: 10px">
                </label>
                <input id="3rd_img" name="userfile[]" type="file" class="3rd_img visible" style="display: none;">

              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="4th_img" class="">
                  <img src="<?php bs() ?>assets/img/add.png" id="fourth_img" width="100" height="100" style="padding-left: 10px">
                </label>
                <input id="4th_img" name="userfile[]" type="file" class="4th_img visible" style="display: none;">
              </div>

              <div class="col-md-2 col-sm-6 col-xs-6">
                <label for="5th_img" class="">
                  <img src="<?php bs() ?>assets/img/add.png" id="five_img" width="100" height="100" style="padding-left: 10px">
                </label>
                <input id="5th_img" name="userfile[]" type="file" class="5th_img visible" style="display: none;">
              </div>

                
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="input form-control" id="new_address" name="address" />
          </div>

            <div id="update-map" class="is-vcentered" style="width: 100%; height:400px;"></div>

            <input type="hidden" class="input new_lat" name="lat" id="new_lat"/>
           
            <input type="hidden" class="input new_log" name="log" id="new_lon"/>

            <input type="hidden" class="input" name="" id="show_lat"/>
           
            <input type="hidden" class="input" name="" id="show_lng"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Job</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() 
    {
        $('.dataTables-example').dataTable();

        if ($('#map_type').val() == 'location') {
            $('#rad-group').hide();
        }
        
        $('#map_type').on('change', function (e) {
            console.log($(this).val());
            if ($(this).val() == 'location') {
                $('#rad-group').hide();
            } else {
                $('#rad-group').show();
            }
        });
    });

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

function new_map() 
{    
      
  $('#update-map').locationpicker({

      location: {latitude: $('#show_lat').val(), longitude: $('#show_lng').val()},
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
          latitudeInput: $('.new_lat'),
          longitudeInput: $('.new_log'),
          locationNameInput: $('#new_address')
      },
  });
} 

   </script>



<script>
  
  jQuery(document).ready(function($) {

    $('body').on('click', '#update', function(event) {
        event.preventDefault();
        /* Act on the event */

        var job_id = $(this).attr('data-job-id');

        $.ajax({
   
               url : "<?php bs('Jobs/update_job') ?>/"+job_id,

               success :function (success) 
               {

                  var obj = $.parseJSON(success);

                   // console.log(obj[0].company_name);

                   $("#company_name").val(obj[0].company_name);
                   $("#old_img").val(obj[0].company_logo);
                   $("#mission_title").val(obj[0].mission_title);
                   $("#pay_per_job").val(obj[0].pay_per_job);
                   $("#short_desc").val(obj[0].short_desc);
                   $("#brief_desc").val(obj[0].brief_desc);
                   $("#users_id").val(obj[0].users_id);
                   $("#job_accepted").val(obj[0].job_accepted);
                   $("#job_id").val(obj[0].id);
                   $("#show_lat").val(obj[0].latitude);
                   $("#show_lng").val(obj[0].longitude);

                  new_map();
               }
   
           })
        
    });
      
  });

jQuery(document).ready(function($) 
{
  $('body').on('click', '.clickable-row', function(event) {
    event.preventDefault();
    /* Act on the event */
        window.location = $(this).data("href");
    
  });
});

</script>

