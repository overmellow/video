<h2><?php echo $title; ?></h2>

<?php foreach ($videos as $video_item): ?>

        <h3><?php echo $video_item['filename']; ?></h3>

        <p><a href="<?php echo site_url('video/'.$video_item['id']); ?>">View Video</a></p>

<?php endforeach; ?>

<a href="<?php echo site_url('video/create'); ?>">Create Video</a>

<br /><br />