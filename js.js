var executed = false;
function gerarEsquerdoTipo() {
	if (!executed) {
		executed = true;
	    
	    var input2 = document.createElement("input");
		var input1 = document.createElement("input");
	                              
		var propria = document.createTextNode("Música própria");
		var cover = document.createTextNode("Música cover");		
		
		input1.setAttribute('class', 'checkbox');
	    input1.setAttribute('type', 'checkbox');
		input1.setAttribute('value', 'cover');
		input1.setAttribute("onchange", "gerarEsquerdoGenero()");

		document.getElementById("label-filtrar-left").appendChild(input1);
		document.getElementById("label-filtrar-left").appendChild(cover);
		
		input2.setAttribute('class', 'checkbox');
	    input2.setAttribute('type', 'checkbox');
		input2.setAttribute('value', 'propria');
		input2.setAttribute("onclick", "gerarEsquerdoGenero()");
		
		document.getElementById("label-filtrar-left2").appendChild(input2);
		document.getElementById("label-filtrar-left2").appendChild(propria);
	};
}

var executed2 = false;
function gerarEsquerdoGenero(){
	if (!executed2) {
		executed2 = true;

		var divContainer = document.createElement("div");
		divContainer.setAttribute("class", "container-select-left");

		var p = document.createElement("p");
		p.setAttribute('class', 'genero-left');

		var inputIMG = document.createElement("input");
		inputIMG.setAttribute("class", "input-left");
		inputIMG.setAttribute("type", "image");
		inputIMG.setAttribute("src", "_img/generoico.png")

		var genero = document.createTextNode("Gênero");
		p.appendChild(genero);

		divContainer.appendChild(p);
		divContainer.appendChild(inputIMG);

		document.getElementById("esquerdo-local").appendChild(divContainer);


		var select = document.createElement("select");
		select.setAttribute("onchange", "gerarEsquerdoLocal()");
		select.setAttribute("class", "select-left");

		var option1 = document.createElement("option");
		
		var option2 = document.createElement("option");
		
		var blues = document.createTextNode("Blues");

		select.appendChild(option1);
		option1.setAttribute("value", "nada");
		select.appendChild(option2);

		option2.appendChild(blues);
		option2.setAttribute("value", "blues");
		document.getElementById("esquerdo-local").appendChild(select);
	};
}

var executed3 = false;
function gerarEsquerdoLocal(){
	if (!executed3) {
		executed3 = true;

		var divContainer = document.createElement("div");
		divContainer.setAttribute("class", "container-select-left");

		var p = document.createElement("p");
		p.setAttribute('class', 'genero-left');

		var inputIMG = document.createElement("input");
		inputIMG.setAttribute("class", "input-left");
		inputIMG.setAttribute("type", "image");
		inputIMG.setAttribute("src", "_img/localico.png")

		var genero = document.createTextNode("Onde você está?");
		p.appendChild(genero);

		divContainer.appendChild(p);
		divContainer.appendChild(inputIMG);

		document.getElementById("esquerdo-genero").appendChild(divContainer);


		var select = document.createElement("select");
		select.setAttribute("onchange", "gerarBotaoFiltrar()");
		select.setAttribute("class", "select-left");

		var option1 = document.createElement("option");
		
		var option2 = document.createElement("option");
		
		var blues = document.createTextNode("Rio de Janeiro");

		select.appendChild(option1);
		option1.setAttribute("value", "nada");
		select.appendChild(option2);

		option2.appendChild(blues);
		option2.setAttribute("value", "rj");
		document.getElementById("esquerdo-genero").appendChild(select);
	};
}

var executed4 = false;
function gerarBotaoFiltrar(){
	if (!executed4) {
		executed4 = true;
		var botao = document.createElement("button");
		botao.setAttribute("id", "button-filtrar-left");

		var filtrar = document.createTextNode("FILTRAR");
		botao.appendChild(filtrar);
		document.getElementById("sub-container-filtrar").appendChild(botao);
	};
}

/////////////////////////////////Direito\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

var executed5 = false;
function gerarDireitoTipo() {
	if (!executed5) {
		executed5 = true;

	    var input2 = document.createElement("input");
		var input1 = document.createElement("input");
	                              
		var propria = document.createTextNode("Música própria");
		var cover = document.createTextNode("Música cover");		
		
		input1.setAttribute('class', 'checkbox');
	    input1.setAttribute('type', 'checkbox');
		input1.setAttribute('value', 'cover');
		input1.setAttribute("onchange", "gerarDireitoGenero()");

		document.getElementById("label-filtrar-right").appendChild(cover);
		document.getElementById("label-filtrar-right").appendChild(input1);
		
		
		input2.setAttribute('class', 'checkbox');
	    input2.setAttribute('type', 'checkbox');
		input2.setAttribute('value', 'propria');
		input2.setAttribute("onclick", "gerarDireitoGenero()");
		
		document.getElementById("label-filtrar-right2").appendChild(propria);
		document.getElementById("label-filtrar-right2").appendChild(input2);
		
	
	};
}
var executed6 = false;
function gerarDireitoGenero(){
	if (!executed6) {
		executed6 = true;

		var divContainer = document.createElement("div");
		divContainer.setAttribute("class", "container-select-right");

		var p = document.createElement("p");
		p.setAttribute('class', 'genero-right');

		var inputIMG = document.createElement("input");
		inputIMG.setAttribute("class", "input-right");
		inputIMG.setAttribute("type", "image");
		inputIMG.setAttribute("src", "_img/generoico.png")

		var genero = document.createTextNode("Gênero");
		p.appendChild(genero);

		divContainer.appendChild(p);
		divContainer.appendChild(inputIMG);

		document.getElementById("direito-local").appendChild(divContainer);


		var select = document.createElement("select");
		select.setAttribute("onchange", "gerarDireitoLocal()");
		select.setAttribute("class", "select-right");

		var option1 = document.createElement("option");
		
		var option2 = document.createElement("option");
		
		var blues = document.createTextNode("Blues");

		select.appendChild(option1);
		option1.setAttribute("value", "nada");
		select.appendChild(option2);

		option2.appendChild(blues);
		option2.setAttribute("value", "blues");
		document.getElementById("direito-local").appendChild(select);
	};
}

var executed7 = false;
function gerarDireitoLocal(){
	if (!executed7) {
		executed7 = true;

		var divContainer = document.createElement("div");
		divContainer.setAttribute("class", "container-select-right");

		var p = document.createElement("p");
		p.setAttribute('class', 'genero-right');

		var inputIMG = document.createElement("input");
		inputIMG.setAttribute("class", "input-right");
		inputIMG.setAttribute("type", "image");
		inputIMG.setAttribute("src", "_img/localico.png")

		var genero = document.createTextNode("Onde você está?");
		p.appendChild(genero);

		divContainer.appendChild(p);
		divContainer.appendChild(inputIMG);

		document.getElementById("direito-genero").appendChild(divContainer);


		var select = document.createElement("select");
		select.setAttribute("onchange", "gerarBotaoFiltrarDireito()");
		select.setAttribute("class", "select-left");

		var option1 = document.createElement("option");
		
		var option2 = document.createElement("option");
		
		var blues = document.createTextNode("Rio de Janeiro");

		select.appendChild(option1);
		option1.setAttribute("value", "nada");
		select.appendChild(option2);

		option2.appendChild(blues);
		option2.setAttribute("value", "rj");
		document.getElementById("direito-genero").appendChild(select);
	};
}

var executed8 = false;
function gerarBotaoFiltrarDireito(){
	if (!executed8) {
		executed8 = true;

		var botao = document.createElement("button");
		botao.setAttribute("id", "button-filtrar-right");

		var filtrar = document.createTextNode("FILTRAR");
		botao.appendChild(filtrar);
		document.getElementById("direito-genero").appendChild(botao);
	};
}

var executed9 = false;
function gerarFormComentar(){
	if (!executed9) {
		executed9 = true;

		var label1 = document.createElement("label");
		var nome = document.createTextNode("Nome:");
		var input11 = document.createElement("input");
		label1.appendChild(nome);

		input11.setAttribute("type", "text");
		input11.setAttribute("placeholder", "Digite seu nome:");
		input11.setAttribute("name", "nome");

		var br = document.createElement("br");

		var label2 = document.createElement("label");
		var mensagem = document.createTextNode("Mensagem: ");
		label2.appendChild(mensagem);
		var textarea = document.createElement("textarea");
		textarea.setAttribute("placeholder", "Digite sua mensagem");
		textarea.setAttribute("name", "mensagem");

		var input22 = document.createElement("input");
		input22.setAttribute("type", "submit");
		input22.setAttribute("value", "Enviar");

		$(function() {
    		$('.container-estrelas').css('display', 'block');
    		$('#avaliacao').css('display', 'block');

    		$('#comentar').css('display', 'none');
  		});

		document.getElementById("comentar-form").appendChild(label1);
		document.getElementById("comentar-form").appendChild(input11);
		document.getElementById("comentar-form").appendChild(label2);
		document.getElementById("comentar-form").appendChild(textarea);
		document.getElementById("comentar-form").appendChild(input22);
  	};
}

var qnt = 0;
function selecionaEstrela(qnt){
	$(function() {
		$('#quantidadeEstrela').attr('value', qnt);
		$('.estrela-' + qnt).attr('class', 'estrela-' + qnt + '-selecionada');
		var qnt2 = qnt +1 ;
		
		while(qnt > 0){
    		$('.estrela-' + qnt).css('background-position', '-120px');
    		$('.estrela-' + qnt).attr('class', 'estrela-' + qnt +'-selecionada');
    		qnt = qnt - 1;
    	}
    	while(qnt2 <= 5){
    		$('.estrela-' + qnt2 + '-selecionada').attr('class', 'estrela-' + qnt2);
    		$('.estrela-' + qnt2).css('background-position', '0px');
    		qnt2 = qnt2 + 1;
		}
  	});
}
