!function(a){function b(a,b){var c="tel:"+a.replace(/\D/g,"");return void 0===b&&(b=a),'<a href = "'+c+'" class = "phone-number-link">'+b+"</a>"}wp.customize("mullins_logo_image",function(b){b.bind(function(b){a(".logo a img").attr("src",newval)})}),wp.customize("mullins_phone_number",function(c){c.bind(function(c){a("#site-header .phone-number-link").html(b(c))})}),wp.customize("mullins_facebook_url",function(b){b.bind(function(b){a("#site-header .facebook a").attr("href",b)})})}(jQuery);
//# sourceMappingURL=customizer.js.map