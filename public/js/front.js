
//rerender cart after Ajax cart modifications
function renderCart(data){
  $("#cart-container").replaceWith(data);
  $('.js-cart-animate').click(function(){
    if($(".cart-popup-wrap").hasClass("visible")==false){
      $(".cart-popup-wrap").addClass("visible");
      $(".cart-popup-wrap").show();
    }else{
      $(".cart-popup-wrap").removeClass("visible");
      $(".cart-popup-wrap").hide();
    }
  });
}

//return refreshed url with the specified value
function refreshUrl(url, value){
  let slug_array = url.split('/');
  slug_array[slug_array.length-1] = value;
  return slug_array.join('/');
}

//handling Ajax req after clicking rapid add button
$('.btn.btn-small.add').click(function(e){
  e.preventDefault();
  $.ajax({
    url: $(this).attr('href')
  }).done(function( data ) {
    renderCart(data);
    toastr.success('Product added to the cart.');
  });
});

//handling Ajax req after clicking add to cart button on single page
$('.btn-add-to-cart').click(function(e){
  e.preventDefault();
  var post_data = $('form').serialize();

  $.post( "/ajax/cart/add", post_data)
  .done(function( data ) {
    renderCart(data);
    toastr.success('Product added to the cart.');
  });
});

//handling Ajax req after clicking delete item button
$('.product-del.remove').click(function(e){
  e.preventDefault();
  var element = $(this);
  $.ajax({
    url: element.attr('href')
  }).done(function( data ) {
    element.closest( "tr" ).remove();
    let sub_total = parseInt(element.closest( "td" ).siblings( ".product-subtotal" ).find('.total.amount').html().replace('$', ''));
    let total_total =   parseInt($('div.cart-total > h5 > span').html().replace('$', ''));
    $('div.cart-total > h5 > span').html('$'+(total_total-sub_total));
    renderCart(data);
    toastr.warning('Product deleted from cart.');
  });
});

//handling Ajax req after clicking increment qty button
$('.quantity-plus').click(function(e){
  e.preventDefault();
  var element = $(this);
  var url = element.attr('href');
  $.ajax({
    url: url
  }).done(function( data ) {
    let value = parseInt(element.siblings( "input" ).val());
    element.siblings( "input" ).val(value+1);
    let opposite_url = element.siblings( "a" ).attr('href');
    element.siblings( "a" ).attr('href', refreshUrl(opposite_url, value+1));
    element.attr('href', refreshUrl(url, value+1));
    let item_price = parseInt(element.closest( "td" ).siblings( ".product-price" ).find('.price.amount').html().replace('$', ''));
    let sub_total = parseInt(element.closest( "td" ).siblings( ".product-subtotal" ).find('.total.amount').html().replace('$', ''));
    element.closest( "td" ).siblings( ".product-subtotal" ).find('.total.amount').html('$'+(sub_total+item_price));
    $('div.cart-total > h5 > span').html('$'+(sub_total+item_price));
    renderCart(data);
    toastr.success('One item added to the cart.');
  });
});

//handling Ajax req after clicking decrement qty button
$('.quantity-minus').click(function(e){
  e.preventDefault();
  var element = $(this);
  var url = element.attr('href');
  $.ajax({
    url: url
  }).done(function( data ) {
    var value = parseInt(element.siblings( "input" ).val());
    var item_price = parseInt(element.closest( "td" ).siblings( ".product-price" ).find('.price.amount').html().replace('$', ''));
    if(value>1){
      element.siblings( "input" ).val(value-1);
      let opposite_url = element.siblings( "a" ).attr('href');
      element.siblings( "a" ).attr('href', refreshUrl(opposite_url, value-1));
      let sub_total = parseInt(element.closest( "td" ).siblings( ".product-subtotal" ).find('.total.amount').html().replace('$', ''));
      element.closest( "td" ).siblings( ".product-subtotal" ).find('.total.amount').html('$'+(sub_total-item_price));
      element.attr('href', refreshUrl(url, value-1));
    }else{
      element.closest( "tr" ).remove();
    }
    let total_total =   parseInt($('div.cart-total > h5 > span').html().replace('$', ''));
    $('div.cart-total > h5 > span').html('$'+(total_total-item_price));
    renderCart(data);
    toastr.warning('One item deleted from the cart.');
  });
});
