<!-- Footer -->
<footer id="footer" class="wrapper style1-alt">
    <div class="inner">
        <ul class="menu">
            <li>&copy; Izhar 2016. All rights reserved.</li>
        </ul>
    </div>
</footer>

<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<script>alert('".$error."');history.back(-1);</script>";
}
?>

<script>
    $(document).ready(function () {
        $(".btn_logout").click(function () {
//            location.href = 'index.php?page=logout.php';
            location.href = 'logout.php';
        });
    });
    
    function ask(question) {
        return confirm(question);
    }
</script>

</body>
</html>