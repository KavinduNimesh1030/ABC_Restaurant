<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{URL('admin_assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{URL('admin_assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{URL('admin_assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{URL('admin_assets/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{URL('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{URL('admin_assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{URL('admin_assets/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{URL('admin_assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{URL('admin_assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{URL('admin_assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
{{-- <script src="{{URL('admin_assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script> --}}


<!-- Main JS -->
<script src="{{URL('admin_assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{URL('admin_assets/js/app-ecommerce-dashboard.js')}}"></script>

<!-- Alert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"
    integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"
    integrity="sha512-JyCZjCOZoyeQZSd5+YEAcFgz2fowJ1F1hyJOXgtKu4llIa0KneLcidn5bwfutiehUTiOuK87A986BZJMko0eWQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Page js -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script> --}}
<script src="{{url('admin_assets/vendor/libs/@form-validation/popular.js')}}"></script>
<script src="{{url('admin_assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
<script src="{{url('admin_assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>

<!-- Vendors JS -->
<script src="{{url('admin_assets/vendor/libs/dropzone/dropzone.js')}}"></script>
<script src="{{url('admin_assets/js/forms-selects.js')}}"></script>
{{-- <script src="{{url('admin_assets/js/forms-typeahead.js')}}"></script> --}}
<script src="{{url('admin_assets/vendor/libs/tagify/tagify.js')}}"></script>

<script src="{{url('admin_assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{url('admin_assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{url('admin_assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>

<script src="{{url('admin_assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{url('admin_assets/vendor/libs/tagify/tagify.js')}}"></script>

<script src="{{url('admin_assets/js/alert.js')}}"></script>

<script>
      new DataTable('#table', {
        paging: true,
        scrollCollapse: true,
        scrollY: '400px',
      //   "columnDefs": [
      //   {"className": "dt-left", "targets": "_all"}
      // ],
    
    });
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl);
    });

    toastList.forEach(function(toast) {
        toast.show();
    });

//     $(document).ready(function() {
//     // show the alert
//     setTimeout(function() {
//         $(".alert").alert('close');
//     }, 2000);
    
// });
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
});

$(".menu-sub").on("click", function (event) {
  event.stopPropagation();
  var target = event.currentTarget;
  $(target).siblings('li').slideToggle("fast");
});

//loader - script
$(window).on('load', function() {
    //for use in production please remove this setTimeOut
    setTimeout(function(){ 
        $('.preloader').addClass('preloader-deactivate');
    }, 500);
    //uncomment this line for use this snippet in production
    //	$('.preloader').addClass('preloader-deactivate');
});
$(document).ready(function() {
        // Get the current URL
        var currentUrl = window.location.href;

        // Check each menu item's URL against the current URL
        $(".menu-item").each(function() {
            var menuItemUrl = $(this).find("a").attr("href");
            if (currentUrl.includes(menuItemUrl)) {
                $(this).addClass("active");
                $(this).parents('.menu-sub').show().prev('.menu-link').addClass('open');
            }
        });

        // Open menu on click and toggle active class
        $(".menu-link.menu-toggle").click(function() {
            var submenu = $(this).next('.menu-sub');
            submenu.slideToggle();
            $(this).toggleClass('open');
            $(this).parent('.menu-item').siblings().find('.menu-sub').slideUp();
            $(this).parent('.menu-item').siblings().find('.menu-link').removeClass('open');
        });
    });


</script>