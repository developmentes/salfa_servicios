




let updateButton = document.querySelectorAll('input');
function limpiarInput(){

	updateButton.forEach((inp)=>{
		inp.value='';
		console.log(inp);

	});
}
limpiarInput();