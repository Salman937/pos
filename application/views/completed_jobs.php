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
                <a href="index.html">All Completed Jobs</a>
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
                    <h5><i class="fa fa-briefcase" aria-hidden="true"></i> All Completed Jobs</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                        </a>
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
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($completed_jobs as $job): ?>
                                
                            <tr class="gradeX">
                                <td>
                                    <?php echo date('m-d-Y' , strtotime($job->date)) ?> 
                                </td>
                                <td>
                                    <img src="<?php echo $job->company_logo ?>" width='40'>
                                </td>
                                <td><?php echo $job->company_name ?></td>
                                <td><?php echo $job->mission_title ?></td>
                                <td>
                                  <?php echo $job->location ?>
                                </td>
                                <td><?php echo $job->short_desc; ?></td>
                                <td>
                                    <?php echo $job->pay_per_job; ?>
                                </td>
                                <td>
                                    <a href="<?php bs() ?>jobs/completed_job_details/<?php echo $job->job_id ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>    
                                </td>
                                <td>
                                    <a href="<?php bs() ?>jobs/delete_completed_job/<?php echo $job->job_id ?>" class="btn btn-danger btn-xs"> 
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
</script>