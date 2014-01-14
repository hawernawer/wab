//JS para las funciones del formulario.


//Contador de ordenes, variable numerica usada para saber que numero de orden llevamos y no liarla parda en el PHP.
var contOrdenes=0;
//Guardamos en esta variable el valor de la orden que vamos a usar, mov terrestre=0, mov maritimo=1 etc... la inicializamos a 10 por que no corresponde a
// ninguna orden.
var valorOrden=10;

//Funcion que añade el tipo de orden solicitada. Esta funcion añade los elementos HTML con sus respectivos campos segun el tipo de ordene seleccionada.
function creaOrden(){

	//#tipos_ordenes es el campo select que nos permite seleccionar el tipo de orden, maritima, por tierra... en esta instruccion seleccionamos su value.
	valorOrden=$("#tipos_ordenes").val();
	//variable que usamos para guardar el texto HTML para la funcion append.
	var htmlText;

	switch (valorOrden) {
	
		case "0":
			/* Insertamos el codigo HTML. A cada id, se le ha concatenado con contOrdenes, es un contador que lleva la cuenta del 
			número de ordenes que van apareciendo. Decrementa cuando se llama a la funcion borraOrden y se inicializa a 0, por lo que tu bucle debe empezar 
			a contar desde 0. for i=0 ... 
			
			EL ultimo atributo hidden, el llamado tipo, tiene ademas una modificacion en value, de forma que toma el valor de valorOrden, 
			tierra=0, mar=1 etc...

			Hemos modificado el id del div que contiene casa orden para que sea solo un numero,de forma que la orden 1 tiene id=1 etc esto hace 
			mas facil su manipulacion	
			
			Ademas las clases vienen definidas de la siguiente forma: cada orden viene contenida en un div con class="orden". cada orden lleva un input o select
			con clase referente al tipo de orden, son: terrestre, maritimo, aliados, heroes, lider. Ademas cada input salvo los hidden, llevan un label con la misma
			clase que el input/select mas una clase label como segunda clase.

			Los elementos checkbox tienen el titulo de cada opcion dentro de un elemento <span> por limpieza.


			*/
				htmlText='<div class="orden" id="'+ contOrdenes +'">\
				<input type="hidden" class="terrestre" id="id_orden'+ contOrdenes +'" ></input>\
				\
				<label class="terrestre label" for="prov_origen'+ contOrdenes +'">Provincia origen</label>\
				<select class="terrestre" id="prov_origen'+ contOrdenes +'" >\
						<!--TODO Contenido pendiente de autogeneracion-->\
						<option value="">Ninguna</option>\
				</select>\
				\
				<label class="terrestre label" for="prov_destino'+ contOrdenes +'">Provincia destino</label>\
				<select class="terrestre" id="prov_destino'+ contOrdenes +'" >\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</select>\
				\
				<label class="terrestre label" for="puntos'+ contOrdenes +'">Puntos</label>\
				<input type="number" class="terrestre" id="puntos'+ contOrdenes +'" ></input>\
				\
				\
				<label class="terrestre label" for="campamento'+ contOrdenes +'">Tipo de campamento</label>\
				<input class="terrestre" type="radio" name="campamento" id="campamento'+ contOrdenes +'" value="Eventual"><span>Eventual</span></input>\
				<input class="terrestre" type="radio" name="campamento" id="campamento'+ contOrdenes +'" value="Permanente"><span>Permanente</span></input>\
				\
				\
				<label class="terrestre label" for="batalla'+ contOrdenes +'">Batalla</label>\
				<input class="terrestre" type="radio" name="batalla" id="batalla'+ contOrdenes +'" value="combatir"><span>Combatir</span></input>\
				<input class="terrestre" type="radio" name="batalla" id="batalla'+ contOrdenes +'" value="no_combatir"><span>No combatir</span></input>\
				\
				<label class="terrestre label" for="partisanos0">Partisanos</label>\
				<input class="terrestre" type="radio" name="partisanos" id="partisanos'+ contOrdenes +'" value="crear_partisanos"><span>Crear partisanos</span></input>\
				<input class="terrestre" type="radio" name="partisanos" id="partisanos'+ contOrdenes +'" value="no_crear_partisanos"><span>No crear partisanos</span></input>\
				\
				<input type="hidden" id ="tipo'+ contOrdenes +'" value="'+ valorOrden +'"> </input>\
				\
			</div>';
   			$("#div_ordenes").append(htmlText);
 			
			

		break;
			
		case "1":
			// Mov maritimo, el campo provincia extra viene deshabilitado por defecto, se deshabilita si el usuario tiene o no prov. extra que mover
			htmlText='<div class="orden" id="'+ contOrdenes +'">\
					<input type="hidden" class="maritimo" id="id_orden'+ contOrdenes +'"></input>\
					\
					<label class="maritimo label" for="prov_origen'+ contOrdenes +'">Provincia origen</label>\
					<select class="maritimo" id="prov_origen'+ contOrdenes +'">\
							<!--TODO Contenido pendiente de autogeneracion-->\
							<option value="">Ninguna</option>\
					</select>\
					\
					<label class="maritimo label" for="prov_destino'+ contOrdenes +'">Provincia destino</label>\
					<select class="maritimo" id="prov_destino'+ contOrdenes +'" >\
							<!--TODO Contenido pendiente de autogeneracion-->\
					</select>\
					\
					<label class="maritimo label" for="puntos'+ contOrdenes +'">Puntos</label>\
					<input type="number" class="maritimo" id="puntos'+ contOrdenes +'" ></input>\
					\
					\
					<label class="maritimo label" for="prov_extra'+ contOrdenes +'">Moviento Extra</label>\
					<select class="maritimo" id="prov_extra'+ contOrdenes +'" disabled="disabled" >\
						<!--TODO Contenido pendiente de autogeneracion-->\
						<option value="">Ninguna</option>\
					</select>\
					\
					<input type="hidden" id ="tipo'+ contOrdenes +'" value="'+ valorOrden +'"> </input>\
					\
				</div>';
			$("#div_ordenes").append(htmlText);
		break;
		case "2":
			//  Mov aliados
			htmlText='<div class="orden" id="'+ contOrdenes +'">\
				<input type="hidden" class="aliados" id="id_orden'+ contOrdenes +'" ></input>\
				\
				<label class="aliados label" for="nombre_a'+ contOrdenes +'">Aliados disponibles</label>\
				<select class="aliados" id="nombre_a'+ contOrdenes +'" >\
					<!--TODO Contenido pendiente de autogeneracion-->\
					<option value="">Ninguna</option>\
				</select>\
				\
				<label class="aliados label" for="prov_origen'+ contOrdenes +'">Provincia origen</label>\
				<input type="text" value="" class="aliados" id="prov_origen'+ contOrdenes +'" disabled="disabled">\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</input>\
				\
				<label class="aliados label" for="prov_destino'+ contOrdenes +'">Provincia destino</label>\
				<select class="aliados" id="prov_destino'+ contOrdenes +'">\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</select>\
				\
				<label class="aliados label" for="puntos'+ contOrdenes +'">Puntos</label>\
				<input type="number" class="aliados" id="puntos'+ contOrdenes +'" ></input>\
				\
				<input type="hidden" id ="tipo'+ contOrdenes +'" value="'+ valorOrden +'"> </input>\
				\
			</div>';
			$("#div_ordenes").append(htmlText);
		break;
		case "3":
			// Mov heroes
			htmlText='<div class="orden" id="'+ contOrdenes +'">\
				<input type="hidden" class="heroes" id="id_orden'+ contOrdenes +'" ></input>\
				\
				<label class="heroes label" for="nombre_h'+ contOrdenes +'">Heroes disponibles</label>\
				<select class="heroes" id="nombre_h'+ contOrdenes +'" >\
					<!--TODO Contenido pendiente de autogeneracion-->\
					<option value="">Ninguna</option>\
				</select>\
				\
				<label class="heroes label" for="prov_origen'+ contOrdenes +'">Provincia origen</label>\
				<input type="text" value="" class="heroes" id="prov_origen'+ contOrdenes +'" disabled="disabled">\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</input>\
				\
				<label class="heroes label" for="prov_destino'+ contOrdenes +'">Provincia destino</label>\
				<select class="heroes" id="prov_destino'+ contOrdenes +'">\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</select>\
				\
				<label class="heroes label" for="puntos'+ contOrdenes +'">Puntos</label>\
				<input type="number" class="heroes" id="puntos'+ contOrdenes +'" ></input>\
				\
				<input type="hidden" id ="tipo'+ contOrdenes +'" value="'+ valorOrden +'"> </input>\
				\
			</div>';
			$("#div_ordenes").append(htmlText);
		break;
		case "4":
			// Mov lider
			htmlText='<div class="orden" id="'+ contOrdenes +'">\
				<input type="hidden" class="lider" id="id_orden'+ contOrdenes +'" ></input>\
				\
				<label class="lider label" for="nombre_l'+ contOrdenes +'">Lideres disponibles</label>\
				<select class="lider" id="nombre_l'+ contOrdenes +'" >\
					<!--TODO Contenido pendiente de autogeneracion-->\
					<option value="">Ninguna</option>\
				</select>\
				\
				<label class="lider label" for="prov_origen'+ contOrdenes +'">Provincia origen</label>\
				<input type="text" value="" class="lider" id="prov_origen'+ contOrdenes +'" disabled="disabled" >\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</input>\
				\
				<label class="lider label" for="prov_destino'+ contOrdenes +'">Provincia destino</label>\
				<select class="lider" id="prov_destino'+ contOrdenes +'">\
						<!--TODO Contenido pendiente de autogeneracion-->\
				</select>\
				\
				<label class="lider label" for="puntos'+ contOrdenes +'">Puntos</label>\
				<input type="number" class="lider" id="puntos'+ contOrdenes +'" ></input>\
				\
				<input type="hidden" id ="tipo'+ contOrdenes +'" value="'+ valorOrden +'"> </input>\
				\
			</div>';
			$("#div_ordenes").append(htmlText);
		break;


	}
	//*******************Rellenamos los Contenidos pendientes de autogeneracion***********************************
	//Cargamos las posibles provincias origen y los aliados, heroes y lideres disponibles.
	cargaProvOrigen();
	
	//Si no es la primera orden...
	if (contOrdenes>0) {

		//deshabilitamos la orden anterior.
		deshabilitar(contOrdenes);
	}
	
	
	//Dependiendo del tipo de orden cambia el id del campo en el que vamos a trabajar.
	switch (valorOrden) {

		case "0"://terrestre mandamos provincia como parametro
			$("#prov_origen"+ contOrdenes).change(function(){ cargaProvDestino(this.value, "#prov_destino");});
		break;
		case "1"://maritimo mandamos provincia como parametro
			$("#prov_origen"+ contOrdenes).change(function(){ cargaProvDestino(this.value, "#prov_destino");});
			$("#prov_destino"+ contOrdenes).change(function(){ cargaProvDestino(this.value, "#prov_extra");});
		break;
		case "2"://aliado mandamos id del aliado como parametro y la tabla donde esta el mismo
			$("#nombre_a"+ contOrdenes).change(function(){ cargaProvDestinoAHL(this.value, provincias_aliados_original);});
			
		break;
		case "3"://heroe mandamos id del heroe como parametro y la tabla donde esta el mismo
			$("#nombre_h"+ contOrdenes).change(function(){ cargaProvDestinoAHL(this.value, provincias_heroes_original);});
			
		break;
		case "4"://lider mandamos id del lider como parametro y la tabla donde esta el mismo
			$("#nombre_l"+ contOrdenes).change(function(){ cargaProvDestinoAHL(this.value, provincias_lider_original);});
		
		break;


	}

	//incrementamos el valor de contOrdenes al final para asegurarnos una orden 0.
	contOrdenes=contOrdenes+1;

}

function borraOrden(){
	//La funcion borra orden, borra la ultima orden insertada. eliminando su div entero.

	//Decrementamos contador de ordenes por que vamos a borrar una orden, lo hacemos aqui por que la orden se incrementa al final de creaOrden
	//Pero solo lo decrementamos si es mayor que 0
	if (contOrdenes>0) {
		contOrdenes=contOrdenes-1;
	}
		// Hay un div en el HTML que contiene a todas las ordenes. se indetifica como div_ordenes, aqui comprobamos si este div no tiene contenido.
		if ($("#div_ordenes").html().replace(/\s/ig, '').length==0){
			//si no tiene contenido salta este mensaje. opcional, si se borra el boton no hace nada.
			alert("Debes haber creado una orden para poder borrarla");

		}else{
			//En caso de que el div este lleno, invocamos a la funcion remove sobre el id de la ultima orden. Como hemos descrito antes es un numero
			//que corresponde al contador de ordenes, variable global.
			$("#"+ contOrdenes).remove();
			
			//TODO sumarle al array de provinia original
			
			//Ahora habilitamos la orden anterior para que pueda ser modificada por el usuario, enviamos el contador de ordenes.
			habilitar(contOrdenes);
		}
	
		
	

}
function deshabilitar(contador){
	/*Funcion para deshabilitar el campo anterior. los parametros son contador, que es el contador de ordenes, lo
	decrementamos y tenemos el nº de orden anterior que debe ser deshabilitado.
	*/
	contador=contador-1;
	//Deshabilita todo el contenido del div añadiendo el atributo disabled de todos los hijos de la orden.
	$("#"+ contador).children().attr("disabled","disabled");	

}
function habilitar( contador){
	//Funcion que habilita los campos, le pasamos como parametro el contador de ordenes.
	//Decrementamos contador ya que es la orden anterior la que queremos habilitar.Al ser local no modificamos el conteo total, eso se hace en borraOrden
	contador=contador-1;
	//Habilita todo el contenido del div quitando el atributo disabled de todos los hijos de la orden.
	$("#"+ contador).children().removeAttr("disabled");	

}
function cargaProvOrigen(){

		
	var htmlText1;
	//variables para mov, maritimo y terrestre
	var value;
	var puntos;
	var nombre;
	//variables para mov aliados, heroes y lideres
	var id;
	var nombre;
	var num_provincia;

	switch (valorOrden) {

		case "0": //terrestre
			//recorremos el array de origen y vamos guardando en variables los datos de cada iteracion.
			for (var i = 0; i < provincias_tierra_original.length ; i++) {
				value=provincias_tierra_original[i][0];
				puntos=provincias_tierra_original[i][1];
				nombre=provincias_tierra_original[i][2];
								
				htmlText1='<option value="'+ value +'">'+ nombre +' Puntos:'+ puntos +' </option>';
				$("#prov_origen"+ contOrdenes).append(htmlText1);

				
			}
		break;
		
		case "1": //maritimo

			for (var i = 0; i < provincias_mar_original.length ; i++) {
				value=provincias_mar_original[i][0];
				puntos=provincias_mar_original[i][1];
				nombre=provincias_mar_original[i][2];
					
				htmlText1='<option value="'+ value +'">'+ nombre +' Puntos:'+ puntos +' </option>';
				$("#prov_origen"+ contOrdenes).append(htmlText1);

				
				
			}
		break;

		case "2": //aliados
			for (var i = 0; i < provincias_aliados_original.length ; i++) {
				id=provincias_aliados_original[i][0];
				nombre=provincias_aliados_original[i][1];
				num_provincia=provincias_aliados_original[i][2];
				//no estoy seguro de que el value este siendo el adecuando. estoy usando como value el ID del aliado, el nombre y la provincia van fuera.
				htmlText1='<option value="'+ id +'" >'+ nombre +' Provincia:'+ num_provincia +' </option>';
				$("#nombre_a"+ contOrdenes).append(htmlText1);
			}
		break;

		case "3": //heroes
			for (var i = 0; i < provincias_heroes_original.length ; i++) {
				id=provincias_heroes_original[i][0];
				nombre=provincias_heroes_original[i][1];
				num_provincia=provincias_heroes_original[i][2];
								
				htmlText1='<option value="'+ id +'">'+ nombre +' Provincia:'+ num_provincia +' </option>';
				$("#nombre_h"+ contOrdenes).append(htmlText1);

								
			}
		break;

		case "4": //lider
			for (var i = 0; i < provincias_lider_original.length ; i++) {
				id=provincias_lider_original[i][0];
				nombre=provincias_lider_original[i][1];
				num_provincia=provincias_lider_original[i][2];
				
				htmlText1='<option value="'+ id +'">'+ nombre +' Provincia:'+ num_provincia +' </option>';
				$("#nombre_l"+ contOrdenes).append(htmlText1);

								
			}
		break;
	}

}
//Funcion que rellena las posibles ciudades destinos de los mov. maritimos y terrestres. Parametros: ciudadOrigen: La ciudad desde la que parte, Selector: el id del campo donde hemos de añadir las opciones
function cargaProvDestino(ciudadOrigen, selector){

	//Empezamos quitando cualquier ciudad que ya este puesta anteriormente, buscamos los option dentro de los select
	$(""+selector+""+ (contOrdenes-1)).find("option").remove();
	var htmlText2;
	//alert("cargamos provincia destino"+ciudadOrigen);
	//Recorremos las conexiones y en cada coincidencia con nuestra ciudad añadimos una opcion para el select. Cuyo value es la ciudad a la que moveriamos
	for (var i = 0; i < conexiones.length ; i++) {
		//Si la ciudad origen coincide con la del parametro
		if (ciudadOrigen==conexiones[i][0]) {
			//añadimnos una option cuyo value, es igual a la ciudad destino. No puedo tener el nombre de la ciudad ya que no viene en conexiones.
			htmlText2='<option value="'+ conexiones[i][1] +'"> Provincia: ' + conexiones[i][1] + ' </option>';
			//incrementamos el contOrdenes ya que se nos ha incrementado al seleccionar el tipo de orden
			$(""+selector+""+ (contOrdenes-1)).append(htmlText2);
		};
		
	}

}
//funcion que relllena las posibles ciudades destino de los mov. aliados, heroes y lideres.
function cargaProvDestinoAHL(idAHL, tablaAHL){

	alert("cargamos provincias destino de aliados, heroes o lideres.");
	//Borramos las posibles opciones que ya hubiera
	
	//Creamos variables para el texto y la ciudad origen
	var htmlText2;
	var ciudadOrigenAHL;
	
	//Recorremos el array indicado, el de heroes, aliados o lideres, y guardamos la ciudad en la que esta el lider, aliado o heroe. Tambien guardamos el numero de la provincia, que ademas añadimos al value del campo prov_origen de los heroes, aliados o lideres.
	for (var i = 0; i < tablaAHL.length; i++) {
		if (tablaAHL[i][0] == idAHL){
				ciudadOrigenAHL=tablaAHL[i][2];
				$("#prov_origen"+ (contOrdenes-1)).val(tablaAHL[i][2]);
		}
	};
	//Una vez hecho, llamamos a la funcion que busca y añade las ciudades en el array de conexiones. Mas adelante hemos de ver como hacer si movemos el lider con un array especial
	cargaProvDestino(ciudadOrigenAHL, "#prov_destino");

}
function validar(){
//TODO las validaciones del formulario.
/*  -Debemos validar cuando hay provincia maritima extra o no, para habilitar o no el campo. por defaul esta deshabilitado
	-
    */


}

//Capturamos el evento del boton crear orden pero solo lo ejecutamos si toda la pagina esta cargada. Cuando el evento ocurra ejecutamos la funcion, creaOrden y BorraOrden
$(document).ready( function(){

		
		$("#boton_crea_orden").click(creaOrden);
		$("#boton_borra_orden").click(borraOrden);
		

	}

);
