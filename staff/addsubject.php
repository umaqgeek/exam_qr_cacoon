<div id="wrapper">

    <!-- Intro -->
    <section id="addsubject" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <form method="post" action="process/addsubject_process.php">
                <table class="table">
                    <tr>
                        <td>Subject Code</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="s_code" id="s_code" class="form-control" placeholder="Subject code." />
                        </td>
                    </tr>
                    <tr>
                        <td>Subject Name</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="s_name" id="s_name" class="form-control" placeholder="Subject name." />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button class="btn btn-success" type="submit">Save</button>
                            <button class="btn btn-info" type="reset">Clear</button>
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </section>
    
</div>