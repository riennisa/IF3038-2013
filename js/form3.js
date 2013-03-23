
		function mOverList(obj){
			obj.style.backgroundColor="yellow";
		}		
		function mOutList(obj){
			obj.style.backgroundColor="#f5fc8f";
		}		
		function redirect(id){
			window.location=""+id+"";
		}
		function showList(obj){
			var allList=document.getElementsByClassName('task');
			for (var i=0;i<allList.length;i++){
				allList[i].style.display="none";
			}
			var selectedCat = obj.id;
			var ListRPL=document.getElementsByClassName(selectedCat);
			for (var i=0;i<ListRPL.length;i++){
				ListRPL[i].style.display="block";
			}
			document.getElementById('addTask').style.display="block";
		}
		function showAll(){
			var allList=document.getElementsByClassName('task');
			for (var i=0;i<allList.length;i++){
				allList[i].style.display="block";
			}
			document.getElementById('addTask').style.display="none";
		}
		
		function select(obj){		
			var arrayCatButt=document.getElementsByClassName('catButton');
			for (var i=0;i<arrayCatButt.length;i++){
				arrayCatButt[i].style.background="#65a9d7";
			}
			obj.style.background="#fff";
		}		
		function showCatForm(){
			document.getElementById("category_new_form").style.display="block";
		}
		function addCategory(){
			var newDiv = document.createElement('div');
			var newButton = document.createElement("button");
			var newCat=document.crateTextNode(document.inputCategory.kategori.value);
			var coba=document.createTexkNode("hahahaha");
			
			
			newButton.setAttribute('class', 'catButton');
			newButton.setAttribute('type', 'button');
			
			newButton.appendChild(coba);
			
			div_cat_button = document.getElementById("coba");
			document.body.insertBefore(newButton, div_cat_button);
			
		}