<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="vertical-center">
    <div class="container border">
        <br>
        <div class="row justify-content-end">
            <div class="col-4">
                <h3 class="text-center">REGISTER</h3>
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="<?php echo base_url(); ?>login" class="btn btn-outline-primary">Login</a>
                </div>
            </div>
        </div>
        <form method="post" action="<?php echo base_url(); ?>register/validation">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="user_first_name" placeholder="First Name" class="form-control" value="<?php echo set_value('user_first_name'); ?>" />
                <span class="text-danger"><?php echo form_error('user_first_name'); ?></span>
            </div>
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="user_middle_name" placeholder="Middle Name" class="form-control" value="<?php echo set_value('user_middle_name'); ?>" />
                <span class="text-danger"><?php echo form_error('user_middle_name'); ?></span>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="user_last_name" placeholder="Last Name" class="form-control" value="<?php echo set_value('user_last_name'); ?>" />
                <span class="text-danger"><?php echo form_error('user_last_name'); ?></span>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="user_email" placeholder="Enter Email Address" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                <span class="text-danger"><?php echo form_error('user_email'); ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="user_password" placeholder="Enter Password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                <span class="text-danger"><?php echo form_error('user_password'); ?></span>
            </div>
            <div class="form-group text-right">
                <input type="submit" name="register" value="Register" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>