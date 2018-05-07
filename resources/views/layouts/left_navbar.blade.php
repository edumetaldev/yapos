<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    @guest
    @else
    @endguest
      <li><a href="{{ url('items') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Items</a></li>
      <li><a href="{{ url('stocks') }}"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Stocks</a></li>
      <li><a href="{{ url('sales') }}"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Sales</a></li>
      <li><a href="{{ url('customers') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Customers </a></li>
      <li><a href="{{ url('receivings') }}"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Receivings</a></li>
      <li><a href="{{ url('suppliers') }}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Suppliers</a></li>
      <li><a href="{{ url('prices') }}"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Prices</a></li>
      <li><a href="{{ url('pos') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> POS</a></li>
      <li><a href="{{ url('por') }}"><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> POR</a></li>

</ul>
