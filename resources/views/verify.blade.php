
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dear User</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <a href="https://afarm.africa:818/reset_password{{$token}}">Please Click This Link To Change Your Password</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

