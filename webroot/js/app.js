$(document).ready(function(){

	var hora = ()=> {
		let time = new Date(),
			hora = time.getHours(),
			min  = time.getMinutes(),
			seg  = time.getSeconds(),
			elem = document.getElementById('hora');

		if(hora < 10)hora = '0' + hora ;
		if(min < 10)min = '0' + min ;
		if(seg < 10)seg = '0' + seg ; 

		elem.innerHTML = hora+':'+min+':'+seg;
	}

	setInterval(hora, 1000);

// Codigo para generar el id de las maquinas

	var alpha  = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',0,1,2,3,4,5,6,7,8,9]
	,	numb   = [0,1,2,3,4,5,6,7,8,9]
	,	pass1=[], pass2=[], pass3=[], pass4=[]
	,	input  = document.getElementById('disabled')
	,	random = (p)=> {
		return Math.ceil(Math.random()*p -1)
	}

	for (var i = 0; i < 3; i++) {
		let pos = alpha[random(alpha.length)]
		pass1.push(pos)
	}
	for (var i = 0; i < 4; i++) {
		let pos = alpha[random(alpha.length)]
		pass2.push(pos)
	}
	for (var i = 0; i < 4; i++) {
		let pos = alpha[random(alpha.length)]
		pass3.push(pos)
	}
	for (var i = 0; i < 2; i++) {
		let pos = numb[random(numb.length)]
		pass4.push(pos)
	}
	
	input.value = pass1.join('')+'-'+pass2.join('')+'-'+pass3.join('')+'-'+pass4.join('')
	
})
// 69Jos123_e$f4#
// 47Kci884¡c&f7_
// AB5-98Y0R-9HG12-12