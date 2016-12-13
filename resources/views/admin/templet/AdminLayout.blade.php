<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="GeeksLabs">

	<title>@if(isset($title)) {{$title}} @else() Admin @endif() </title>

  <link rel="shortcut icon" href="{{ asset('dashboard/img/favicon.png') }}">
  <link href=" {{ asset('dashboard/css/bootstrap-theme.css') }}" rel="stylesheet">
  <link href=" {{ asset('dashboard/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href=" {{ asset('dashboard/css/font-awesome.min.css') }}" rel="stylesheet" />    
  <link rel="stylesheet"  href="{{ asset('dashboard/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href=" {{ asset('dashboard/css/owl.carousel.css') }}" type="text/css">
  <link href=" {{ asset('dashboard/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
  <link rel="stylesheet" href=" {{ asset('dashboard/css/fullcalendar.css') }}">
  <link href=" {{ asset('dashboard/css/widgets.css') }}" rel="stylesheet">
  <link href=" {{ asset('dashboard/css/style.css') }}" rel="stylesheet">
  <link href=" {{ asset('dashboard/css/style-responsive.css') }}" rel="stylesheet" />
  <link href=" {{ asset('dashboard/css/xcharts.min.css') }}" rel=" stylesheet"> 
  <link href=" {{ asset('dashboard/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
  <link href=" {{ asset('dashboard/css/bootstrap-iconpicker.min.css') }}" rel="stylesheet">
</head>
<body>

 
  @include('admin.templet.nav')    
  <aside>
  <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu">                
      <li class="active">
          <a class="" href="{{ Url('/admin') }}">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
          </a>
      </li>               
     

      <li class="sub-menu">
        <a href="javascript:;" class="active">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="{{ Url('/admin/users') }}">Show Users</a></li>                          
            <li><a class="" href="{{ Url('/admin/users/add') }}">Add User</a></li>
        </ul>
      </li> 

      <li class="sub-menu">
        <a href="javascript:;" class="active">
            <i class="fa fa-tags"></i>
            <span>Categories</span>
            <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="{{ Url('/admin/categories') }}">Show Categories</a></li>                          
            <li><a class="" href="{{ Url('/admin/categories/add') }}">Add Category</a></li>
        </ul>
      </li>  

      <li class="sub-menu">
        <a href="javascript:;" class="active">
            <i class="fa fa-shopping-cart"></i>
            <span>Items</span>
            <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="{{ Url('/admin/items') }}">Show Items</a></li>                          
            <li><a class="" href="{{ Url('/admin/items/add') }}">Add Item</a></li>
        </ul>
      </li>

      <li class="sub-menu">
        <a href="javascript:;" class="active">
            <i class="fa fa-comments"></i>
            <span>Comments</span>
            <span class="menu-arrow arrow_carrot-right"></span>
        </a>
        <ul class="sub">
            <li><a class="" href="{{ Url('/admin/comments') }}">Show Comments</a></li>                          
        </ul>
      </li>


    </ul>
  </div>
</aside>

  @yield('content')

    <script src="{{ asset('dashboard/js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
    <!-- nice scroll -->
    <script src="{{ asset('dashboard/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{ asset('dashboard/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/js/owl.carousel.js') }}" ></script>
    <!-- jQuery full calendar -->
    <script src="{{ asset('dashboard/js/fullcalendar.min.js') }}"></script> <!-- Full Google Calendar - Calendar -->
    <!--script for this page only-->
    <script src="{{ asset('dashboard/js/calendar-custom.js') }}"></script>
  <script src="{{ asset('dashboard/js/jquery.rateit.min.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset('dashboard/js/jquery.customSelect.min.js') }}" ></script>
   
    <!--custome script for all page-->
  <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
  <script src="{{ asset('dashboard/js/sparkline-chart.js') }}"></script>
  <script src="{{ asset('dashboard/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('dashboard/js/xcharts.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/jquery.autosize.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/jquery.placeholder.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/gdp-data.js') }}"></script> 
  <script src="{{ asset('dashboard/js/morris.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/sparklines.js') }}"></script> 
  <script src="{{ asset('dashboard/js/charts.js') }}"></script>
  <script src="{{ asset('dashboard/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/iconset-glyphicon.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/bootstrap-iconpicker.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/ckeditor/ckeditor.js') }}"></script>
  <script>

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

</body>
</html>