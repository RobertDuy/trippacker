<div id="main-container" class="wrap-container container clearfix">
    <div class="main-content full-width controller-site action-forgot">
        
        <div class="loginSignup login-signup-container append-bottom clearfix">
            <header class="clearfix append-bottom">
                <h1 class="clearfix text-center">Forgot your Password?</h1>
            </header>
            <hr class="append-bottom"/>
           	<?php echo form_open('user/user/forgotpass'); ?>
                   
                <div class="forgotPasswordDiv clearfix forgot-password-container col-xs-12 col-sm-offset-3 col-sm-6 col-md-4 col-md-offset-4 no-padding">
                <div class="clearfix append-bottom">
                    <label class="left clear" for="ForgotPasswordForm_email">Email</label>            
                    <input class="medium clear text" name="ForgotPasswordForm[email]" id="ForgotPasswordForm_email" type="text"/>                    
                    </div>
            </div>
            <div class="clearfix append-bottom text-center submit-container col-xs-12 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-5 no-padding">
                <input class="call-to-action tall last btn-inverted" type="submit" name="yt0" value="Reset"/>    </div>
            </form>
        </div>
    </div>
</div>