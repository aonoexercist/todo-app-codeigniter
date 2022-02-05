<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="vertical-center">
    <div class="container border">
        <br>
        <?php
            if($this->session->flashdata('message'))
            {
                echo '
                <div class="alert alert-success">
                    '.$this->session->flashdata("message").'
                </div>
                ';
            }
        ?>
        <div class="row justify-content-end">
            <div class="col-4">
                <h3 class="text-center">LOGIN</h3>
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="<?php echo base_url(); ?>register" class="btn btn-outline-primary">Register</a>
                </div>
            </div>
        </div>
        <form method="post" action="<?php echo base_url(); ?>login/validation">
            <div class="form-group">
                <label>Enter Email Address</label>
                <input type="text" name="user_email" placeholder="Enter Email Address" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                <span class="text-danger"><?php echo form_error('user_email'); ?></span>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="user_password" placeholder="Enter Password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                <span class="text-danger"><?php echo form_error('user_password'); ?></span>
            </div>
            <div class="form-group text-right">
                <input type="submit" name="login" value="Login" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>