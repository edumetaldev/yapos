<!-- Left Side Of Navbar -->
@auth
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Maestros <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li>
              <a class="dropdown-item" href="{{ url('items') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> @lang('Items')</a>
          </li>
          <li>
              <a class="dropdown-item" href="{{ url('customers') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> @lang('Customers') </a>
          </li>
          <li>
              <a class="dropdown-item" href="{{ url('suppliers') }}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> @lang('Suppliers')</a>
          </li>
      </ul>
      </li>

      <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="TransaccionesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transacciones <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="TransaccionesDropdown">
            <li><a href="{{ url('stocks') }}"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> @lang('Stocks')</a></li>
            <li><a href="{{ url('sales') }}"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> @lang('Sales')</a></li>
            <li><a href="{{ url('receivings') }}"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> @lang('Receivings')</a></li>
            <li><a href="{{ url('prices') }}"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> @lang('Prices')</a></li>
        </ul>
      </li>


      <li><a href="{{ url('pos') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> POS</a></li>
      <li><a href="{{ url('por') }}"><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> POR</a></li>
      <li><a href="{{ url('checkprice') }}"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Price</a></li>
  </ul>
@endauth
