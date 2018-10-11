document.name = "ppkcookie=todolist; path/";

function new_todo(insert_into_id) {
	var txt;
	var todo = prompt("Please enter the new todo:", "My new To-do here");
	if (todo != null && todo != "") {
		var now = new Date();
		var utcString = now.toUTCString();
		var list_item = document.createElement('div');
		var added_at = "<i><small>[added at " + utcString + "]</small></i>";
		list_item.innerHTML = todo + " " + added_at;
		list_item.onclick = function () {
			if (confirm('Do you really want to remove this todo task ?'))
				this.parentElement.removeChild(this);
		};
		document.getElementById(insert_into_id).insertBefore(list_item, document.getElementById(insert_into_id).firstChild);
		//jQuery('#list_ID:first-child').prepend(new_item);
	}
}
