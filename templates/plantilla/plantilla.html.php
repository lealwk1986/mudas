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
      cursor: context-menu;
      -webkit-user-select: none; /* Safari 3.1+ */
      -moz-user-select: none; /* Firefox 2+ */
      -ms-user-select: none; /* IE 10+ */
      user-select: none;
      background-color: blue;
          
          
    }

    .caret::before {
      content: "\25B6";
      color: black;
      display: inline-block;
      margin-right: 6px;
      background-color: red;
    }

    .caret-down::before {
      -ms-transform: rotate(90deg); /* IE 9 */
      -webkit-transform: rotate(90deg); /* Safari */'
      transform: rotate(90deg); 
      
      background-color:chartreuse;
    }

    .nested {
      display: none;
      background-color: darkgoldenrod;
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

  .panel {
    padding: 0 18px;
    display: none;
    background-color: white;
      overflow: hidden;
            
            }
            
        .aa {
    display: block;
    text-align: center;
    padding: 2px;
    transition: all 0.3s ease;
    color: white;
    font-size: 36px;
    margin-left: auto;
    margin-right: auto;
    float: left;
    width: 50%;
  
    
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
            
  /*imagenes slide*/    
        
  * {box-sizing: border-box}
  body {font-family: Verdana, sans-serif; margin:0}
  .mySlides {display: none}
  img {vertical-align: middle;}

  /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
    width: 50%;
  }

  /* Next & previous buttons */
  .prev, .next {
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
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
  }

  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */


  .active2, .dot:hover {
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

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
  } 

  /* Style the search box */
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





  .active {
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
        


  /* Style the search box */
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
          
</style>  




<div class="row" id="row" style="height: 100%;  width: 0;  position: fixed;  z-index: 1;  top: 0;  left: 0;">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="side" id="side" style="height: 100%; ">

        </div>  
    </div>
    <div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick=""><i class="fa fa-question "></i></a>
    
    
  <p id="id_item" style="visibility: hidden;">0</p>
  <p id_dep="id_dep" style="visibility: hidden;">""</p>
</div>   <div class="clear"></div>
<div class="main" id="main">
 
    
<div class="content_ajax">
  <p class=titulounidad >BIENVENIDO A LA SECCION DE PLANTILLAS</p>

	<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="/doc?archivo=reportes1.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt=""  >
  
</div>

<div class="mySlides fade">
  
  <img src="/doc?archivo=reportes2.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="" >
  
</div>

<div class="mySlides fade">
 
  <img src="/doc?archivo=reportes3.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=620px alt="">
  
</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>

	
	
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
             txt_mp = txt_mp + '<li><a href="#" class="accordion" onclick="ver('+value[0]+')">'+value[1] +'</a><a class="oculto"  style="display: none" href="#">'+ value[1]+' ' + value[2]+' '+ value[3]+'</a></li>';
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

function ver(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/plantilla/veri?id="+v1, true); 
 xmlhttp2.send();   

}
    
function editarR(v1,v2) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/plantilla/editardatoplantilla?datoplantilla_id="+v1+"&plantilla_id="+v2, true); 
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
    
function editar() {
    var id=document.getElementById("id_item").innerHTML;    

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/plantilla/editari?id="+id, true); 
 xmlhttp2.send();   
    
}     
 
function editar2(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/plantilla/editari?id="+v1, true); 
 xmlhttp2.send();   
    
}  	

function nuevo(){
    var id=document.getElementById("id_item").innerHTML;
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/plantilla/nuevo?id_dep="+id, true); 
 xmlhttp2.send();  
}    
	
Nav_02("/navegador/plantilla","side");

    
var id=getVariable('id'); 
var ide=getVariable('ide');
var idr=getVariable('idr');    

if(id && idr ){
    editarR(idr,id);
}else{
    
if(id){ver(id);}
if(ide){ editar2(ide);}
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
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


