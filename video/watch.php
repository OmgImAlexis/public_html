<?php
$video_id = isset( $_GET['v'] ) ? $_GET['v'] : "";
echo <<<WATCH
<video width="640" height="360" controls>
    <source src="videos/{$video_id}.mp4"  type="video/mp4" />
	<object width="640" height="360" type="application/x-shockwave-flash" data="__FLASH__.SWF">
        <param name="movie" value="__FLASH__.SWF" />
        <param name="flashvars" value="autostart=true&amp;controlbar=over&amp;image=__POSTER__.JPG&amp;file={$video_id}.MP4" />
    </object>
</video>
WATCH;
?>