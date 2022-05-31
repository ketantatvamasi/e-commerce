
<script src="{{asset('assets/frontend/js/jquery.min.js')}}" ></script>
<script src="{{asset('assets/frontend/js/plugins/swiper-bundle.min.js')}}"></script>

<script src="{{asset('assets/frontend/js/plugins/glightbox.min.js')}}"></script>

<!-- Customscript js -->
<script src="{{asset('assets/frontend/js/script.js')}}"></script>
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
    $(".cart__remove--btn").on('click',function (e) {
        e.preventDefault();
        var id =  $(this).parents(".id").attr("data-id");
        // alert(id);
        $.ajax({
            url: '{{ route('remove.from.wishlist') }}',
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
    $('document').ready(function() {
        $('.productview').on('click', function (e) {
            // alert('click');
            e.preventDefault();
            var id = $(this).parents(".id").attr("data-id");
            $.ajax({
                url: '{{ route('openModel') }}',
                method: "GET",
                data: {
                    id: id
                },
                success: function (response) {
                    // console.log(response['product']);
                    $('#View').addClass('is-visible');
                    var data = response['size'];
                    var cnt = 1;
                    var size = '<fieldset class="variant__input--fieldset weight"><legend class="product__variant--title mb-8">Size :</legend>';
                    $.each(data, function(i){
                        // console.log(data[i]);
                        size+='<input id="weight'+cnt+'" name="weight" type="radio"><label class="variant__size--value" for="weight'+cnt+'">'+data[i]['size']+'</label>';
                        cnt++;
                    })
                    size+='</fieldset>';
                    var getvalues = response['product'][0]['image_name'].split(",");
                    var image = '';
                    var imageSilder = '';
                    $.each(getvalues, function(i){
                        var path = "{{asset('images')}}/"+getvalues[i];
                        // console.log(path);
                        image +='<div class="swiper-slide"><div class="product__media--preview__items"><a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="'+path+'"><img class="product__media--preview__items--img" src="'+path+'" alt="product-media-img"></a><div class="product__media--view__icon"><a class="product__media--view__icon--link glightbox" href="'+path+'" data-gallery="product-media-preview"><svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg></a></div></div></div>';
                        // image += '<div class="swiper-slide"><div class="product__media--preview__items"><a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="'+path+'"><img class="product__media--preview__items--img" src="'+path+'" alt="product-media-img"></a><div class="product__media--view__icon"><a class="product__media--view__icon--link glightbox" href="'+path+'" data-gallery="product-media-preview"><svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg></a></div></div></div>';
                        imageSilder+= '<div class="swiper-slide"><div class="product__media--nav__items"><img class="product__media--nav__items--img" src="'+path+'" alt="product-nav-img"></div></div>';
                    });
                    var url = "{{url('add-to-wishlist')}}/"+response['product'][0]['id'];
                    var addtoCard = "{{url('add-to-cart2')}}/"+response['product'][0]['id'];
                    $('.productName').html(response['product'][0]['product_name']);
                    $('.decription').html(response['product'][0]['decription']);
                    $('.salePrice').html('₹'+response['product'][0]['saleing_price']);
                    $('.mrpPrice').html('₹'+response['product'][0]['mrp_price']);
                    $('.brand').html(response['product'][0]['brand_name']);
                    $('.size').html(size);
                    $('.imagePreview').html(image);
                    $('.imageSilder').html(imageSilder);
                    $(".addLink").attr("href", url);
                    $(".addtoCard").attr("href", addtoCard);
                }
            });
        });
    });
</script>
@stack('script')
