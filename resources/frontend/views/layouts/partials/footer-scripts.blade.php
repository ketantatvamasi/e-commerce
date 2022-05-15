<script src="{{asset('assets/frontend/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/plugins/glightbox.min.js')}}"></script>

<!-- Customscript js -->
<script src="{{asset('assets/frontend/js/script.js')}}"></script>
{{--@stack('scripts')--}}
<script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--    <script src="{{asset('assets/frontend/js/custom.js')}}"></script>--}}
<script>
    $(".subMenu").hide();
    $(".subMenu").parent("li").on("mouseenter", function() {
        $(this).find(">.subMenu").not(':animated').slideDown(100);
        $(this).toggleClass("active");
    });
    // Shows SubMenu when it's parent is hovered.
    // $(".subMenu").parent("li").hover(function () {
    //     $(this).find(">.subMenu").not(':animated').slideDown(100);
    //     $(this).toggleClass("active");
    // });

    // Hides SubMenu when mouse leaves the zone.
    $(".subMenu").parent("li").mouseleave(function () {
        $(this).find(">.subMenu").slideUp(50);
    });

    // Prevents scroll to top when clicking on <a href="#">
    $("a[href=\"#\"]").click(function () {
        return false;
    });
    $('.plus2').on('click',function(e){
        // alert('click');
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        // alert(id);
        var quantity =$('#quantity_'+id).val();
        // alert(quantity);
        $.ajax({
            url: '{{ route('update.cart2') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function (response) {
                // console.log(response);
                window.location.reload();
            }
        });
    });
    $('.plus').on('click',function(e){
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        // alert(id);
        var quantity =$('#quantity_'+id).val();
        // alert(quantity);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function (response) {
                // console.log(response);
                window.location.reload();
            }
        });
    });
    $('.minus2').on('click',function(e){
        // alert('click');
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        var quantity =$('#quantity_'+id).val();
        $.ajax({
            url: '{{ route('update.cart2') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
    $('.minus').on('click',function(e){
        // alert('click');
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        var quantity =$('#quantity_'+id).val();
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
    $(".remove-from-cart2").on('click',function (e) {
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        // alert(id);
        $.ajax({
            url: '{{ route('remove.from.cart2') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
    $(".remove-from-cart").on('click',function (e) {
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        // alert(id);
        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
</script>
@stack('script')
