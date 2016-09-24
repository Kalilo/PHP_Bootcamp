$(document).ready(function() {
			var button = $("#add_item");
			var cookie_val = 0;

			/*Imported functions*/

			function setcookie(name, value, days) {
				var expires = "";
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + days*24*60*60*1000);
					expires = "; expires=" + date.toGMTString();
				}
				document.cookie = name + "=" + value + expires + ";path=/";
			}

			function getCookie(cookie_name) {
				var name = cookie_name + "=";
				var cookie_list = document.cookie.split(';');
				for(var i = 0; i < cookie_list.length; i++) {
					var cookie = cookie_list[i];
					while (cookie.charAt(0)==' ') {
						cookie = cookie.substring(1);
					}
					if (cookie.indexOf(name) == 0) {
						return cookie.substring(name.length,cookie.length);
					}
				}
				return null;
			}

			function addtask(text)
       		{
      			console.log("adding task to DOM: " + text);
      			cookie_val++; // add to cookies
      			var item_id = "todo" + cookie_val;
      			setcookie(item_id, text, 10000);
      			var new_item = document.createElement("LI"); 	// create new <li> item with specified text
      			new_item.id = item_id;
     	 		new_item.appendChild(document.createTextNode(text));
     	 		new_item.addEventListener("click", // adds click event to the li item (remove on click)
    		    function(event_object) {
      			var sure = confirm("Are you sure you want to delete this TO DO?");
      			if (sure) {
      				setcookie(event_object.target.id, "", -1);
   	   				event_object.target.remove();
      			}
    	  		});
    	  		var list = document.getElementById("ft_list");
				list.insertBefore(new_item, list.childNodes[0]);
      		}

			var cookie_list = document.cookie.split(';');
			for(var i = 0; i < cookie_list.length; i++) {
				var cookie = cookie_list[i];
				while (cookie.charAt(0)==' ') {
					cookie = cookie.substring(1);
				}
				if (cookie.indexOf("todo") === 0) {
					var broke_cookie = cookie.split('=');
					var index_cookie = broke_cookie[0];
					var val_cookie = broke_cookie[1];
					setcookie(index_cookie, "", -1);
					addtask(val_cookie);
				}
			}

			/*New*/

			button.click(function () {
				var newtask = prompt("Add Task", "Enter the task name");
				console.log("they clicked the button");
				if (newtask)
					addtask(newtask);
				else
					console.log("they hit cancel :(");
			});
		});