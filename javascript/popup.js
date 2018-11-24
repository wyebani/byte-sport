$(function(){
	$(".open-window").click(function(e){
		e.preventDefault();

		$("body").css("overflow", "hidden");

		var idModal = $(this).attr("data-okienkoId");
		$(idModal).fadeIn("fast");

		// Zamknięcie okienka
		$(idModal).find(".window-close").click(function(){
			$(idModal).fadeOut("fast", function(){
				$("body").css("overflow", "auto");
			});
		});

	});
});