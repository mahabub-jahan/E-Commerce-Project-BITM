<div class="header_top">
    <div class="container">
        <div class="header_top-box">
            <div class="header-top-left">
                <div class="box">
                    <select tabindex="4" class="dropdown drop">
                        <option value="" class="label" value="">Dollar :</option>
                        <option value="1">Dollar</option>
                        <option value="2">Euro</option>
                    </select>
                </div>
                <div class="box1">
                    <select tabindex="4" class="dropdown">
                        <option value="" class="label" value="">English :</option>
                        <option value="1">English</option>
                        <option value="2">French</option>
                        <option value="3">German</option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="login.html">Account</a></li>
                    <li><a href="wishlist.html">Wishlist</a></li>

                    @if(Session::get('customerId'))
                    <li><a href="{{url('/customer-logout')}}">Logout</a></li>
                    @else
                    <li><a href="register.html">Log In</a></li>
                    <li><a href="register.html">Sign Up</a></li>
                     @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>