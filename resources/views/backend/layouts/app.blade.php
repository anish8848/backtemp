<!DOCTYPE html>
<html lang="en">
<head>
  <script src='https://www.google.com/recaptcha/api.js'></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->

    <meta name="author" content="National Insurance">

    <!-- Title-->
    <title>{{ config('app.name') }} - @yield('title', 'Page')</title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{{ asset('images/logo.jpg') }}}">
    <link href="//fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('backend/css/materialadmin-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/materialadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/uploadifive/uploadifive.css')}}"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


    <!-- Page Level Styles -->
    @stack('styles')
</head>
<body class="menubar-hoverable header-fixed menubar-pin">
    @if (auth()->guest())
        @yield('guest')
    @else
        <!-- BEGIN HEADER -->
        @include('backend.layouts.partials.header')
        <!-- END HEADER -->
        <!-- BEGIN BASE-->
        <div id="base">
            <div id="content">
                @yield('content')


            </div>

            @include('backend.layouts.partials.menubar')
        </div>
        <!-- END BASE -->
    @endif

    <!-- Global Script For Setting Session Messages and Active URL -->
    @include('backend.layouts.partials.global-script')

    <!-- Scripts -->
    <script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/spin.js/spin.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/autosize/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('backend/uploadifive/jquery.uploadifive.js') }}" type="text/javascript"></script>

    <script src="{{ asset('backend/js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/source/App.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/source/AppNavigation.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/source/AppCard.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/source/AppForm.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/source/AppVendor.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/source/AppBootBox.min.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::render() !!}

    <!--  Uploadifive  -->
<script type="text/javascript">
@php $timestamp = time(); @endphp
    $(function () {
        $('#blog_image').uploadifive({
            'auto': true, // Automatically upload a file when it's added to the queue
            'buttonClass': false, // A class to add to the UploadiFive button
            'buttonText': 'Upload Image', // The text that appears on the UploadiFive button
            'checkScript': "@php echo url('backend/uploadifive/check-exists.php'); @endphp", // Path to the script that checks for existing file names
            'dnd': true, // Allow drag and drop into the queue
            'dropTarget': false, // Selector for the drop target
            'fileSizeLimit': '153600', // Maximum allowed size of files to upload
            'fileType': false, // Type of files allowed (image, etc)
            'width': 180,
            'height': 30,
            'formData': {
                'timestamp': '@php echo $timestamp; @endphp',
                'targetFolder': '/uploads/blogs/',
                'token': '@php echo @md5('unique_salt' . $timestamp); @endphp'
            },
            'method': 'post', // The method to use when submitting the upload
            'multi': true, // Set to true to allow multiple file selections
            'queueID': 'queueImage', // The ID of the file queue
            'queueSizeLimit': 10, // The maximum number of files that can be in the queue
            'removeCompleted': true, // Set to true to remove files that have completed uploading
            'simUploadLimit': 0, // The maximum number of files to upload at once
            'truncateLength': 0, // The length to truncate the file names to
            'uploadLimit': 10, // The maximum number of files you can upload
            'uploadScript': "@php echo url('backend/uploadifive/uploadifive.php'); @endphp",
            onUploadComplete: function (file, data, response) {
                if ($('#fileList').val() != '') {
                    $('#fileList').val($('#fileList').val() + ':' + data);
                } else {//alert('blank');
                    $('#fileList').val(data);
                }
                imagePath = "@php echo base_path(); @endphp";
                $('.imagethumbs-form').prepend('<div class="imagethumb-form additional-file-input" id="add-image1" title="menson"> <a class="close-msg" title="Delete" id="deleteImg">Delete</a> <a href="#" title="' + data + '" class="img-wrap"><img src="' + "@php echo url('/'); @endphp" + '/public/backend/createThumb/create_thumb.php?src=' + imagePath + '/uploads/blogs/' + data + '&w=150&h=150" alt="' + data + '" /></a></div>');
            }
        });
    });

//THIS FUNCTION IS TRIGGERED WHILE UPLOADED IMAGE, IS REQUIRED TO DELETE:
    $(function () {
        //$('a#deleteImg').live('click',function(){
        //$('a#deleteImg').on('click',function(){
        $(document).on('click', '#deleteImg', function () {
            var _img = $(this).next().attr("title");//alert(_img);
            var _this = $(this).parent();
            delete_image(_img);
            $.post("{{ route('page.delete_image') }}", {imgName: _img},
                    function (data) {
                        $("i.info").text(data).fadeOut(1000);
                        _this.fadeOut(1000, function () {
                            _this.remove();
                            $("i.info").text('');
                            $("i.info").removeAttr('style');
                        });
                    });
        });
    });

//THIS IS COMMON FUNCTION FOR DELETING FILE FORM THE LIST:
    function delete_image(name) {
        var filelist = $('#fileList').val();
        var filenames = filelist.split(':'); //alert(filenames.length);
        $('#fileList').val('');
        for (var i = 0; i < filenames.length; i++)
        {
            if (filenames[i] != name)
            {
                if ($('#fileList').val() == '')
                    $('#fileList').val(filenames[i]);
                else
                    $('#fileList').val($('#fileList').val() + ':' + filenames[i]);
            }
        }
    }

</script>


    <!-- Page Level Scripts -->
    @stack('scripts')
</body>
</html>
