<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex">
		<title>Automobilių nuomos IS</title>
		<link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</head>
    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
        <a class="navbar-brand" href="index.php">Automobilių nuomos IS</a>
        <ul class="navbar-nav float-right">
            <li class="nav-item"><a class="nav-link" href="index.php?module=customer&action=list" title="Klientai"<?php if($module == 'customer') { echo 'class="active"'; } ?>>Klientai</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?module=employee&action=list" title="Darbuotojai"<?php if($module == 'employee') { echo 'class="active"'; } ?>>Darbuotojai</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?module=drink&action=list" title="Gerimai"<?php if($module == 'drink') { echo 'class="active"'; } ?>>Gerimai</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?module=store&action=list" title="Parduotuve"<?php if($module == 'store') { echo 'class="active"'; } ?>>Parduotuve</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?module=city&action=list" title="Miestas"<?php if($module == 'city') { echo 'class="active"'; } ?>>Miestas</a></li>
        </ul>
    </nav>
	<body>

					<?php
						// įtraukiame veiksmų failą
						if(file_exists($actionFile)) {
							include $actionFile;
						}
					?>
					<div class="float-clear"></div>
			<div id="footer">

			</div>

	</body>
</html>