<div class="popup-wrapper">
    <div class="bg-layer"></div>
    <div class="popup-content" data-rel="1">
        <div class="layer-close"></div>
        <div class="popup-container size-1">
            <div class="popup-align">
                <h3 class="h3 text-center">Log in</h3>
                <div class="empty-space col-xs-b30"></div>
                <input class="simple-input" type="text" value="" placeholder="Your email"  />
                <div class="empty-space col-xs-b10 col-sm-b20"></div>
                <input class="simple-input" type="password" value="" placeholder="Enter password" />
                <div class="empty-space col-xs-b10 col-sm-b20"></div>
                <div class="row">
                    <div class="col-sm-6 col-xs-b10 col-sm-b0">
                        <div class="empty-space col-sm-b5"></div>
                        <a class="simple-link">Forgot password?</a>
                        <div class="empty-space col-xs-b5"></div>
                        <a class="simple-link">register now</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a class="button size-2 style-3" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">submit</span>
                            </span>
                        </a>  
                    </div>
                </div>
                <div class="popup-or">
                    <span>or</span>
                </div>
                <div class="row m5">
                    <div class="col-sm-6 col-xs-b10 col-sm-b0">
                        <a class="button facebook-button size-2 style-4 block" href="{{URL::to('login-facebook')}}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">facebook</span>
                            </span>
                        </a>
                    </div>
                   
                    <div class="col-sm-6">
                        <a class="button google-button size-2 style-4 block" href="{{URL::to('login-google')}}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">google+</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>

    <div class="popup-content" data-rel="2">
        <div class="layer-close"></div>
        <div class="popup-container size-1">
            <div class="popup-align">
                <h3 class="h3 text-center">register</h3>
                <form action="{{URL::to('/register')}}" method="post">
                    @csrf
                    <div class="empty-space col-xs-b30"></div>
                    <input class="simple-input" type="text" value="" name="user_name" placeholder="Your name" required/>
                    <div class="col-xs-b10 col-sm-b20"></div>
                    <input class="simple-input" type="email" value="" name="user_email" placeholder="Your email" required />
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input class="simple-input" type="text" value="" name="user_phone" placeholder="Your phone" required pattern="[0-9]" title="Phone must be digits"/>
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input class="simple-input" type="text" value="" name="user_address" placeholder="Your address" required />
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input class="simple-input" type="password" id="password" name="user_password" placeholder="Enter password" required minlength="8" />
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input class="simple-input" type="password" id="confirm_password" name="user_repeat_password" placeholder="Repeat password" required />
                    <span id="message" style="font-size:20px;height:10px"></span>
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <div class="row">
                        <div class="col-sm-10 text-right">
                            <span class="button size-2 style-3">
                                <span class="button-wrapper">
                                    {{-- <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span> --}}
                                    <span style="height:20px;width:100px;font-size:15px"><input type="submit" value="" name="register">submit</span>
                                </span>
                            </span>  
                        </div>
                    </div>
                </form>
                <div class="popup-or">
                    <span>or</span>
                </div>
                <div class="row m5">
                    <div class="col-sm-6 col-xs-b10 col-sm-b0">
                        <a class="button facebook-button size-2 style-4 block" href="{{URL::to('login-facebook')}}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">facebook</span>
                            </span>
                        </a>
                    </div>
                    
                    <div class="col-sm-6">
                        <a class="button google-button size-2 style-4 block" href="{{URL::to('login-google')}}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">google+</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="button-close"></div>
        </div>
    </div>
    <div id="replace-data-rel-3" class="popup-content" data-rel="3"></div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
