<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Job Completed Details</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">Job Details</a>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <h2><?php echo $jobs_details[0]->company_name ?></h2>
                            </div>
                            <dl class="dl-horizontal">
                                <dt>Mission Title:</dt> <dd><span class="label label-primary"><?php echo $jobs_details[0]->mission_title ?></span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <dl class="dl-horizontal">

                                <dt>Company Logo:</dt> <dd> <img src="<?php echo $jobs_details[0]->company_logo ?>" width='100'></dd>
                                <br>
                                <dt>Comments:</dt> <dd>  <?php echo $jobs_details[0]->comments ?></dd>
                                <br>
                                <dt>Created:</dt> <dd> <?php echo $jobs_details[0]->current_time ?> </dd>
                                <dt>Location:</dt> <dd> <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;margin-top: 1em"></div> </dd>
                            </dl>
                        </div>
                        <div class="col-lg-6" id="cluster_info">
                            <dl class="dl-horizontal" style="margin-top: -7em">

                                <dt><h3>Images:</h3></dt>
                                <dd class="project-people">

                                <?php foreach ($jobs_details as $jobs_detail): ?>
                                        
                                    <img alt="image" src="<?php echo $jobs_detail->images ?>" style="width: 70%;height: 100%;margin-top: 5px">

                                <?php endforeach ?>    

                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="dl-horizontal">
                                <dt>Completed:</dt>
                                <dd>
                                    <div class="progress progress-striped active m-b-sm">
                                        <div style="width: 100%;" class="progress-bar"></div>
                                    </div>
                                    <small>Job completed <strong>100%</strong>.</small>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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