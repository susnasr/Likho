<br><br><br><br><br>
<footer class="footer">
    <svg class="footer-border" height="214" viewBox="0 0 2204 214" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2203 213C2136.58 157.994 1942.77 -33.1996 1633.1 53.0486C1414.13 114.038 1200.92 188.208 967.765 118.127C820.12 73.7483 263.977 -143.754 0.999958 158.899" stroke-width="2"/>
    </svg>

    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-4 text-center mb-10">
                <a href="{{ route('home') }}"><img class="img-fluid" width="100px" src="{{ asset('images/logo.png') }}" alt="Blog Logo"></a>
                <p>© 2025 Likho All rights reserved.</p>
            </div>

            <div class="col-md-4 text-center text-md-left mb-4">
                <h4>Contact Us</h4>
                <ul class="list-unstyled">
                    <li>Email: <a href="nsr@gmail.com">nsr@gmail.com</a></li>
                    <li>Phone: +123 456 7890</li>
                    <li>Address: 123 Blog Street, Blog City, BC 12345</li>
                    <li>Likho</li>
                </ul>
            </div>

            <div class="col-md-4 text-center text-md-left mb-4">
                <h4>About Us</h4>
                <p>Welcome to our blog, where we share the latest updates and insights on various topics. Stay tuned for engaging content and feel free to reach out to us!</p>
            </div>
        </div>

        <div class="row align-items-center mb-4">
            <div class="col-md-6 text-center text-md-left mb-4">
                <ul class="list-inline footer-list mb-0">
                    <li class="list-inline-item"><a href="{{ route('home') }}">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}">Terms & Conditions</a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}">About Us</a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-6 text-md-right text-center mb-4">
                <ul class="list-inline footer-list mb-0">
                    <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form class="form-inline justify-content-center mb-4">
                    <input type="email" class="form-control mb-2 mr-sm-2" id="subscribeEmail" placeholder="Enter your email">
                    <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                </form>
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</footer>

<!-- JS Plugins -->
<script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
