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
  <a class="aa" href="#" onClick=""><i class="fa fa-question "></i></a>
    
    
  <p id="id_item" style="visibility: hidden;">0</p>
  <p id_dep="id_dep" style="visibility: hidden;">""</p>
</div><div class="clear"></div>
<div class="main" id="main">

    
    
  <h2>Seleccione el Manto del Arbol </h2>
  
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
                
             txt_mp = txt_mp + '<li><a href="#" class="accordion" onclick="ver('+value[0]+')">'+value[1] + '</a><a class="oculto"  style="display: none" href="#">'+ value[1]+' ' + value[2]+' '+'</a></li>';
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
		txt_mp='<a href="#" class="closebtn" onclick="closeNav()">&times;</a>';
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
 xmlhttp2.open("GET", "/grupounidad/veri?id="+v1, true); 
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
 xmlhttp2.open("GET", "/grupounidad/editari?id="+v1, true); 
 xmlhttp2.send();   
    
}  
    
function editar() {
    var id=document.getElementById("id_item").innerHTML;    

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/grupounidad/editari?id="+id, true); 
 xmlhttp2.send();   
    
}         
    
function openNav() {
  document.getElementById("mySidenav_mant").style.width = "400px";
}        

function closeNav() {
  document.getElementById("mySidenav_mant").style.width = "0";
}  
    
function addUnidad(v1, n1){
    document.getElementById('unidad_id').value = v1;
    document.getElementById( 'selec_uni').innerHTML = n1;
    closeNav();
    Nav_02("/js/arbol_grupounidad.js.php","side");
    Nav_03("/js/arbol.js.php","mySidenav_mant", true); 
}        
 
function nuevo(){

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/grupounidad/nuevo", true); 
 xmlhttp2.send();  
}            
    
  
    
    
Nav_02("/navegador/grupounidad","side");
Nav_03("/navegador/unidad","mySidenav_mant", true); 
    
var id=getVariable('id'); 
var ide=getVariable('ide');

 
    
if(ide) {
    editar2(ide);
}
    
if(id){
    ver(id);
}



</script>



