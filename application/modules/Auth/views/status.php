<!DOCTYPE html>
<html lang="en">
<head>
	<title>Success</title>
	<meta name="google-site-verification" content="Fc5Cu5yfvJKy-mPGUnVSwjANd3GK-us6I8hd9y1Ci5Q" />
</head>
<body>
	<?php
		if (isset($_GET['json'])) {
			echo json_encode($status);
		} else {
			show_error($status);
		}
	?>
</body>
</html>