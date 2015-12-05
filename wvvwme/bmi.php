<div id="wrapper">
<?php
$title['page']="BMI Calculator";
include "./header.php";
include "./sidebar.php";
?>
<div id="content">
<?php
echo <<<THIS
<form action="" method="POST">
Weight:<input type="text" name="weight" />
Height:<input type="text" name="height" />
<input type="submit" value="Calculate" />
</form>
THIS;
$weight=$_POST['weight'];
$height=$_POST['height'];
$bmiheight=$height * $height;
$bmi=$weight / $bmiheight;
if (isset($_POST['weight'])){
echo "Your BMI is $bmi";
}else{
echo "You need to enter a weight.";
}
?>
</div>
</div>