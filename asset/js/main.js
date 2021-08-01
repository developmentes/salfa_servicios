addEventListener('DOMContentLoaded', () => {
	const btn = document.querySelector('.btn-menu')
	if(btn){
		btn.addEventListener('click', () => {
			const menu = document.querySelector('.menu-items')
			menu.classList.toggle('show')
		})
	}


});
