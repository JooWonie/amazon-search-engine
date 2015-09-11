<?php
	/*
		Array
(
    [submission_id] => 285027838411529569
    [formID] => 42377846607465
    [ip] => 49.144.122.114
    [fullname54] => Array
        (
            [0] => Rudem
            [1] => Labial
        )

    [email15] => jd5688@gmail.com
    [phone20] => 
    [choosethe56] => 
    [address48] => Array
        (
            [0] => 
            [1] => 
            [2] => 
            [3] => 
            [4] => 
            [5] => 
        )

)
	*/
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Thank You!</title>
</head>

<body>
  <h1>Thank You!</h1>
  <h3>Your form has been submitted.</h3>
  <div>
  	<p>
  		Your Full Name:<br>
  		
	  	<strong><?php echo $_POST['fullname54'][0] . ' ' . $_POST['fullname54'][1];?></strong>
  	</p>
  </div>
</body>
</html>