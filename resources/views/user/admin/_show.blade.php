@yield('head')
<div class="col-sm-10 col-md-offset-1">
    <div class="row">
        <div class= "col-sm-2">
            <nav class="nav-sidebar">
                <ul class="nav">
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">Presentations</a></li>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Schedule</a></li>
                </ul>
            </nav>
        </div>
        <div class='col-sm-10'> @yield('text') </div>
    </div>
</div>