<header class="topbar-nav">
  <nav class="navbar navbar-expand fixed-top">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <!-- <form class="search-bar">
          <input type="text" class="form-control" placeholder="Enter keywords">
          <a href="javascript:void();"><i class="icon-magnifier"></i></a>
        </form> -->
        Hello, <?php echo strtoupper($global_goname); ?>
      </li>
    </ul>

    <ul class="navbar-nav align-items-center right-nav-link">
      <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile"><img src="./ui/assets/images/userr3.jpg" class="img-circle" alt="user avatar"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
            <a href="javaScript:void();">
              <div class="media">
                <div class="avatar"><img class="align-self-start mr-3" src="./ui/assets/images/userr3.jpg" alt="user avatar"></div>
                <div class="media-body">
                  <h6 class="mt-2 user-title"><?php echo "$global_goname" ?></h6>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="../global/shoplogout.php"> Logout </a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header>