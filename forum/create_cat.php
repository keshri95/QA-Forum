<?php include 'header.php'?>
<div id="category" class="w3-card">
    <form id="f03" action="catcreate.php" method="post">
        <b><i>Category Name:</b></i><br><input type="text" name="catname" id="catname" placeholder="Enter Category Name.."><br>
        <b><i>Category Description:</b></i><br><textarea name="catdesc" id="catdesc" cols="30" rows="10" placeholder="Describe The Category.."></textarea><br><br>
        <input type="submit" value="POST">
    </form>
</div>