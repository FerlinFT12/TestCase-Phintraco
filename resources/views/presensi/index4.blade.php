<!DOCTYPE html>
<html>
<head>
	<title>Menampilkan Data JSON di HTML</title>
</head>
<body>
	<div id="json-data"></div>

	<script>
		var dataJSON = '[{"title": "Judul 1", "content": "Konten 1"}, {"title": "Judul 2", "content": "Konten 2"}, {"title": "Judul 3", "content": "Konten 3"}]';
		var data = JSON.parse(dataJSON);

		var html = '';
		for (var i = 0; i < data.length; i++) {
		  html += '<div>';
		  html += '<h2>' + data[i].title + '</h2>';
		  html += '<p>' + data[i].content + '</p>';
		  html += '</div>';
		}

		document.getElementById('json-data').innerHTML = html;
	</script>
</body>
</html>
