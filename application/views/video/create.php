<h2><?php //echo $title; ?></h2>

<?php if(isset($error)){ echo $error;} ?>

<?php echo form_open_multipart('video/upload'); ?>

<!--    <label for="title">Title</label>
    <input type="input" name="title" /><br /><br />
-->
    <input type="file" name="userfile" size="20" />
    <input type="submit" name="submit" value="Create news item" />

</form>