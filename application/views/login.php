<div class='centered-div'>
    <h1> Login </h1>

    <?php echo form_open('login/check') ?>
        <?php if(isset($valid)): ?>
            <div class='alert'>Unknown username or password</div>
        <?php endif ?>
        <label for='username'>Username: </label> <input type="text" id="username" name='username'><br>
        <label for='password'>Password: </label> <input type="password" id="password" name='password'><br><br>
        <input type="submit" value="Submit">
    </form>
    Don't have an account yet? <a href="<?=base_url()?>index.php/login/new_user">Click Here</a>
</div>