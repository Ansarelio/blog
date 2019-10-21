<?php
?>
<ul class="nav justify-content-end bg-dark">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <span class="nav-link admin-span"><?= $_SESSION['username']; ?></span>
  </li>
  <li class="nav-item">
  <form action="" method="POST">
    <input type="hidden" name="logout">
	<button class="btn btn-primary" type="submit">Выйти</button>
</form>
  </li>
</ul>