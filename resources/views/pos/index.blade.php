@extends('layouts.standart')
@section('title',__('Point of Sale'))
@section('body')
  <div id="app">
    <form method="POST" action="{{url('pos')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class=" col-xs-12 col-md-6">
              @include('layouts.parts.field_search')
          </div>
          <div class=" col-xs-12 col-md-6">
            <div class="form-group">
              <label class="form-label" for="query">@lang('Customer')</label>
              <select class="form-control" name="customer">
                @foreach($customers as $customer)
                  <option value="{{ $customer->id }}">{{ $customer->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class=" col-xs-12 col-md-6">
            <div class="form-group">
            <label class="form-label">@lang('Items'):</label>
              <select v-model="selected" class="form-control" size="8">
                <option v-for="item in items" v-bind:value="item">
                  @{{ item.upc_ean_isbn }} -  @{{ item.name }}
                </option>
              </select>
            </div>
          </div>
          <div class=" col-xs-12 col-md-6">
            <label class="form-label">@lang('Quantity'):</label>
            <div class="form-inline">
              <input class="form-control" type="number" name="quantity" v-model="new_car_item.quantity" style="width: 5em;" >
              <button type="button" class="btn" :disabled="new_car_item.quantity < 1" @click="add()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-success">@lang('End Shop')</button>
            </div>
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
  <input type=hidden name="id[]" :value="car_item.id" />
  <td>@{{ car_item.upc_ean_isbn }} -  @{{ car_item.name }}</td>
  <td><input class="form-control" type="number" style="width: 5em;" name="quantity[]" v-model="car_item.quantity" :onchange="subtotal(car_item)"></td>
  <td><input class="form-control" type="number" step=".01" min="0" style="width: 6em;" name="price[]" v-model="car_item.selling_price" :onchange="subtotal(car_item)"></td>
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
        car_item.subtotal = car_item.quantity * car_item.selling_price;
      },
      remove: function(i){
        this.$emit('remove',i);
      }
    }
  });

Vue.filter('money_format', function (value) {
    return numeral(value).format('$0,0.00');
})

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
                subtotal: 0
              },
      items: [],
      selected: [],
      query: ''
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
      this.new_car_item.selling_price = this.selected.selling_price;
      this.new_car_item.upc_ean_isbn = this.selected.upc_ean_isbn;

      this.car_items.push(this.new_car_item);
      this.selected =  [];
      this.query =  '';
      this.items =  [];
      this.new_car_item = {
        id: 0,
        upc_ean_isbn: '',
        name: '',
        quantity: 0,
        selling_price: 0,
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
