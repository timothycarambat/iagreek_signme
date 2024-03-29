<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/dashboard" class="simple-text">
            		<div class="row">
                	<p class="col-xs-12 text-center header"> {{config('app.name')}} </p>
                	<p class="col-xs-12 text-center header-sub"> {{Auth::user()->org_name}} </p>
            		</div>
            </a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('dashboard') ? 'active':null }}">
                <a href="/dashboard">
                    <i class="fas fa-file-alt"></i>
                    <p>Requests</p>
                </a>
            </li>
            <li class="{{ Request::is('history') ? 'active':null }}">
                <a href="/history">
                    <i class="fas fa-history"></i>
                    <p>Signed Requests</p>
                </a>
            </li>
        </ul>
  </div>
</div>
