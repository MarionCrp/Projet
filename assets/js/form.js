function add_language(){
		var language_nb = document.getElementsByClassName("languages_nb").length
		var new_language = document.getElementById("add_button");
		new_language.addEventListener("click", function(){
		var clone = document.getElementById("to_clone");
		if(clone.style.display == 'none'){
			clone.querySelector('select').className = 'languages_nb form-control';
			clone.style.display = 'block';
		}
		else {			
			var clone = document.getElementById("to_clone").cloneNode(true);
		 	document.getElementById("tab").appendChild(clone);
		 	delete_button = clone.querySelector('span');
			delete_button.addEventListener("click",function(){	
				delete_language(this);
			});
		}
		});
	}

function delete_language(element){
		var language_nb = document.getElementsByClassName("languages_nb").length
		if (language_nb > 1){
			var language_to_delete = element.parentElement;
			document.getElementById("tab").removeChild(language_to_delete);
		}
	}

function verif(){
	var del_buttons = document.getElementsByClassName('delete_button');
	for( var i = 0 ; i < del_buttons.length ; i++){
		if(del_buttons[i]){
			del_buttons[i].addEventListener("click",function(){	
				delete_language(this);
			});
		}
	}
}


window.addEventListener("load", function() {
	verif();
	add_language();
	delete_language();
});

