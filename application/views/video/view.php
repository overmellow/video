<?php
//echo '<h2>'.$video_item['title'].'</h2>';
echo '<video width="320" height="240" controls>
        <source src="'. base_url() . 'uploads/' . $video_item['filename'] . '" type="video/mp4">
      Your browser does not support the video tag.
    </video>';
echo '<br /><br />';
