@include('backend.section._header')
<body class="login">
<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form method="POST" action="{{ route('login') }}">
                        @csrf

              <h1>Login Form</h1>
              <div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
              </div>
              <div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert" >
        <strong style="color:red;font-size: 15px;">{{ $message }}</strong>
    </span>
@enderror
              </div>

              <div>
              <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
               </div>

              <div>
              <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
               
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                
                <br />

                <div>
                  
                  <p>Admin CMS</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
    </body>
</html>

