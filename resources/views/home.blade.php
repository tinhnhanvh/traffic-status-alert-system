@extends('layouts.app')
@section('styles')
<style>
#direct-box {
	background: rgba(255, 255, 255, 0.5);
	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    width: 400px;
}
#direct-box .header{
	background: #3367D6 !important;
	color: rgba(255,255,255,0.87);
	padding: 20px;
}
#direct-box .header h3{
	font-weight: normal!important;
}
#direct-box .content{
	padding: 15px 20px;
	background: rgba(66, 133, 244, 0.67);
}
#direct-box .input-group-text {
	background-color: unset;
	color: white;
	border: none;
}
.dismiss {
        width: 35px;
        height: 35px;
        line-height: 35px;
        text-align: center;
        background: #4285F4;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }
    .dismiss:hover {
        background: rgba(255, 255, 255, 0.87);
        color: #4285F4;
    }
</style>
@endsection
@section('content')
<div id="app"></div>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>noname system</h3>
    </div>

    <ul class="components">
        <li>
        	<a href="#">
        		<i class="fa fa-map"></i>
        		<p>Directions</p>
        	</a>
        </li>
        <li>
        	<a href="#">
        		<i class="fa fa-map-marker"></i>
        		<p>Search Places</p>
        	</a>
        </li>
        <li>
        	<a href="#">
        		<i class="fa fa-map-o"></i>
        		<p>Option 1</p>
        	</a>
        </li>
    </ul>

    <div class="widget-toggle">
    	<button class="widget-toggle-button" id="dismiss"></button>
    </div>
</nav>

<div id="left-panel">
	<div id="search-box">
		<div class="input-group">
			<div class="input-group-prepend">
		    	<button class="btn btn-search" type="button" id="sidebarCollapse"><i class="fa fa-align-justify"></i></button>
		    </div>
			<input type="text" name="search" class="search-input form-control" placeholder="Search Maps" autocomplete="off" />
			<div class="input-group-append">
				<button type="button" class="btn btn-search"><i class="fa fa-search"></i></button>
			</div>
		</div>
	</div>
</div>

<div id="direct-box">
	<div class="header">
		<h3>Directions</h3>
		<div class="dismiss"><i class="fa fa-close"></i></div>
	</div>
	<div class="content">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-dot-circle-o"></i></span>
		    </div>
			<input type="text" class="form-control" placeholder="Start point..." autocomplete="off" />
			<!--<div class="input-group-append">
				<button type="button" class="btn btn-search"><i class="fa fa-search"></i></button>
			</div>-->
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-map-marker"></i></span>
		    </div>
			<input type="text" class="form-control" placeholder="End point..." autocomplete="off" />
			<!--<div class="input-group-append">
				<button type="button" class="btn btn-search"><i class="fa fa-search"></i></button>
			</div>-->
		</div>
	</div>
	
</div>

<div id="map"></div>

@endsection
@section('scripts')
<script async defer src="//maps.googleapis.com/maps/api/js?libraries=places‌​&key=AIzaSyA0kXy7r6QF_I9nixVMeP1TbIZ3ERfWgYc&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
	$(() => {
		let map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: 10.764237, lng: 106.689597},
        	mapTypeControl: false,
        	zoom: 17,
		});

		map.controls[google.maps.ControlPosition.LEFT_TOP].push(document.getElementById('left-panel'));
		map.controls[google.maps.ControlPosition.LEFT_TOP].push(document.getElementById('direct-box'));

		$('#left-panel').hide();

		$("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss').on('click', () => {
            $('#sidebar').removeClass('active');
            //$('.overlay').fadeOut();
            $('.widget-toggle .widget-toggle-button').hide();
            $('#left-panel').show('fast');
        });

        $('#sidebarCollapse').on('click', () => {
            $('#sidebar').addClass('active');
            //$('.overlay').fadeIn();
            $('.collapse.in').toggleClass('in');
            //$('a[aria-expanded=true]').attr('aria-expanded', 'false');
            $('.widget-toggle .widget-toggle-button').show();
            $('#left-panel').hide('fast');
        });
	});
</script>
@endsection