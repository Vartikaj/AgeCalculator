<?php
	$result = "";
	if(isset($_POST['submit']))
	{
		$dd = $_POST['date'];
		$mm = $_POST['month'];
		$yy = $_POST['year'];

		$dob = $mm."/".$dd."/".$yy;
		$arr = explode("/",$dob);

		//set the date into mm............
		$now = strtotime($dob);
		$today = strtotime('today');

		if(sizeof($arr)!=3) 
		die('ERROR:please entera valid date');
		//checkdate() : check the date which we entered is correct or not
		if(!checkdate($arr[0],$arr[1],$arr[2])) die('PLEASE: enter a valid dob');

		if($now>=$today) die('ENTER a dob earlier than today');

		$ageDays=floor(($today-$now)/(60 * 60 * 24));

		$ageYears=floor($ageDays/365);

		$ageMonths=floor(($ageDays-($ageYears*365))/30);

		$result = $ageYears . " Years ". $ageMonths . " Months" ;

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Age Calculator</title>
</head>
<body>
	<h2>Enter your date of birth and find your age</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<select name="date">
			<option>DD</option>
			<?php
				for($i = 1; $i <= 31; $i++)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
		</select> 
		<select name="month">
			<option>MM</option>
			<?php
				for($i = 1; $i <= 12; $i++)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
		</select>
		<select name="year">
			<option>YYYY</option>
			<?php
				for($i = 1990; $i <= 3000; $i++)
				{
					echo "<option value='$i'>$i</option>";
				}
			?>
		</select>
		<input type="submit" value="Calculate Age" name="submit">
		<p>Total age : <?php echo $result; ?></p>
	</form>

</body>
</html>