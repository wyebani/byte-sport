$(function(){
	$(".uruchom-okienko").click(function(e){
		e.preventDefault();

		$("body").css("overflow", "hidden");

		var idOkienka = $(this).attr("data-okienkoId");
		$(idOkienka).fadeIn("fast");

		// Zamknięcie okienka
		$(idOkienka).find(".window-close").click(function(){
			$(idOkienka).fadeOut("fast", function(){
				$("body").css("overflow", "auto");
			});
		});

	});
});