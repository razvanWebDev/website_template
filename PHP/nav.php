<?php
    $currentPageName = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
?>
<header>
    <a href="/" id="logo-section">
        <img id="logo" src="img/logo.png" alt="Logo">
        <h1>Comany Name</h1>
    </a>
    <hr>
    <nav class="header-menu">
        <ul class="nav-links">
            <li class="<?php echo $currentPageName == "index" ? "current-page" : ""; ?>"><a href="index">Home</a></li>
            <li class="<?php echo $currentPageName == "about" ? "current-page" : ""; ?>"><a href="about">About</a></li>
            <li class="<?php echo $currentPageName == "contact" ? "current-page" : ""; ?>"><a href="contact">Contact</a></li>
        </ul>
    </nav>
    <div id="hamburger">
        <div class="line1 blue-bg"></div>
        <div class="line2 blue-bg"></div>
        <div class="line3 blue-bg"></div>
    </div>
   
</header>