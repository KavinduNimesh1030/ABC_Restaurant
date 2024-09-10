@section('scripts')
<script src="{{url('assets/dist/js/core.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Alert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"
    integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{url('admin_assets/js/alert.js')}}"></script>

<script>

    $(document).ready(function() {
        $.ajax({
            url: '{{ route("home.cart") }}',
            type: 'GET',
            success: function(response) {
                console.log('Cart data loaded:', response);
                updateCartUI(response);
            },
            error: function(xhr, status, error) {
                console.error('Error loading cart data:', error);
            }
        });
    });

    function addtocart(event) {
        event.preventDefault();
        var productId = $(event.currentTarget).data('id');
        $.ajax({
            url: `{{ route('home.add-to-cart', ['id' => ':id']) }}`.replace(':id', productId),
            type: 'POST',
            data: {
                id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('Product added to cart!');
                console.log('Product added to cart:', response);
                updateCartUI(response);
            },
            error: function(xhr, status, error) {
                console.error('Error adding product to cart:', error);
            }
        });
    }

    // function updateCartUI(response) {
    //     let totalQuantity = 0;
    //     $.each(response.cart, function(key, item) {
    //         totalQuantity += item.quantity;
    //     });
    //     let notificationElement = $('.cart-icon .notification');
    //     notificationElement.text(totalQuantity);
    //     notificationElement.css('display', 'block');
    //     $('.cart-value .value').text(response.totalValue);
    // }

    function updateCartUI(response) {
    // Update the cart icon quantity and total value
    let totalQuantity = 0;
    $.each(response.cart, function(key, item) {
        totalQuantity += item.quantity;
    });

    // Update the notification badge with the total quantity and display it
    let notificationElement = $('.cart-icon .notification');
    notificationElement.text(totalQuantity);
    if (totalQuantity > 0) {
        notificationElement.css('display', 'block');
    } else {
        notificationElement.css('display', 'none');
    }

    // Update the cart total value in the navigation bar
    $('.cart-value .value').text(response.totalValue);

    let cartDetails = $('.cart-details .cart-table');
    cartDetails.css('display', 'block');
    cartDetails.empty();

    $.each(response.cart, function(key, item) {
        let product = item.product;
        let row = `
            <tr>
                <td class="title">
                    <span class="name"><a href="#product-modal" data-toggle="modal">${product.name}</a></span>
                   
                </td>
                   <td class="price"> x ${(item.quantity)}</td>
                <td class="price">Rs.${(product.price * item.quantity).toFixed(2)}</td>
                <td class="actions">
                    <a href="#product-modal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                    <a href="#" class="action-icon remove-item" data-id="${product.id}"><i class="ti ti-close"></i></a>
                </td>
            </tr>
        `;
        cartDetails.append(row);
    });

    // Update the cart summary
    $('.cart-products-total').text(response.totalValue);
    $('.cart-total').text(response.totalValue);

    // Show or hide the empty cart message
    if (totalQuantity > 0) {
        $('.cart-empty').hide();
    } else {
        $('.cart-empty').show();
    }
}
$(document).on('click', '.remove-item', function(event) {
    event.preventDefault();
    let productId = $(this).data('id');

    // Make an AJAX request to remove the item from the cart
    $.ajax({
        url: `{{ route('home.remove-from-cart', ['id' => ':id']) }}`.replace(':id', productId),
        type: 'POST',
        data: {
            id: productId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            updateCartUI(response);
        },
        error: function(xhr, status, error) {
            console.error('Error removing product from cart:', error);
        }
    });
});


//checkout
        $('#checkoutBtn').on('click', function(e) {
            e.preventDefault(); 
            var formData = new FormData();
            formData.append('first_name', $('#firstName').val());
            formData.append('last_name', $('#lastName').val());
            formData.append('address', $('#address').val());
            formData.append('phone_number', $('#phoneNumber').val());
            formData.append('payment_type', $('input[name="payment_type"]:checked').val());


            $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
             });

            $.ajax({
                url: '{{ route('home.checkout') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    showSuccessAlert(response.success,'success','{{ route('home.menu') }}');
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

    //reservation
        // $('#booking-form1').on('submit', function(e) {
        //     e.preventDefault();
        //     var formData = $(this).serialize();

            
        //     $.ajaxSetup({
        //          headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //               }
        //      });

        //     $.ajax({
        //         type: 'POST',
        //         url: '{{ route("home.reservation.store") }}',
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: function(response) {
        //             alert('Reservation successful!');
        //             $('#booking-form1')[0].reset();
        //         },
        //         error: function(xhr, status, error) {
        //             var err = JSON.parse(xhr.responseText);
        //             alert('Error: ' + err.message);
        //         }
        //     });
        // });

    $('#reservationBtn').on('click', function(e) {
    e.preventDefault();

    var formData = new FormData();
    formData.append('name', $('#firstName').val());
    formData.append('email', $('#email').val());
    formData.append('phone', $('#phone').val());
    formData.append('date', $('#reservation_date').val());
    formData.append('attendents', $('#attendents').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '{{ route("home.reservation.store") }}',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#booking-form1')[0].reset();
            showSuccessAlert(response.success,'success','{{ route('home') }}');
        },
        error: function(xhr, status, error) {
            var err = JSON.parse(xhr.responseText);
            alert('Error: ' + err.message);
        }
    });
});


</script>
@endsection