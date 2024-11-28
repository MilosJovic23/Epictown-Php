
        <nav>
            <ul>
                    <a href="/Epictown"><li>Home</li></a>
                <?php if( isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                    <a href="/Epictown/HtmlComponents/dashboard.php"><li>Dashboard</li></a>
                    <a href="/Epictown/models/logout.php"><li>logout</li></a>
                <?php else: ?>
                    <a href="/Epictown/HtmlComponents/loginForm.php"><li>login</li></a>
                <?php endif; ?>
            </ul>
        </nav>
