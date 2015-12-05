<?php
include_once 'includes/header.php';
echo '<h1>F.A.Q.</h1>';
echo '<center>';
echo '<u><h2>API</h2></u>The Api can be accessed via GET commands.<br />It requires the shortened URL, the original URL and your API key.<br />You can find you API key in the main dashboard.<br />Here\'s an example of the API. <a href="api.php?short_url=Google&original_url=http://google.com&api_key=Your key goes here">Google</a>';
echo '</center>';
include_once 'includes/footer.php';
?>