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
                <a href="#">Update Job</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="panel panel-default">
    <div class="panel-heading">Update Job</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-1">
         <form method="post" action="<?php bs() ?>jobs/update_jobs" enctype="multipart/form-data">
          <div class="form-group">
            <label for="companname">Company Name</label>
            <input type="text" class="form-control" name="companname" value="<?php echo $jobs_details[0]->company_name ?>" placeholder="Enter Company Name" required>
            <input type="hidden" class="form-control" value="<?php echo $jobs_details[0]->users_id ?>" name="users_id" required>
            <input type="hidden" class="form-control" value="<?php echo $jobs_details[0]->job_accepted ?>" name="job_accepted" required>
            <input type="hidden" class="form-control" value="<?php echo $jobs_details[0]->id ?>" name="job_id" required>
          </div>
          <div class="form-group">
            <label for="companylogo">Company Logo</label>
            <input type="file" name="img">
            <input type="hidden" name="old_img" value="<?php echo $jobs_details[0]->company_logo ?>">
          </div>
          <div class="form-group">
            <label for="mission_title">Mission Title </label>
            <input type="text" class="form-control" name="mission_title" placeholder="Enter Mission Title" value="<?php echo $jobs_details[0]->mission_title ?>" required>
          </div>
          <div class="form-group">
            <label for="payment_per">Payment Per Job </label>
            <input type="number" class="form-control" name="pay_per_job" placeholder="Payment Per Job" value="<?php echo $jobs_details[0]->pay_per_job ?>" required>
          </div>
          <div class="form-group">
            <label for="short_desc">Add Short Description </label>
            <textarea class="form-control" rows="2" name="short_desc" placeholder="Add Short Description With Mission Title" required><?php echo $jobs_details[0]->short_desc ?></textarea>
          </div>
          <div class="form-group">
            <label for="short_desc">Add Mission Brief Description </label>
            <textarea class="form-control" rows="5" name="brief_desc" placeholder="Add Short Description With Mission Title" required><?php echo $jobs_details[0]->brief_desc ?></textarea>
          </div>
          <div class="form-group">
            <label for="userfile">Upload images </label>
            <div class="col-md-12" style="">

           	<?php if (empty($edit_job[0]->images)): ?>

		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="1st_img" class="">
		                <img src="<?php bs() ?>assets/img/add.png" id="first_img" width="100" height="100">
		            </label>
		            <input id="1st_img" name="newfile[]" type="file" class="1st_img hidden">
		        </div>

		    <?php else: ?>  

		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="1st_img" class="">
		                <img src="<?php echo $edit_job[0]->images ?>" id="first_img" width="100" height="100">
		            </label>
		            <input id="1st_img" name="img1" type="file" class="1st_img hidden">

		            <input type="hidden" value="<?php echo $edit_job[0]->id ?>" name="product_resourceID_1">
		        </div>

		    <?php endif ?>

		    <?php if (empty($edit_job[1]->images)): ?>
		        
		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="2nd_img" class="">
		                <img src="<?php bs() ?>assets/img/add.png" id="sec_img" width="100" height="100">
		            </label>
		            <input id="2nd_img" name="newfile[]" type="file" class="2nd_img hidden">
		        </div>

		    <?php else: ?>          

		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="2nd_img" class="">
		            <img src="<?php echo $edit_job[1]->images ?>" id="sec_img" width="100" height="100">
		            </label>
		            <input id="2nd_img" name="img2" type="file" class="2nd_img hidden">

		            <input type="hidden" name="product_resourceID_2" value="<?php echo $edit_job[1]->id ?>">
		        </div>

		    <?php endif ?>

		    <?php if (empty($edit_job[2]->images)): ?>
		        
		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="3rd_img" class="">
		                <img src="<?php bs() ?>assets/img/add.png" id="thr_img" width="100" height="100">
		            </label>
		            <input id="3rd_img" name="newfile[]" type="file" class="3rd_img hidden">

		        </div>

		    <?php else: ?>
		    
		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="3rd_img" class="">
		                <img src="<?php echo $edit_job[2]->images ?>" id="thr_img" width="100" height="100">
		            </label>
		            <input id="3rd_img" name="img3" type="file" class="3rd_img hidden">
		            <input type="hidden" name="product_resourceID_3" value="<?php echo $edit_job[2]->id ?>">
		        </div>      

		    <?php endif ?>

		    <?php if (empty($edit_job[3]->images)): ?>
		        
		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="4th_img" class="">
		                <img src="<?php bs() ?>assets/img/add.png" id="fourth_img" width="100" height="100">
		            </label>
		            <input id="4th_img" name="newfile[]" type="file" class="4th_img hidden">
		        </div>

		    <?php else: ?>  

		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="4th_img" class="">
		                <img src="<?php echo $edit_job[3]->images ?>" id="fourth_img" width="100" height="100">
		            </label>
		            <input id="4th_img" name="img4" type="file" class="4th_img hidden">
		            <input type="hidden" name="product_resourceID_4" value="<?php echo $edit_job[3]->id ?>">
		        </div>

		    <?php endif ?>

		    <?php if (empty($edit_job[4]->images)): ?>
		        
		        <div class="col-md-2 col-sm-6 col-xs-6">
	                <label for="5th_img" class="">
	                  <img src="<?php bs() ?>assets/img/add.png" id="five_img" width="100" height="100">
	                </label>
	                <input id="5th_img" name="newfile[]" type="file" class="5th_img visible" style="display: none;">
	              </div>

		    <?php else: ?>  

		        <div class="col-md-2 col-sm-6 col-xs-6">
		            <label for="5th_img" class="">
		                <img src="<?php echo $edit_job[4]->images ?>" id="five_img" width="100" height="100">
		            </label>
		            <input id="5th_img" name="img5" type="file" class="5th_img hidden">
		            <input type="hidden" name="product_resourceID_5" value="<?php echo $edit_job[4]->id ?>">
		        </div>

		    <?php endif ?>

		   

            </div>
          </div>
          <div class="form-group">
            <label for="payment_per">Latitude </label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="longitude" value="<?php echo $jobs_details[0]->latitude ?>">
          </div>
          <div class="form-group">
            <label for="payment_per">longitude </label>
            <input type="text" class="form-control" name="log" id="lon" placeholder="longitude" value="<?php echo $jobs_details[0]->longitude ?>">
          </div>
          <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="input form-control" id="address" value="<?php echo $jobs_details[0]->location ?>" name="address" />
          </div>

            <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>

            <!-- <input type="hidden" class="input" name="lat" id="lat"/>
           
            <input type="hidden" class="input" name="log" id="lon"/> -->
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

   location: {latitude: <?php echo $jobs_details[0]->latitude ?>, longitude: <?php echo $jobs_details[0]->longitude ?>},
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