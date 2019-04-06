var timestamp;
var ft_list;
var cookie = {};

function	createDiv(timestamp, task) {
	$('#ft_list').prepend('<div id=' + timestamp + '>' + task + '</div>');
	cookie[timestamp] = task;
	$('#ft_list').find('#' + timestamp).click(deleteTODO);
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
		delete(cookie[$(this).attr('id')]);
		$(this).remove();
		setCookie(cookie);
	}
}

function	setCookie(cookie) {
	document.cookie = JSON.stringify(cookie);
}
