@include('clients.login-signins.components.path')
<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="kobolg">
                        <div class="kobolg-notices-wrapper"></div>
                        <div class="u-columns col2-set" id="customer_login">
                            @include('clients.login-signins.components.formlogin')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>