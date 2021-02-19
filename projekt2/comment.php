<div class="comment">
    <h3>Write a comment</h3>
    <textarea name="commentfield" rows="5" cols="40"><?php echo $comment; ?></textarea>
    <input type="submit" name="submit" value="Submit"> 
</div>
<?php

$comment = $_POST['comment'];
echo $comment;

$conn = create_conn();
$sql = "SELECT * FROM comments";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comments (pageID, postID, comtime, comment) VALUES ($comtarget, $comsender, '$comtime, $comment)";
if (mysqli_query($conn, $sql)) {
    echo "Thank you for your comment";
} else {
    echo "Problem arose: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
