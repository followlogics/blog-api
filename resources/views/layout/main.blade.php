<div class="row" _vik>
    @section('sidebar')
    <div _vik class="col-sm-12">
        <img _vik src="public/me.jpg" alt="Logo" class="img-thumbnail img-responsive" />
    </div>
    @show

    <div id="primaryarea" class="col-sm-9" _vik>
        @yield('content')
    </div>
</div>