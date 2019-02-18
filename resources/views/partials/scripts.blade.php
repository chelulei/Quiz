<script src="{{asset('assets/js/vendor/$-2.2.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{asset('assets/js/$-ui.js')}}"></script>
<script src="{{asset('assets/js/easing.min.js')}}"></script>
<script src="{{asset('assets/js/hoverIntent.js')}}"></script>
<script src="{{asset('assets/js/superfish.min.js')}}"></script>
<script src="{{asset('assets/js/$.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/js/$.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/$.tabs.min.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
{{--<script src="{{asset('assets/js/$.nice-select.min.js')}}"></script>--}}
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/mail-script.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('/assets/vendor/jasny-bootstrap/js/jasny-bootstrap.js')}}"></script>

<script>
    $('select').select2({dropdownAutoWidth : true});

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200)
        {
            $('.search').fadeIn();
        }
        else
        {

            $('.search').fadeOut();
        }
    });

    $('#flash-overlay-modal').modal();

    $('div.alert').not('.alert-important,.alert-info').delay(5000).fadeOut(350);
</script>