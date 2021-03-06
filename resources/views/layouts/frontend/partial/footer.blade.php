<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="#"><img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Logo Image"></a>
                    <p class="copyright">{{ config('app.name') }} &copy; {{ now()->year }}. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
                    <ul class="icons">
                        <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category.posts',$category->slug) }}">{{ strtoupper($category->name) }}</a></li>
                    @endforeach
                    </ul>
                    {{-- <ul>
                        <li><a href="#">BEAUTY</a></li>
                        <li><a href="#">HEALTH</a></li>
                        <li><a href="#">MUSIC</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">SPORT</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="#">TRAVEL</a></li>
                    </ul> --}}
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form action="{{ route('subscriber.store') }}" method="POST">
                            @csrf
                            <input class="email-input @error('subscriber_email') is-invalid @enderror" 
                                type="email" name="subscriber_email" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>
                    @error('subscriber_email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                    @enderror

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>