<header>
    <div class="fs-3">
        <?php
            if (isset($_SESSION['username']))
                echo 'Welcome ' . '<span class="fw-semibold">' . $_SESSION['username'] . '</span>';
        ?>
    </div>
</header>