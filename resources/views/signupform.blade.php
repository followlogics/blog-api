
<div class="box" _vik>
    <div class="col-sm-12 hide" _vik>
        <span _vik><i class="fab fa-facebook-square" _vik></i></span>
        <span _vik><i class="fab fa-google-plus-square googleplus_but" _vik></i></span>
        <span _vik><i class="fab fa-twitter-square" _vik></i></span>
    </div>
    <div class="division hide" _vik>
        <div class="line l" _vik></div>
        <span _vik>or</span>
        <div class="line r" _vik></div>
    </div>
    <div class="content" _vik>
        <form autocomplete="off" _vik id="signupForm" method="post" >
        <input autocomplete="off" name="hidden" type="text" style="display:none;">
            <div class="input-group form-group" _vik>
                <div class="input-group-prepend" _vik>
                    <span class="input-group-text" _vik><i class="fas fa-envelope" _vik></i></span>
                </div>
                <input type="text" name="reg_mail" class="form-control" autocomplete="off" placeholder="E-mail" _vik />
            </div>
            <div class="input-group form-group" _vik>
                <div class="input-group-prepend" _vik>
                    <span class="input-group-text" _vik><i class="fas fa-user" _vik></i></span>
                </div>
                <input type="text" name="reg_name" class="form-control" autocomplete="offx" placeholder="name" _vik />
            </div>
            <div class="input-group form-group" _vik>
                <div class="input-group-prepend" _vik>
                    <span class="input-group-text" _vik><i class="fas fa-key" _vik></i></span>
                </div>
                <input type="password" name="reg_pass" class="form-control" autocomplete="new-password" placeholder="password" _vik />
            </div>
            <div class="row align-items-center remember hide" _vik>
                <input type="checkbox" _vik />Remember Me
            </div>
            <div class="form-group" _vik>
                <input type="submit" value="Sign Up" class="btn btn-default btn-login" _vik />
            </div>
        </form>
        <div class="d-flex justify-content-center links" _vik>
            Already have an account? <a  data-href="login" href="login" _vik>Login</a>
        </div>
    </div>
<script >
jQuery(document).on('submit','#signupForm',function(e){
    e.preventDefault();
    var data=jQuery('#signupForm').serialize();
    Virus.api({url: 'signup', sdata:data });
})
</script>
</div>
