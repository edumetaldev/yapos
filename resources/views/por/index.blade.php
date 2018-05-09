@extends('layouts.standart')

@section('title',__('Point of Receinvings'))

@section('body')

  <div id="app">
    <form method="POST" action="{{url('por')}}" >
      {{ csrf_field() }}
      <div class="row">
        <div class=" col-xs-6 col-md-6">
          @include('layouts.parts.field_search')
        </div>
        <div class="col-xs-6 col-md-6">
          <div class="form-group">
            <label class="form-label" for="query">@lang('Supplier'):</label>
            <select class="form-control" name="supplier">
            @foreach($suppliers as $supplier)
              <option value="{{ $supplier->id}}">{{$supplier->name}}</option>
            @endforeach
            </select>
          </div>
        </div>

      </div>

      <div class="row">
        <div class=" col-xs-12 col-md-6">
          @include('layouts.parts.item_select_field')
        </div>
        <div class=" col-xs-12 col-md-6">
          <label class="form-label">@lang('Quantity'):</label>
          <div class="form-inline">
            <input class="form-control" type="number" name="quantity" v-model="new_car_item.quantity" style="width: 5em;" >
            <button type="button" class="btn" :disabled="new_car_item.quantity < 1" @click="add()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
          </div>
          <button type="submit" class="btn btn-success pull-right">@lang('End Reception')</button>
        </div>
      </div>

      <div class="row">
        @include('layouts.parts.cart_table')
      </div>

    </form>
  </div> <!-- app -->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
<script type="text/template" id="row_item">
<tr>
  <td><input type=hidden name="id[]" :value="car_item.id" />@{{ car_item.upc_ean_isbn }} - @{{ car_item.name }}</td>
  <td><input class="form-control" type="number" style="width: 5em;" name="quantity[]" v-model="car_item.quantity" :onchange="subtotal(car_item)"></td>
  <td><input class="form-control" type="number" step=".01" min="0" style="width: 6em;" name="price[]" v-model="car_item.cost_price" :onchange="subtotal(car_item)"></td>
  <td>@{{ car_item.subtotal | money_format  }}</td>
  <td> <trash_icon v-on:remove="remove" :index="index"></trash_icon> </td>
</tr>
</script>

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
      new_car_item:
              {
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
      selected: { id: 0, quantity: 1, subtotal: 0 },
      query: '',
      quantity: 1,
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
    add: function(){
      this.new_car_item.id = this.selected.id
      this.new_car_item.name = this.selected.name;
      this.new_car_item.cost_price = this.selected.cost_price;
      this.new_car_item.upc_ean_isbn = this.selected.upc_ean_isbn;

      this.car_items.push(this.new_car_item);
      this.selected =  { id: 0, quantity: 1, subtotal: 0 };
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

</script>
@endsection
