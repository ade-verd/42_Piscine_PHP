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
		var html =  encodeURIComponent(document.getElementById(insert_into_id).innerHTML);
		setCookie("todo", html, 3600 * 1000);
	//	dump(listCookies());
		//jQuery('#list_ID:first-child').prepend(new_item);
	}
}

function setCookie(cname, cvalue, time) {
    var d = new Date();
    d.setTime(d.getTime() + time);
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
    console.log(cname + "=" + cvalue + "; " + expires);
}

function check() {
	var task = document.getElementById('ft_list');
	task.innerHTML = decodeURIComponent(getCookie('todo'));
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
			return c.substring(name.length,c.length);
        }
    }
    return "";
}

function dump(obj) {
	var out = '';
	for (var i in obj) {
		out += i + ": " + obj[i] + "\n";
	}

	console.log(out);
}