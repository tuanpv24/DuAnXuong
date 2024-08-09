<div class="u-column1 col-1" style="width: 100%;">
    <h2>Đăng Nhập</h2>
    <form class="kobolg-form kobolg-form-login login" action="{{route('client.login')}}" method="post">
        @csrf
        <p class="kobolg-form-row kobolg-form-row--wide form-row form-row-wide">
            <label for="username">Email&nbsp;<span
                    class="required">*</span></label>
            <input type="text" class="kobolg-Input kobolg-Input--text input-text"
                   name="email" id="email" value="{{old('email')}}" autocomplete="email" value="">
                   @if ($errors->has('email'))
                   <span class="text-danger">* {{$errors->first('email')}}</span>
               @endif
                </p>
        <p class="kobolg-form-row kobolg-form-row--wide form-row form-row-wide">
            <label for="password">Password&nbsp;<span class="required">*</span></label>
            <input class="kobolg-Input kobolg-Input--text input-text"
            value="{{old('password')}}"
                   type="password" name="password">
                   @if ($errors->has('password'))
                   <span class="text-danger">* {{$errors->first('password')}}</span>
               @endif
        </p>
        <p class="form-row">
            <button type="submit" class="kobolg-Button button"
                    value="Log in">Log in
            </button>
            <label class="kobolg-form__label kobolg-form__label-for-checkbox inline">
                <input class="kobolg-form__input kobolg-form__input-checkbox"
                       name="rememberme" type="checkbox" id="rememberme" value="forever">
                <span>Remember me</span>
            </label>
        </p>
        <p class="kobolg-LostPassword lost_password">
            <a href="{{route('client.form.signin')}}">Tạo tài khoản</a>
        </p>
    </form>
</div>