jQuery(document).ready(()=>{
	const formInput = $('.gfield .ginput_container input, .gfield .ginput_container select, .gfield .ginput_container textarea')

	formInput.each(function (){
		$(this).click(function (){
			const ariaDescribedly = $(this).attr('aria-describedby')
			$('#' + ariaDescribedly).fadeOut()
		})
	})
})
