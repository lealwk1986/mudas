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
	  
    background-color: #A2A2A2;
    color: #000000;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
        
}

.active, .accordion:hover {
	
	margin-left: 0;
  background-color: #1F1F1F; 
	color:white;
	text-decoration-line: underline;
	
  	
}
		  
.accordion:after {
  content: '\002B';
  color: red;
  font-weight: bold;
  float: right;

  
}

.active:after {
	
	
  content: "\2212";
	color:white;

}

.panel {
	float:right;
  padding-left:10px;
	background-color:white;
	display: none;


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
	margin-top: 50px;
	
	
	

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

  background-color: #A2A2A2;
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
	  
	
</style>  





<div class="row" id="row" style="height: 100%;  width: 0;  position: fixed;  z-index: 1;  top: 0;  left: 0;" >
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="side" id="side" style="height: 50%; ">
        

        </div>  
  </div>
  <div class="icon-bar">
  <a class="aa" href="#" onClick="nuevo()"><i class="fa fa-file-o"></i></a> 
  <a class="aa" href="#" onClick="openNav()"><i class="fa fa-question "></i></a>
    
    
  <p id="id_item" style="visibility: hidden;">0</p>
  <p id_dep="id_dep" style="visibility: hidden;">""</p>
</div>
<div class="clear"></div>
<div class="main" id="main">
      

    
 <div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
   <img src="/doc?archivo=ayudaunidad1.png&ruta=/pagina/doc/imag" style="padding: 10px;" width=820px alt="" >
  </div>
</div>   
    
 <div class="content_ajax">
  <p class=titulounidad >BIENVENIDO A LA SECCION DE UNIDADES</p>

	<div class="contenido">
	<p> SISMAED define las unidades como cualquier espacio técnico o administrativo. </p>	
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
	
function Nav_02(arch,id_tag,fin){	
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
  			txt_mp = txt_mp + '<button class="accordion" id="item'+DEP[(value-1)][0]+ '" onclick=ver("'+DEP[(value-1)][0] + '")>' + DEP[(value-1)][2] + "</button>"; 
			txt_mp = txt_mp +'<div class="panel">';

				imprimir(value,MM)
			txt_mp = txt_mp + "</div>";
			}
		);
	};	
	function Nav(MM){
		var PP=[[]];
		txt_mp="";
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
	  var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
	  }      
      
    function buscarV(act){
       var a = false;
      for(var ii=0; ii<myObj.length;ii++){
          if(myObj[ii][0]==act){
              return myObj[ii][1];
              break;
          }
      }
        return a;
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
      
         
    var act=getVariable("id");
      if(!act){
    var act=getVariable("ide");
      }
      
      if(act!=false ){
          if(buscarV(act)!=false){
            var padre= buscarV(act);
          do{
          
          /*document.getElementById("item"+act).click();*/
              
            document.getElementById("item"+act).classList.toggle("active");
             var panel =  document.getElementById("item"+act).nextElementSibling; 
              if (panel.style.display === "block") {
                  panel.style.display = "none";
                } else {
                  panel.style.display = "block";
                } 
              act=padre;
              padre=buscarV(act);
          }while(padre>0);
      document.getElementById("item"+act).classList.toggle("active");
             var panel =  document.getElementById("item"+act).nextElementSibling; 
              if (panel.style.display === "block") {
                  panel.style.display = "none";
                } else {
                  panel.style.display = "block";
                }
      }
      }
      
  }
    
    
    if(id){ver(id);}
    if(ide){ editar2(ide);}
    
};
xmlhttp2.open("GET", arch, true);
xmlhttp2.send();
};	

function ver(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/veri?id="+v1, true); 
 xmlhttp2.send();   

}
    
function editar() {
    var id=document.getElementById("id_item").innerHTML;    

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/editari?id="+id, true); 
 xmlhttp2.send();   
    
} 
    
function editar2(v1) {
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/editari?id="+v1, true); 
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
    
function nuevo(){
    var id=document.getElementById("id_item").innerHTML;
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/nuevo?id_dep="+id, true); 
 xmlhttp2.send();  
}
    
function borrar(){
  var id=document.getElementById("id_item").innerHTML;
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/unidad/borrar?id_dep="+id, true); 
 xmlhttp2.send();  
}    
    
 
/*Nav_02("/js/arbol.js.php","side", true);*/
Nav_02("/navegador/unidad","side", true);
    
var id=getVariable('id'); 
var ide=getVariable('ide');

if(id){ver(id);}
if(ide){ editar2(ide);}
    
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