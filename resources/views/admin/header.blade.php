<div class="container portfolio_title">
    <div class="section-title">
        <h2>{{ $data['title'] }}</h2>
    </div>
</div>
<div class="portfolio">
    <div id="filters" class="paddind: 0px 0px 0px 0px">
        <ul class="clearfix">
            <li><a id="all" href="{{ route('pages') }}" data-filter="*" class="active">
                    <h5>Страницы</h5>
                </a></li>
            <li><a id="all" href="{{ route('portfolio') }}" data-filter="*" class="active">
                    <h5>Портфолио</h5>
                </a></li>
            <li><a id="all" href="{{ route('services') }}" data-filter="*" class="active">
                    <h5>Сервисы</h5>
                </a></li>
        </ul>
    </div>
</div>
