@extends('layouts.standart')

@section('title',__('Point of Receinvings'))

@section('body')
  <div id="app">
    <form method="POST" action="{{url('por')}}" id="por">
      <div class="row">
            {{ csrf_field() }}
          <div class="form-group col-md-6">
            <label class="form-label" for="query">@lang('Supplier'):</label>
            <select class="form-control custom-select mb-3" name="supplier"  required>
                 <option disabled value="">Please select one</option>
                @foreach($suppliers as $supplier)
                  <option value="{{ $supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
          </div>
          <button id="end" type="submit" class="btn btn-success pull-right">@lang('End Reception')</button>
      </div>

      <div class="row">
          <div class=" col-xs-12 col-md-4">
              <!-- Add Item form -->
                  @include('layouts.parts.field_search')
                  @include('layouts.parts.item_select_field')
                  <label class="form-label">@lang('Quantity'):  @lang('Price'): </label>
                  <div class="input-group input-group-lg">
                      <input class="form-control input-lg" step=".01" id="quantity" type="number" name="quantity" v-model="new_car_item.quantity">
                      <input class="form-control input-lg" step=".01" id="cost_price" type="number" name="cost_price" v-model="new_car_item.cost_price">
                      <span class="input-group-btn">
                          <button id="add" type="button" class="btn" :disabled="(new_car_item.quantity < 1 || selected.id < 1)" @click="add()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                      </span>
                  </div>

              <!-- END Add Item form -->
          </div>
          <div class=" col-xs-12 col-md-8">
              @include('layouts.parts.cart_table')
          </div>

      </div>

    </form>
  </div> <!-- app -->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
@include('layouts.parts.row_item_template')
<script type="text/template" id="trash_icon">
<a @click="remove(index)">
  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</a>
</script>

<script type="text/javascript">

Vue.component('trash_icon',{
    template: '#trash_icon',
    props: ['index'],
    methods: {
      remove: function(i){
        this.$emit('remove',i);
      }
    }

  });

Vue.component('row_item',{
    template: '#row_item',
    props: ['car_item','index'],
    methods: {
      subtotal: function(car_item){
        car_item.subtotal = car_item.quantity * car_item.cost_price;
      },
      remove: function(i){
        this.$emit('remove',i);
      }
    }
  });

Vue.filter('money_format', function (value) {
    return numeral(value).format('$0,0.00');
});

var vm =  new Vue({
  el: "#app",
  data: {
      car_items: [],
      new_car_item: {
        id: 0,
        upc_ean_isbn: '',
        name: '',
        description: '',
        quantity: 1,
        selling_price: 0,
        cost_price: 0,
        subtotal: 0
      },
      items: [],
      selected: [],
      query: '',
  },
  methods:{
    getItems: function (query,page){
      var base_url = '{!! url('api/items')!!}'
      var url = base_url + '?query=' + query + "&page=" + page;

      this.$http.get(url).then(function(response){
          this.items = response.body.data;
          console.log(url)
        }, function(){
           console.log("error al recuperar items")
          this.items = [];
       });
    },
    onChange: function(){
        this.new_car_item = {
          id: this.selected.id,
          upc_ean_isbn: this.selected.upc_ean_isbn,
          name: this.selected.name,
          quantity: this.selected.reorder_level, // quantity = reorder_level default
          selling_price: this.selected.selling_price,
          cost_price: this.selected.cost_price,
          subtotal: 0
        }
    },
    add: function(){
      this.car_items.push( this.new_car_item );
      this.selected =  [];
      this.query =  '';
      this.items =  [];
      this.new_car_item = {
        id: 0,
        upc_ean_isbn: '',
        name: '',
        quantity: 1,
        selling_price: 0,
        cost_price: 0,
        subtotal: 0
      };

    },
    remove: function(i){
      this.car_items.splice(i,1);
    }

    },
  computed: {
    total: function(){
      var sum = 0;
      return this.car_items.reduce(function(sum, car_item){
        return sum + car_item.subtotal ;
      },0);
    }
  }
});


    (function() {
        var query = document.getElementById('query');
        var quantity = document.getElementById('quantity');
        var cost_price = document.getElementById('cost_price');

        query.addEventListener('keypress', function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                if (query.value != "") {
                    document.getElementById('search').click();
                    items.focus();
                } else {
                    //document.getElementById('child').click();
                    document.getElementById('end').focus();
                }
            }
        });

        var items = document.getElementById('items');

        items.addEventListener('keypress', function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                if (items.selectedIndex > -1) {
                    quantity.select();
                }
            }
        });
        quantity.addEventListener('keypress', function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                if (quantity.value > 0) {
                    cost_price.select();
                }
            }
        });

        cost_price.addEventListener('keypress', function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                if (cost_price.value > -1) {
                    document.getElementById('add').click();
                    query.focus();
                }
            }
        });

    }());

    $('#por').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) {
        e.preventDefault();
        return false;
      }
    });
</script>
@endsection
