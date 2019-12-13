<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Store | {{ $PageTitle }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="_token" content="{{csrf_token()}}" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css/ionicons.css')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('image/favicon-96x96.png')}}">

    <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">

  <script src = "{{ asset('js/ajaxfile.js') }}">
      </script>

</head>
<body class="hold-transition skin-blue sidebar-mini" {{ isset($printOrder) ? doPrintFunction() : null }} >
<div class="wrapper" {{ isset($printOrder) ? doPrintFunction() : null }} >

  <!-- Main Header -->
  @include('admin.shared.Header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.shared.SideBar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- <div class="overlay"></div> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
      {{ $PageTitle}}
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{route($buttonsRoutsname.'.index')}}"  ><i class="fa fa-dashboard"></i> {{ $headerLevelProcessTitle1 }}</a></li>
        <li class="active">{{ $headerLevelProcessTitle2  }}</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->

    	@yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('admin.shared.Footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

<script src='{{ asset('js/moment.min.js') }}'></script>
<script src='{{ asset('js/fullcalendar.min.js') }}'></script>
<script src='{{ asset('js/script.js') }}'></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.js') }}"></script>
    @include('sweetalert::view')
    @yield('ajax')

<script type="text/javascript">
    window.addEventListener('keydown', function(e) {
        if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
            if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
                e.preventDefault();
                return false;
            }
        }
    }, true);

    // Show Form Request To Send Request
    $(document).on('click', '#btn-request', function(e){
        $('body').addClass('no-scroll');
        $('.overlay.popup.request').addClass('popup-show');
        return false;
    });

    // Close Form Request btn
    $(document).on('click', '.title i.fa', function () {
        console.log('clicked');
        $('body').removeClass('no-scroll');
        $('.overlay.popup').removeClass('popup-show');
    });

</script>


</body>
</html>
