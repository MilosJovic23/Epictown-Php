
        <nav>
            <ul>
                <a href="/Epictown"><li>home</li></a>
                <?php if( isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                <a href="/Epictown/models/logout.php"><li>Logout</li></a>
                <?php else: ?>
                <a href="/Epictown/HtmlComponents/loginForm.php"><li>login</li></a>
                <?php endif; ?>
            </ul>
        </nav>
