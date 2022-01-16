<header>
  <a href="index.php" class="logo">
    <h1 class="logo-text"><span>Awa</span>Inspires</h1>
  </a>
  <i class="fa fa-bars menu-toggle"></i>
  <ul class="nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Services</a></li>

    <?php if(isset($_SESSION['id_usuario'])): ?>

      <li>
        <a href="#">
          <i class="fa fa-user"></i>
          
          <?php echo $_SESSION['nome_usuario']; ?>

          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
        <ul>

          <?php if($_SESSION['tipo_usuario'] == 1) : ?>

             <li><a href="<?php echo '../admin/dashboard.php' ?>">Dashboard</a></li>

          <?php endif; ?>

          <li><a href="<?php echo '../RADAR%20CULTURAL%200.1/logout.php' ?>" class="logout">Logout</a></li>
        </ul>
      </li>

    <?php else: ?>

      <li><a href="<?php echo '../RADAR%20CULTURAL%200.1/register.php' ?>">Sign Up</a></li>
      <li><a href="<?php echo '../RADAR%20CULTURAL%200.1/login.php' ?>">Login</a></li>

    <?php endif; ?>
    

  </ul>
</header>