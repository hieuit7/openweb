<nav><div id="menu">
        <div class="menu_item">
            
        </div><?php echo "<a href=index.php>Trang chủ</a>";?>
                <?php
                    session_start();
                    if (!session_is_registered('user')) {
                        echo "Xin chào $user_status! <a href=\"index.php?module=logout\">Logout!</a>";
                        echo "<form method=\"post\" action=\"index.php?module=register\">
                                    <input name=\"reg\" type=\"submit\" value=\"Register\"/>
                                </form>
                                <form method=\"post\" action=\"index.php?module=login\">
                                    User
                                <input name=\"user\" type=\"text\"/>
                                    Password
                                <input name=\"passwd\" type=\"password\"/>
                                <input name=\"action_login\" type=\"hidden\" value=\"login\" />
                                <input name=\"submit\" type=\"submit\" value=\"Login\"/>
                                </form>
                                ";
                    } else {
                        session_start();
                        echo "Xin chào $user_name! <a href=\"index.php?module=logout\">Logout!</a>";
                    }
                ?>
       

</div></nav>