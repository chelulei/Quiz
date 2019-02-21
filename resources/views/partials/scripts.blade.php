<script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/easing.min.js')}}"></script>
<script src="{{asset('assets/js/hoverIntent.js')}}"></script>
<script src="{{asset('assets/js/superfish.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.tabs.min.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
{{--<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>--}}
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/mail-script.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>')}}

<script>
    $('select').select2({dropdownAutoWidth: true});

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.search').fadeIn();
        }
        else {

            $('.search').fadeOut();
        }
    });

    $('#flash-overlay-modal').modal();

    $('div.alert').not('.alert-important,.alert-info').delay(5000).fadeOut(350);

        $('body').on('click', '#submitForm', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var registerForm = $("#Register");
            var formData = registerForm.serialize();
            $( '#name-error' ).html( "" );
            $( '#email-error' ).html( "" );
            $( '#password-error' ).html( "" );

            $.ajax({
                url:'/question',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.name){
                            $( '#name-error' ).html( data.errors.name[0] );
                        }
                        if(data.errors.email){
                            $( '#email-error' ).html( data.errors.email[0] );
                        }
                        if(data.errors.password){
                            $( '#password-error' ).html( data.errors.password[0] );
                        }

                    }
                    if(data.success) {
                        $('#success-msg').removeClass('hide');
                        setInterval(function(){
                            $('#SignUp').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 3000);
                    }
                },
            });
        });
</script>
