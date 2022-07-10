<?php
$course = $_SESSION["course_id"];
$sql = "SELECT notice FROM notices WHERE course_id = $course ORDER BY notice_uploaded_on DESC LIMIT 1";
$notice_result = $link->query($sql);
while($row = $notice_result->fetch_assoc()):
?>
<div class="row">
    <marquee class='col s12 m12 l12 teal lighten-1 white-text card-panel hoverable' scrollamount='7' onmouseover='this.stop();' onmouseout='this.start();'><h6><strong><?php echo $row['notice']; ?></strong></h6></marquee>
</div>
<?php endwhile; ?>