<div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            New Snipp
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account-page.php">
            Snippets HQ
          </a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php">Sign in</a>
        </li>
        <li class="nav-item" style="background: rgba(255, 100, 80, .26);">
          <a class="nav-link" href="inc/logout.php">
            Logout !
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            Register
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Docs/Instructions
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
          </a>
        </li>
        </ul>
        <hr>
        <form action="<?php echo tsw_clean_url('search-view.php'); ?>" id="searchLink" method="POST">
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <button name="search_link" class="nav-link" title="PHP" value="PHP" 
              onClick="document.getElementById(this.form).submit(.form);">
            <span data-feather="file-text">
            PHP/PDO/SQL</span>
          </button>
        </li>
        <li class="nav-item">
          <button name="search_link" class="nav-link" title="HTML" value="HTML" 
              onClick="document.getElementById(this.form).submit(.form);">
            <span data-feather="file-text">
            HTML/CSS</span>
          </button>
        </li>
        <li class="nav-item">
          <button name="search_link" class="nav-link" title="SCRIPT" value="SCRIPT" 
              onClick="document.getElementById(this.form).submit(.form);">
            <span data-feather="file-text">
            Javascript/jQuery/JSON</span>
          </button>
        </li>
        <li class="nav-item">
          <button name="search_link" class="nav-link" title="LINUX" value="LINUX" 
              onClick="document.getElementById(this.form).submit(.form);">
            <span data-feather="file-text">
            Linux/SSH/Server</span>
          </button>
        </li>
        <li class="nav-item">
          <button name="search_link" class="nav-link" title="OTHER" value="OTHER" 
              onClick="document.getElementById(this.form).submit(.form);">
            <span data-feather="file-text">
            XML/Python/Other</span>
          </button>
        </li>
        </ul>
        </form>
</div> 
<form action="<?php echo tsw_clean_url('search-view.php'); ?>" id="searchText" method="POST">
<fieldset>
<input class="form-control" id="search_keys" name="search_keys" type="text" 
       placeholder="keywords" aria-label="Search">
<input type="submit" name="snippet_search" value="Search by Keyword" class="btn"></fieldset>
</form> 