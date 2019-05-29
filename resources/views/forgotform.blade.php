<form _vik autocomplete="off" id="forgetForm" method="post" >
   <input autocomplete="off" name="hidden" type="text" style="display:none;">
    <div class="input-group form-group" _vik>
        <div class="input-group-prepend" _vik>
            <span class="input-group-text" _vik><i class="fas fa-user" _vik></i></span>
        </div>
        <input type="text" autocomplete="off" name="forgot_mail" class="form-control" placeholder="E-mail" _vik />

    </div>
    <div class="form-group" _vik>
        <input type="submit" value="Submit" class="btn btn-default btn-login " _vik />
    </div>
</form>

<div class="cardfooter" _vik>
    <div class="d-flex justify-content-center links" _vik>
        Don't have an account? <a  data-href="signup" class="" href="signup" _vik>Sign Up</a>
    </div>
    <div class="d-flex justify-content-center links" _vik>
            Already have an account? <a  data-href="login" href="login" _vik>Login</a>
    </div>
</div>
<script >
jQuery(document).on('submit','#forgetForm',function(e){
    e.preventDefault();
    var data=jQuery('#forgetForm').serialize();
    Virus.api({url: 'forgot', sdata:data ,callback:function(data){
            
    }});
})
</script>

