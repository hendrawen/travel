
    <div class="blank">
    

        <div class="blank-page">
            <h2 style="margin-top:0px">Admin Read</h2>
            <table class="table">
                <tr>
                    <td>Username</td>
                    <td><?php echo $username; ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><?php echo $password; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Tgl Register</td>
                    <td><?php echo $tgl_register; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="<?php echo site_url('admin') ?>" class="btn btn-default">Cancel</a>
                    </td>
                </tr>
            </table>
        </div>
   </div>