
<footer>
    @section('f-login')
        <div class="imgs">
            <a href="{{ route('mypage') }}">
            <img src="./../img/mypage.png" alt="mypage" class="footer-img img1">
            </a>

            <a href="{{ route('search') }}">
            <img src="./../img/search.png" alt="search" class="footer-img img2">
            </a>

            <a href="{{ route('contact') }}">
            <img src="./../img/contact.png" alt="contact" class="footer-img img3">
            </a>
        </div>
    @endsection
</footer>