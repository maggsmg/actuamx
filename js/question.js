
(function() {
	var qform = document.getElementById('questionForm');
	qform.addEventListener('submit', function(e) {
		e.preventDefault();

		// Get data
		var name = document.getElementById('name').value;
		var category = document.getElementById('category').value;
		var pregunta = document.getElementById('question').value;
		if(!pregunta || pregunta.trim() == "") {
			alert('La pregunta no puede estar vacía');
			return false;
		}
		var data = {'name': name, 'pregunta': pregunta, 'category': category};

		var request = new XMLHttpRequest();
		request.open("POST", "process.php", true);
		request.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
		request.onload = function() {
			if(request.status >= 200 && request.status < 400) {
				var res = JSON.parse(request.responseText);
				if(res && res.success) {
					showSuccess();
				}
			}
		};
		request.onerror = function() {
			console.error("ERROR making connection", request.status);
		};
		request.send(JSON.stringify(data));
	});
})();

function showSuccess() {
	var qform = document.getElementById('questionForm');
	var successmsg = document.querySelector('.sendquestion .success-msg');
	qform.style.opacity = 0;
	setTimeout(function() {
		qform.style.display = 'none';
		successmsg.style.display = 'block';
		setTimeout(function(){
			successmsg.style.opacity = 1;
		}, 100);
	}, 505);

}