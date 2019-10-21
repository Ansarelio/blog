<?php
  
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Главная<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="me.php">О себе<span class="sr-only"></a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Посты
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Все</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Кинематограф</a>
          <a class="dropdown-item" href="#">Спорт</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Контакты<span class="sr-only"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reg.php">Регистрация<span class="sr-only"></a>
      </li>
    </ul>
     <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Поиск</button>
    </form>
  </div>
</nav>