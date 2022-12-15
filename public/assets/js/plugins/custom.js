$(document).ready(function () {

    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // header
    
        function loadcart()
        {
            $.ajax({
                method: "GET",
                url: "/load-cart-data",
                success: function (response) {
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);
                }
            });
        }


        function loadwishlist()
        {
            $.ajax({
                method: "GET",
                url: "/load-wish-data",
                success: function (response) {
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);
                }
            });
        }
        
    // product.view

    $('.addToCart').click(function (e) { 
        e.preventDefault();

        var product_id    = $(this).closest('.product_data').find('.product_id').val();
        var product_qty   = $(this).closest('.product_data').find('.qty_input').val();
        var product_color = $(this).closest('.product_data').find('.color_input').val();

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id'    : product_id,
                'product_qty'   : product_qty,
                'product_color' : product_color,
            },
            success: function (response) {
                swal("" ,response.status ,"success");
                loadcart();
            }
        });
        
    });

    $('.addtowishlist').click(function (e) { 
        e.preventDefault();

        var product_id    = $(this).closest('.product_data').find('.product_id').val();
        

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id'    : product_id,
            },
            success: function (response) {
                swal("" ,response.status ,"success");
                loadwishlist()
            }
        });
    });

    // cart.cart

    $('.changeQuantity').click(function (e) { 
        e.preventDefault();
        
        var product_id = $(this).parents('.product_quantity').find('.product_id').val();
        var qty        = $(this).parents('.product_quantity').find('.qty_input').val();
        var id_product = $(this).parents('.product_quantity').find('.id').val();
        // console.log(product_id);
        // return false;
        data = {
           'product_id'  : product_id,
           'product_qty' : qty,
           'id'          : id_product ,
        }

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    });
    
     $('.changeQuantity').click(function (e) { 
        e.preventDefault();
        
        var product_id = $(this).parents('.product_quantity').find('.product_id').val();
        var qty        = $(this).parents('.product_quantity').find('.qty_input').val();
        var id_product = $(this).parents('.product_quantity').find('.id').val();
        // console.log(product_id);
        // return false;
        data = {
           'product_id'  : product_id,
           'product_qty' : qty,
           'id'          : id_product ,
        }

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    });
});

var availableTags = [];
$.ajax({
  method: "GET",
  url: "/product-list",
  success: function (response) {
      startAutoComplete(response);
  }
});

function startAutoComplete(availableTags)
{
    $( "#search_product" ).autocomplete({
      source: availableTags
    });
}
