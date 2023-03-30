<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
    content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="">
    <!-- Page Title  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('public/backend/assets/css/theme.css?ver=3.0.0') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/custom.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/custom.css') }}">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
           @include('layouts.backend.sidebar')

           <div class="nk-wrap ">

               @include('layouts.backend.header')

               @yield('content')

               @include('layouts.backend.footer')

               <!-- footer @e -->
           </div>
           <!-- wrap @e -->
       </div>
       <!-- main @e -->
   </div>
   <!-- app-root @e -->
   <!-- select region modal -->


   <script src="{{ asset('public/backend/assets/js/libs/datatable-btns.js?ver=3.0.0') }}"></script>


   <script src="{{ asset('public/backend/assets/js/bundle.js?ver=3.0.0') }}"></script>
   <script src="{{ asset('public/backend/assets/js/scripts.js?ver=3.0.0') }}"></script>
   <script src="{{ asset('public/backend/assets/js/charts/chart-ecommerce.js?ver=3.0.0') }}"></script>

   <script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>

   <script type="text/javascript">

      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
        CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();

        CKEDITOR.replace( 'editor1' );
        CKEDITOR.config.allowedContent = true;
    })


</script>

  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
  <script type="text/javascript">

    var path = "{{ url('admin/booking-autocomplete-search') }}";  
// Origin
    $( "#originTo" ).autocomplete({

        source: function( request, response ) {

          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },

        select: function (event, ui) {

           $('#originTo').val(ui.item.label);
           console.log(ui.item); 
           return false;
        }

      });


    // Destination

        $( "#toDestination" ).autocomplete({

        source: function( request, response ) {

          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });

        },

        select: function (event, ui) {
           $('#toDestination').val(ui.item.label);
           console.log(ui.item); 
           return false;
        }
      });  

</script>


</body>

</html>