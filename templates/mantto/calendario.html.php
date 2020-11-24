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
</style>  



<div class="row">
        <div class="side" id="side">

        </div>  
    </div>
<div class="main" id="main">
  <h2>Seleccione un Calendario</h2>
    <img src="/doc?archivo=img_01.png&ruta=/pagina/doc/imag"  >
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
  			txt_mp = txt_mp + '<li><span class="caret" id="item'+DEP[(value-1)][0] + '")>' + DEP[(value-1)][2] + "</span>"; 
			txt_mp = txt_mp +	'<ul class="nested">';
			txt_mp = txt_mp +	'<li><a href="#" onclick=ver("'+DEP[(value-1)][0] + '")>' + ' '+DEP[(value-1)][2] + ' </a></li>';	
				imprimir(value,MM)
			txt_mp = txt_mp + " </ul> </li>";	
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
	  var toggler2 = document.getElementsByClassName("caret");
	  var i;
	  for (i = 0; i < toggler2.length; i++) {
  		toggler2[i].addEventListener("click", function() {
    	this.parentElement.querySelector(".nested").classList.toggle("active");
    	this.classList.toggle("caret-down");
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
      if(act!=false ){
          if(buscarV(act)!=false){
            var padre= buscarV(act);
          do{
          
          document.getElementById("item"+act).click();
              
              act=padre;
              padre=buscarV(act);
          }while(padre>0);
      document.getElementById("item"+act).click();
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
 xmlhttp2.open("GET", "/calendario/veri?id="+1, true); 
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
    var id=document.getElementById("id_editar").innerHTML;    

  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
      document.getElementById("main").innerHTML = this.responseText;
  };
 xmlhttp2.open("GET", "/calendario/editari?id="+1, true); 
 xmlhttp2.send();   
    
}    
    
    
Nav_02("/js/arbol.js.php","side", true);

    
var id=getVariable('id');    
if(id) 
    {
        ver(id);

}
  
</script>



