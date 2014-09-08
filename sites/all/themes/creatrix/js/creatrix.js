jQuery(document).ready(function($){
	$('.portfolio-item').each(function(){
		$(this).hoverdir();
	});
	$('.node-type-commerce-product .field-small-thumb img').hover(function(){
		var img = $(this).attr('src');
		$('.node-type-commerce-product .field-big-thumb img').attr('src',img);
	});
	
	/**Commerce My Cart**/
	$('#block-commerce-cart-cart .block-contents .content').prepend('<div class="commerce_close btn_close">x</div>');
	
	$('#block-commerce-cart-cart .block-contents .block-title').click(function(){
		$('#block-commerce-cart-cart .block-contents .content').fadeToggle('fast').toggleClass('active').css("overflow","visible");
	});
	
	$('.commerce_close').click(function(){
		$('#block-commerce-cart-cart .block-contents .content').toggleClass('active').slideToggle('fast');
	});

	//Confirmation Add to cart 
	if($('#messages .raw .message-inner .added-product-title').length) {
		$('.node-type-commerce-product').toggleClass('overlay');
		$('.node-type-commerce-product').append('<div class="overlay"></div>');
	}
	//close confirmation box
	$('.overlay #messages .close, .overlay #messages .button-wrapper .continue').click(function(){
		$('.alert, div.overlay').remove();
	});
	// Fix Height Shop Icon
	$('.region-shop-bottom').each(function(){
		var subs = $(this).find('> .col-lg-4');
		if(subs.length < 2) return;
		var maxHeight = Math.max.apply(null, $(this).find(">.col-lg-4").map(function(){
			return $(this).height();
		}).get());
		$(this).find(">.col-lg-4").height(maxHeight-3);
	});
})