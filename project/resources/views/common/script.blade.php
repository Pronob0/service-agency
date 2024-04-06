
<!-- jQuery Min JS -->
<script src="{{ asset('assets/front') }}/js/jquery.min.js"></script>
<!-- Popper Min JS -->
<script src="{{ asset('assets/front') }}/js/popper.min.js"></script>
<!-- Bootstrap Min JS -->
<script src="{{ asset('assets/front') }}/js/bootstrap.bundle.min.js"></script>
<!-- Mean Menu JS  -->
<script src="{{ asset('assets/front') }}/js/jquery.meanmenu.js"></script>
<!-- Appear Min JS -->
<script src="{{ asset('assets/front') }}/js/jquery.appear.min.js"></script>
<!-- CounterUp Min JS -->
<script src="{{ asset('assets/front') }}/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('assets/front') }}/js/jquery.counterup.min.js"></script>
<!-- Owl Carousel Min JS -->
<script src="{{ asset('assets/front') }}/js/owl.carousel.min.js"></script>
<!-- Magnific Popup Min JS -->
<script src="{{ asset('assets/front') }}/js/jquery.magnific-popup.min.js"></script>
<!-- Isotope Min JS -->
<script src="{{ asset('assets/front') }}/js/isotope.pkgd.min.js"></script>
<!-- Swiper Min JS -->
<script src="{{ asset('assets/front') }}/js/swiper.min.js"></script>
<!-- Vanilla Tilt Min JS -->
<script src="{{ asset('assets/front') }}/js/vanilla-tilt.min.js"></script>
<!-- WOW Min JS -->
<script src="{{ asset('assets/front') }}/js/wow.min.js"></script>
<!-- Ajax Mail JS -->
<script src="{{ asset('assets/front') }}/js/ajax.mail.js"></script>
<!-- Main JS -->
<script src="{{ asset('assets/front') }}/js/main.js"></script>








@include('notify.alert')


<script>
    'use strict';
  
    $(document).ready(function() {
	$('.btn-accept').on('click', function() {
        
		$('#addremove').removeClass('show');
		$('#addremove').addClass('d-none');
	});
});

</script>

@if (@$gs->is_tawk)
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        'use strict';
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = "https://embed.tawk.to/{{ @$gs->tawk_id }}";
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@endif
