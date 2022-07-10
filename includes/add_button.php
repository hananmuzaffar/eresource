<div class="fixed-action-btn">
  <a class="btn-floating tooltipped btn-large teal lighten-2 pulse z-depth-3" data-position="left" data-tooltip="Add new" id="add">
    <i class="fas fa-plus"></i>
  </a>
  <ul>
    <?php if($_SESSION['isAdmin'] == 1): ?>
    <li><a class="btn-floating tooltipped blue lighten-2" href="/eresource/students/add-student.php" data-position="left" data-tooltip="Add new Student"><i class="fas fa-graduation-cap"></i></a></li>
    <li><a class="btn-floating tooltipped red lighten-2" href="/eresource/users/add-user.php" data-position="left" data-tooltip="Add new User"><i class="fas fa-users"></i></a></li>
    <?php endif; ?>
    <li><a class="btn-floating tooltipped purple lighten-2" href="/eresource/syllabus/add-syllabus.php" data-position="left" data-tooltip="Add new Syllabus"><i class="fas fa-print"></i></a></li>
    <li><a class="btn-floating tooltipped orange lighten-2" href="/eresource/papers/add-paper.php" data-position="left" data-tooltip="Add new Paper"><i class="fas fa-file-circle-question"></i></a></li>
    <li><a class="btn-floating tooltipped green lighten-2" href="/eresource/noticeboard/add-notice.php" data-position="left" data-tooltip="Add new Notice"><i class="fas fa-bell"></i></a></li>
</div>