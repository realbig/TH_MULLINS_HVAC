!function(a){function b(a,b){var c="tel:"+a.replace(/\D/g,"");return void 0===b&&(b=a),'<a href = "'+c+'" class = "phone-number-link">'+b+"</a>"}wp.customize("mullins_logo_image",function(b){b.bind(function(b){a(".logo a img").attr("src",b)})}),wp.customize("mullins_phone_number",function(c){c.bind(function(c){a("#site-header .phone-number-link").replaceWith(b(c))})}),wp.customize("mullins_facebook_url",function(b){b.bind(function(b){a("#site-header .facebook a").attr("href",b)})}),wp.customize("cta_dependability_promise_color",function(a){a.bind(function(a){console.log("Due to how the Tab Toggles trigger, there is no good way to preview this. Neither through postMessage or Refresh.")})}),wp.customize("cta_service_call_image",function(b){b.bind(function(b){a("#schedule_service_call img").attr("src",b)})}),wp.customize("cta_dependability_promise_image",function(a){a.bind(function(a){console.log("Due to how the Tab Toggles trigger, there is no good way to preview this. Neither through postMessage or Refresh.")})}),wp.customize("mullins_indoor_air_quality_icon",function(b){b.bind(function(b){a("#indoor_air_quality_grid_item .fa").removeAttr("class").addClass("fa fa-"+b)})}),wp.customize("mullins_refrigeration_icon",function(b){b.bind(function(b){a("#refrigeration_grid_item .fa").removeAttr("class").addClass("fa fa-"+b)})}),wp.customize("mullins_geo_thermal_icon",function(b){b.bind(function(b){a("#geo_thermal_grid_item .fa").removeAttr("class").addClass("fa fa-"+b)})}),wp.customize("mullins_air_conditioning_icon",function(b){b.bind(function(b){a("#air_conditioning_grid_item .fa").removeAttr("class").addClass("fa fa-"+b)})}),wp.customize("mullins_heating_icon",function(b){b.bind(function(b){a("#heating_grid_item .fa").removeAttr("class").addClass("fa fa-"+b)})})}(jQuery);
//# sourceMappingURL=customizer.js.map