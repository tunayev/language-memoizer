<nav class="navbar navbar-expand-md navbar-dark bg-success mb-3" aria-label="Fourth navbar example">
    <div class="container">
      <a class="navbar-brand" href="<?=URLROOT?>"><?=SITENAME?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['REQUEST_URI'];?>" aria-current="page" href="<?=URLROOT?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=URLROOT?>/vocabs">Vocabs</a>
          </li>
        </ul>
        <form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav mb-2 mb-md-0">
          <?php if(isset($_SESSION['user_id'])) : ?>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?='Hoşgeldin, '.$_SESSION['user_name']?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <?php if(isAdmin()) : ?>
                  <li><a class="dropdown-item" href="<?=URLROOT?>/cpadmin">Admin</a></li>
                  <?php endif; ?>
                  <li><a class="dropdown-item" href="<?=URLROOT?>/users/logout">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div> 
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=URLROOT?>/users/login">Login</a>
            </li>
            <li class="nav-item">
                <a href="<?=URLROOT?>/users/register" class="nav-link">Register</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>    
  </nav>