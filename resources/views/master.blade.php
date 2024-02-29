@include('header')

@include('menu')

<div class="content-header">
    <div class="container-fluid"> 
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
</div>

@include('footer')