var timestamp;
var ft_list;
var cookie = {};

window.onload = function() {
	var cookies = document.cookie;
	if (cookies) {
		cookies = JSON.parse(cookies);
		cookie = cookies;
		for (key in cookies)
			createDiv(key, cookies[key]);
	}
};

function	createDiv(timestamp, task) {
	var div = document.createElement('div');
	var id = document.createAttribute('id');
	ft_list = document.getElementById('ft_list');
	div.innerHTML = task;
	id.value = timestamp;
	div.setAttributeNode(id);
	div.addEventListener("click", deleteTODO);
	ft_list.insertBefore(div, ft_list.childNodes[0]);
	cookie[id.value] = div.innerHTML;
}

function	insertTODO() {
	var result = window.prompt('Enter a New Task');

	if (result !== '' && result !== null) {
		createDiv(Date.now(), result);
		setCookie(cookie);
	}
}

function	deleteTODO() {
	if (confirm('Are you sure you want to remove this task?')) {
		this.parentElement.removeChild(this);
		delete(cookie[this.id]);
		setCookie(cookie);
	}
}

function	setCookie(cookie) {
	document.cookie = JSON.stringify(cookie);
}
