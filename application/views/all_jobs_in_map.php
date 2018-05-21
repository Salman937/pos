<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>All Jobs in Map</h2>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index.html">All Jobs</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-briefcase" aria-hidden="true"></i> All Jobs in Map</h5>
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

                    <div class="form-group">
                        <label for="">Search</label>
                        <input type="text" class="input form-control" id="address" name="address" />
                      </div>

                    <div id="map-view" class="is-vcentered" style="width: 100%; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $('#map-view').locationpicker({

            location: {latitude: lat, longitude: lng},
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