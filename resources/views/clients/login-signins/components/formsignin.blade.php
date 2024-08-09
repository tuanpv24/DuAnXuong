<div class="u-column2 col-2" style="width: 100%;">
    <h2>Register</h2>
    <form method="post" action="{{route('client.signin')}}" class="kobolg-form kobolg-form-register register">
        @csrf
        <p class="kobolg-form-row kobolg-form-row--wide form-row form-row-wide">
            <label for="reg_email">Email addresses&nbsp;<span
                    class="required">*</span></label>
            <input type="email" class="kobolg-Input kobolg-Input--text input-text"
                   name="email" id="reg_email" autocomplete="email" value="{{old('email')}}">
                   @if ($errors->has('email'))
                   <span class="text-danger">* {{$errors->first('email')}}</span>
               @endif</p>
                   <p class="kobolg-form-row kobolg-form-row--wide form-row form-row-wide">
                    <label for="reg_email">Mật khẩu&nbsp;<span
                            class="required">*</span></label>
                    <input type="password" class="kobolg-Input kobolg-Input--text input-text"
                           name="password" id="reg_email" autocomplete="email">
                           @if ($errors->has('password'))
                           <span class="text-danger">* {{$errors->first('password')}}</span>
                       @endif</p>
                           <p class="kobolg-form-row kobolg-form-row--wide form-row form-row-wide">
                            <label for="reg_email">Xác Nhận Mật khẩu&nbsp;<span
                                    class="required">*</span></label>
                            <input type="password" class="kobolg-Input kobolg-Input--text input-text"
                                   name="password_confirmation">
                                   @if ($errors->has('password'))
                                   <span class="text-danger">* {{$errors->first('password')}}</span>
                               @endif</p>
        <div class="kobolg-privacy-policy-text"><p>Your personal data will be used to
            support your experience throughout this website, to manage access to your
            account, and for other purposes described in our <a
                    href="#" class="kobolg-privacy-policy-link"
                    target="_blank">privacy policy</a>.</p>
        </div>
        <p class="kobolg-FormRow form-row">
            <button type="submit" class="kobolg-Button button"
                    value="Register">Register
            </button>
        </p>
    </form>
</div>