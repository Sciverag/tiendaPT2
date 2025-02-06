<footer class="container-flow d-flex align-items-end bg-dark order-last shadow">
    @if (auth()->check())
        <a class="btn btn-outline-warning" href="{{ route('logout') }}">Logout</a>
    @endif
    <h1 class="text-white">&#169;​GameShop</h1>
</footer>
