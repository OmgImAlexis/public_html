<html>
<head>
<title>Text to IMG converter</title>
</head>
<body style="background-color:#21b7a5;">
<center>
<h2>Write whatever you want in the text box and click convert to change the letters to images. :D</h2>
<form action="" method="POST">
Text: <input type="text" name="text">
Size: <input type="text" name="size">
<input type="submit" name="submit" value="Convert">
</form>
<?php
if (@isset($_POST['submit'])){
    $text = str_split(strtolower($_POST['text']));
    if (trim($_POST['size']) == ''){
        $size = '10px';
    } else {
        $size = $_POST['size'];
    }
    $count = count($text)-1;
    $i = 0;
    while ($i <= $count){
        if ($text[$i] == ' '){
            $text[$i] = str_replace($text[$i], '<img width="'.$size.'" height="'.$size.'" src="letters/space.png">', $text[$i]);
        } elseif ($text[$i] == '.'){
            $text[$i] = str_replace($text[$i], '<img width="'.$size.'" height="'.$size.'" src="letters/dot.png">', $text[$i]);
        } elseif ($text[$i] == ','){
            $text[$i] = str_replace($text[$i], '<img width="'.$size.'" height="'.$size.'" src="letters/comma.png">', $text[$i]);
        } else {
            $text[$i] = str_replace($text[$i], '<img width="'.$size.'" height="'.$size.'" src="letters/'.$text[$i].'.png">', $text[$i]);
        }
        $i++;
    }
    $text = implode($text);
    echo $text;
}
?>
</center>
</span>
</body>
</html>