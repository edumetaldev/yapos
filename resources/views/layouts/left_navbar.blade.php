<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    @guest
      <li><a href="{{ url('items') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Items</a></li>
      <li><a href="{{ url('sales') }}"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Sales</a></li>
      <li><a href="{{ url('customers') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Customers </a></li>
      <li><a href="{{ url('pos') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> POS</a></li>

    @else
      <li><a href="{{ url('items') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Items</a></li>
      <li><a href="{{ url('sales') }}"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Sales</a></li>
      <li><a href="{{ url('pos') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> POS</a></li>
    @endguest
</ul>
