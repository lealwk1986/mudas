<style>
	ul, #myUL {
	  list-style-type: none;
	}
	.active{
			margin: 0px 18px ;
			padding: 0;
		}

	#myUL {
	  margin: 0;
	  padding: 0;
	}

	.caret {
	  cursor: pointer;
	  -webkit-user-select: none; /* Safari 3.1+ */
	  -moz-user-select: none; /* Firefox 2+ */
	  -ms-user-select: none; /* IE 10+ */
	  user-select: none;
        
        
	}

	.caret::before {
	  content: "\25B6";
	  color: black;
	  display: inline-block;
	  margin-right: 6px;
	}

	.caret-down::before {
	  -ms-transform: rotate(90deg); /* IE 9 */
	  -webkit-transform: rotate(90deg); /* Safari */'
	  transform: rotate(90deg);  
	}

	.nested {
	  display: none;
	}

	.active {
	  display: block;
	}
    
 .sidenav_mant {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
     color: #5C5C5C;
}
.sidenav_mant .caret::before {
	  content: "\25B6";
	  color:#5C5C5C;
	  display: inline-block;
	  margin-right: 6px;
	}
.sidenav_mant .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  margin-left: 50px;
}   
    
.bottonTexto {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
  background-color: #111;
  border: none;
  transition: 0.3s;
}
.bottonTexto:hover{
cursor: pointer;
color: #f1f1f1;
border: none;
}    
    
    
.accordion {
  background-color:#B7B7B7 ;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
    display: block;

}

.active, .accordion:hover {
  background-color: #555555; 
    color: white;
}
    
* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu {
  list-style-type: none;
  padding: 0;

  margin: 0;
}

#myMenu li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block;
    margin-bottom: 12px;
}

#myMenu li a:hover {
  background-color: #eee;
}          
          
     .ocultaBoton {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}	
.aa {
  display: block;
  text-align: center;
  padding: 2px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  width: 50%;
  float: left;
  
}
          
.icon-bar {
  display: block;
  text-align: center;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  height: 60px;
	float: top;
  width: 70%;
  background-color: #555;
  margin-left: auto;
  margin-right: auto;
	 }	
.icon-bar .aa:hover {
  background-color: #000;
    cursor:pointer;
	}    
    
    
          
   
	
.titulounidad {
    text-align: left;
    font-weight: bolder;
    font-size: x-large;
    margin-left: 30px;
    color: #250506;	
	    
		  }		
		  

		  
.contenido {
    font-size: medium;
    text-align: left;
	
	font-style: oblique;
	margin-right: 20px;
	
	
	
	

	}	
		  
		  .list1{
			 
			 list-style-position: outside;
			  background-color:lightgrey;
			  margin: 30px;
			  padding: 10px;

			  
			 }
		  
		  
		  .content_ajax {
			  
			  overflow-y: scroll;
			  height: 800px;
		  }
		  

/* Slideshow container */
.slideshow-container {
	float: left;
    margin-left: 20px;	


}





.active2 {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
		  
	  
	.overlay {
  height: 800px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 187px;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;

 
}

.overlay-content {
  position: relative;
  top: 10%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}



.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}	  
	  
/*DIAPOSITIVAS DE AYUDA*/
	* {box-sizing: border-box}
body2 {font-family: Verdana, sans-serif; margin:0}
.mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container2 {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev2, .next2 {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next2 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev2:hover, .next2:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text2 {
  color:maroon;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext2 {
  color: maroon;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot2 {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active2, .dot2:hover {
  background-color: #717171;
}

/* Fading animation */
.fade2 {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev2, .next2,.text2 {font-size: 11px}
}
	
</style>  

<div class="sidenav_mant" id="mySidenav_mant">


</div>


<div class="row" id="row" style="height: 100%;  width: 0;  position: fixed;  z-index: 1;  top: 0;  left: 0;">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <div class="side" id="side" style="height: 100%; ">

        </div>  
</div>
<div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
   <a class="aa" href="#" onClick="openNav()"><i class="fa fa-question "></i></a>
    
    
  <p id="id_item" style="visibility: hidden;">0</p>
  <p id="id_dep" style="visibility: hidden;">""</p>
  <p id="grupo" style="visibility: hidden;"><?=$grupo?></p>
</div><div class="clear"></div>
<div class="main" id="main">

    
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
   <div class="slideshow-container2">

<div class="mySlides2 fade2">
  <div class="numbertext2">1 / 11</div>
  <img src="/doc?archivo=Diapositiva11.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Text</div>
</div>

<div class="mySlides2 fade2">
  <div class="numbertext2">2 / 11</div>
  <img src="/doc?archivo=Diapositiva12.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Two</div>
</div>

<div class="mySlides2 fade2">
  <div class="numbertext2">3 / 11</div>
  <img src="/doc?archivo=Diapositiva13.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	
	   <div class="mySlides2 fade2">
  <div class="numbertext2">4 / 11</div>
  <img src="/doc?archivo=Diapositiva14.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   
	   <div class="mySlides2 fade2">
  <div class="numbertext2">5 / 11</div>
  <img src="/doc?archivo=Diapositiva15.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   <div class="mySlides2 fade2">
  <div class="numbertext2">6 / 11</div>
  <img src="/doc?archivo=Diapositiva16.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   <div class="mySlides2 fade2">
  <div class="numbertext2">7 / 11</div>
  <img src="/doc?archivo=Diapositiva17.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   <div class="mySlides2 fade2">
  <div class="numbertext2">8 / 11</div>
  <img src="/doc?archivo=Diapositiva18.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   <div class="mySlides2 fade2">
  <div class="numbertext2">9 / 11</div>
  <img src="/doc?archivo=Diapositiva19.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   <div class="mySlides2 fade2">
  <div class="numbertext2">10 / 11</div>
  <img src="/doc?archivo=Diapositiva20.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	   <div class="mySlides2 fade2">
  <div class="numbertext2">11 / 11</div>
  <img src="/doc?archivo=Diapositiva21.png&ruta=/pagina/doc/imag" style="width:100%">
  <div class="text2">Caption Three</div>
</div>
	
	   

<a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
<a class="next2" onclick="plusSlides2(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot2" onclick="currentSlide2(1)"></span> 
  <span class="dot2" onclick="currentSlide2(2)"></span> 
  <span class="dot2" onclick="currentSlide2(3)"></span> 
	  <span class="dot2" onclick="currentSlide2(4)"></span> 
  <span class="dot2" onclick="currentSlide2(5)"></span> 
  <span class="dot2" onclick="currentSlide2(6)"></span> 
	  <span class="dot2" onclick="currentSlide2(7)"></span> 
  <span class="dot2" onclick="currentSlide2(8)"></span> 
  <span class="dot2" onclick="currentSlide2(9)"></span> 
	  <span class="dot2" onclick="currentSlide2(10)"></span> 
  <span class="dot2" onclick="currentSlide2(11)"></span> 
 
</div>
  </div>
</div>

<div class="content_ajax">
  <p class=titulounidad >BIENVENIDO A LA SECCION DE MANTENIMIENTO</p>

	<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="/doc?archivo=mtto1.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt=""  >
  
</div>

<div class="mySlides fade">
  
  <img src="/doc?archivo=mtto2.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="" >
  
</div>

<div class="mySlides fade">
 
  <img src="/doc?archivo=mtto3.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="">
  
</div>

<div class="mySlides fade">
 
  <img src="/doc?archivo=mtto4.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="">
  
	
	
</div>
	<br>
<div style="text-align:center">
		
		
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
<span class="dot"></span>
</div>	
	

</div>
	

	
	<div class="contenido">
	<p> PEOG Son las Personas, Empresas o Grupos que forman parte del ecosistema de SISMAED. </p>	
 	 <p> Ejemplo: Edificio(s), Piso(s), Sala(s) Tecnica(s), Sistema(s), Equipo(s) </p>	
	<p> Las mismas son organizadas en un arreglo dependiente, con un orden asociado a la estructura física del edificio. </p>
		<p>Las unidades se clasifican bajo una estructura en árbol con un número ilimitado de niveles, que puede variar con el tiempo.</p>
		<p>La gestión de unidades que realiza SISMAED  permite obtener una visión global de todos los activos gracias
			a una auténtica descripción funcional, geográfica y contable de las instalaciones.</p>
			</div>	
		<div class="clear"></div>
		<ul class="list1">
<p><li> <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Asocie toda la información contable y técnica a cada unidad </li></p>
			
			
<p><li> <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Acceda directamente a la lista de piezas, a las intervenciones, a los planes preventivos de las unidades</li></p>
			
<p><li> <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Localice sus equipos con facilidad y acceda rápidamente a sus piezas y contratos</li></p>
			
<p><li>  <img src="/doc?archivo=vineta1.png&ruta=/pagina/doc/imag" width="30" alt=""/> Consulte el registro histórico de los desplazamientos y de las anteriores asignaciones de los equipos en el árbol</li></p>
		</ul>
		

	
</div>

</div>




<script>

     
function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("oculto")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}    
       
function Nav_02(arch,id_tag){	
var xmlhttp2 = new XMLHttpRequest();
xmlhttp2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
	  txt_mp='<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"> <ul id="myMenu">';
      myObj.forEach(
			function myFunction(value, index, array) {
                
             txt_mp = txt_mp + '<li><a href="#" class="accordion" onclick="ver('+value[0]+')">'+value[1] + ' '+value[2]+ ' '+value[3]+'</a><a class="oculto"  style="display: none" href="#">'+ value[1]+' ' + value[2]+' '+ value[3]+' '+'</a></li>';
			}
		);

      txt_mp = txt_mp + '</ul>';
      
      document.getElementById(id_tag).innerHTML = txt_mp;
  }else { document.getElementById(id_tag).innerHTML = 'NO';
        }
};
xmlhttp2.open("GET", arch, true);
xmlhttp2.send();
};	
    
function Nav_03(arch,id_tag,fin){	
var xmlhttp2 = new XMLHttpRequest();
xmlhttp2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
	  
	function Navegador(DEP,id){	

	var TT={0:0};
	DEP.forEach(
		function(value, index, array){
		TT[value[0]]= index+1;
		});
	MM0=[];
for(i = 0; i < DEP.length; i++){
	MM0[MM0.length]=[ TT[DEP[i][0]],TT[DEP[i][1]]];
}
	function imprimir(i, MM) {
		fl=MM[i];
		fl.forEach(
			function myFunction(value, index, array) {
  			txt_mp = txt_mp + '<li><span class="caret" id="item'+DEP[(value-1)][0] + '")>' + DEP[(value-1)][2] + "</span>"; 
			txt_mp = txt_mp + '<ul class="nested">';
                var nombre = DEP[(value-1)][2].replace(/ /gi,'_');
			txt_mp = txt_mp + '<li><a href="#" onclick=addUnidad("'+DEP[(value-1)][0] + '","'+ nombre+'")>'+DEP[(value-1)][2]+' </a></li>';
            /*txt_mp = txt_mp + '<li><form action="/mantto/addunidad">'; 
            txt_mp = txt_mp + '<input type="hidden" name="unidad_id" value="'+DEP[(value-1)][0] + '">';*/
            /*txt_mp = txt_mp + '<input type="hidden" name="mantto_id" value="'+1+ '">';
            txt_mp = txt_mp + '<input type="submit" name="submit' + DEP[(value-1)][2] + '" value="' + DEP[(value-1)][2] + '" class="bottonTexto">';
             txt_mp = txt_mp + '</form></li>'; */   
				imprimir(value,MM)
			txt_mp = txt_mp + " </ul> </li>";	
			}
		);
	};	
	function Nav(MM){
		var PP=[[]];
		txt_mp='<a href="#" class="closebtn" onclick="closeNavM()">&times;</a>';
		MM.forEach(
			function f(value, index, array){
				PP.push([]);
			}
		);
		MM.forEach(
			function f(value, index, array){
				PP[value[1]].push(value[0]);
			}
		);
		 imprimir(0,PP);
			return txt_mp;
	};
	document.getElementById(id).innerHTML = Nav(MM0);
};	  
	Navegador(myObj,id_tag);
	  
	  if(fin == true){
	  var toggler2 = document.getElementsByClassName("caret");
	  var i;
	  for (i = 0; i < toggler2.length; i++) {
  		toggler2[i].addEventListener("click", function() {
    	this.parentElement.querySelector(".nested").classList.toggle("active");
    	this.classList.toggle("caret-down");
		});	
	  }
	  }

  }
};
xmlhttp2.open("GET", arch, true);
xmlhttp2.send();
};	 
        
function ver(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/mantto/veri?id="+v1+"&grupo=<?=$grupo?>", true); 
 xmlhttp2.send();   

}

function getVariable(variable) {
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0; i < vars.length; i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable) {
           return pair[1];
       }
   }
   return false;
}
 
function editar2(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/mantto/editari?id="+v1+"&grupo=<?=$grupo?>", true); 
 xmlhttp2.send();   
    
}  
    
function editar() {
    var id=document.getElementById("id_item").innerHTML;    
     
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/mantto/editari?id="+id+"&grupo=<?=$grupo?>", true); 
 xmlhttp2.send();   
    
}         
    
function openNavM() {
  document.getElementById("mySidenav_mant").style.width = "400px";
}        

function closeNavM() {
  document.getElementById("mySidenav_mant").style.width = "0";
}  
    
function addUnidad(v1, n1){
    document.getElementById('unidad_id').value = v1;
    document.getElementById( 'selec_uni').innerHTML = n1;
    closeNav();
    Nav_02("/navegador/mantto?grupo=<?=$grupo?>","side");
    Nav_03("/navegador/unidad", true); 
}        
 
function nuevo(){

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/mantto/nuevo"+"?grupo=<?=$grupo?>", true); 
 xmlhttp2.send();  
}            
    
function editCalend(v1,v2){
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/../mantto/editcal?ideC="+v1+"&id="+v2, true); 
 xmlhttp2.send();      
    
    
}    
    
function editEvent(v1,v2){
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/mantto/editevent?ideE="+v1+"&id="+v2, true); 
 xmlhttp2.send();      
    
    
}      
    
var idgrupo=getVariable('grupo');     
Nav_02("/navegador/mantto?grupo="+idgrupo,"side");
Nav_03("/navegador/unidad","mySidenav_mant", true); 
    
var id=getVariable('id'); 
var ide=getVariable('ide');
var ideC=getVariable('ideC');   
var ideE=getVariable('ideE');   
 
    
if(ideE) {
    editEvent(ideE,id);
}else{
    if(ideC){
    editCalend(ideC,id);
}
else{
    if(id){
        ver(id);
    }else{
       if(ide){ 
           editar2(ide);
       } 
    }
    }  
}   
    


</script>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active2", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active2";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
<script>
var slideIndex2 = 1;
showSlides2(slideIndex2);

function plusSlides2(n) {
  showSlides2(slideIndex2 += n);
}

function currentSlide2(n) {
  showSlides2(slideIndex2 = n);
}

function showSlides2(n) {
  var i;
  var slides2 = document.getElementsByClassName("mySlides2");
  var dots2 = document.getElementsByClassName("dot2");
  if (n > slides2.length) {slideIndex2 = 1}    
  if (n < 1) {slideIndex2 = slides2.length}
  for (i = 0; i < slides2.length; i++) {
      slides2[i].style.display = "none";  
  }
  for (i = 0; i < dots2.length; i++) {
      dots2[i].className = dots2[i].className.replace("active2", "");
  }
  slides2[slideIndex2-1].style.display = "block";  
  dots2[slideIndex2-1].className += " active2";
}
</script>

