
<div class="col-sm-12 hide" _vik>
    <span _vik><i class="fab fa-facebook-square" _vik></i></span>
    <span _vik><i class="fab fa-google-plus-square googleplus_but" id="customBtn" _vik></i></span>
    <span _vik><i class="fab fa-twitter-square" _vik></i></span>
</div>
<div class="division hide" _vik>
    <div class="line l" _vik></div>
    <span _vik>or</span>
    <div class="line r" _vik></div>
</div>
<form _vik autocomplete="off" id="loginForm" method="post" >
        <input autocomplete="off" name="hidden" type="text" style="display:none;">
    <div class="input-group form-group" _vik>
        <div class="input-group-prepend" _vik>
            <span class="input-group-text" _vik><i class="fas fa-user" _vik></i></span>
        </div>
        <input type="text" autocomplete="off" name="login_mail" class="form-control" placeholder="username or e-mail" _vik />

    </div>
    <div class="input-group form-group" _vik>
        <div class="input-group-prepend" _vik>
            <span class="input-group-text" _vik><i class="fas fa-key" _vik></i></span>
        </div>
        <input type="password" autocomplete="new-password" name="login_pass" class="form-control" placeholder="password" _vik />
    </div>
    <div class="row align-items-center remember hide" _vik>
        <input type="checkbox" _vik />Remember Me
    </div>
    <div class="form-group" _vik>
        <input type="submit" value="Login" class="btn btn-default btn-login " _vik />
    </div>
</form>

<div class="cardfooter" _vik>
    <div class="d-flex justify-content-center links" _vik>
        Don't have an account? <a  data-href="signup" class="" href="signup" _vik>Sign Up</a>
    </div>
    <div class="d-flex justify-content-center" _vik>
        <a href="#" _vik>Forgot your password?</a>
    </div>
</div>
<script >
jQuery(document).on('submit','#loginForm',function(e){
    e.preventDefault();
    var data=jQuery('#loginForm').serialize();
    Virus.api({url: 'login', sdata:data ,callback:function(data){
            localStorage.setItem('api_token',data.api_token);
            Virus.openTargetBlock('dashboard');
    }});
})
</script>

