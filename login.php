<!-- Wrapper -->
<div id="wrapper">

    <!-- Intro -->
    <section id="login" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>Login Page</h3>

            <form method="post" action="process/login_process.php">
                <table class="table">
                    <tr>
                        <td width="30%">Matric / Staff No.</td>
                        <td width="2%">:</td>
                        <td>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Matric / Staff No." />
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button class="btn btn-success" type="submit">Log In</button>
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </section>

    <!-- One -->
    <section id="about" class="wrapper style2 fullscreen spotlights">
        <div class="inner">

            <?php require("title.php"); ?>
            <h3>About System</h3>

            <p align="justify">This system Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

        </div>
    </section>

</div>