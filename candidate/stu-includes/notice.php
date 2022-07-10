<?php
$course = $_SESSION["course_id"];
$sql = "SELECT * FROM notices WHERE course_id = $course ORDER BY notice_uploaded_on DESC LIMIT 5";
$notice_result = $link->query($sql);
?>
<table class="centered">
    <thead>
        <tr>
            <th hidden>Notice ID</th>
            <th>Notice</th>
            <th>Uploaded on</th>
        </tr>
    </thead>

<?php while($row = $notice_result->fetch_assoc()): ?>
    <tbody>
        <tr>
            <td hidden><?php echo $row["notice_id"]; ?></td>

            <td><strong><?php echo $row["notice"]; 
            // echo substr($row["notice"], 0, 50) . " ...";?></strong></td>

            <td><?php $notice_uploaded_on= date('d/m/Y',strtotime($row['notice_uploaded_on'])); 
                echo $notice_uploaded_on;
            ?></td>
        </tr>
    </tbody>
<?php endwhile; ?>
</table>
<a href="notifications.php" class="right" style="color: #FF3358;">View All Notifications</a>