@extends('layouts.app')

@section('content')

<div class="content" style="background-color: grey">
  <div id="app" style="background-color: white" class="col-md-8 col-md-offset-2">
    <form  @submit.prevent="addCarItem" class="form-inline">
        <div class="row">
          <div class=" col-xs-8 col-md-8">
            <div class="form-group">
              <label class="form-label" for="query">Buscar</label>
                <input class="form-control" type="text" name="query" v-model="query">
            </div>
          </div>

        </div>
        <div class="row">
          <div class=" col-xs-12 col-md-6">
            <div class="form-group">
              <label class="form-label">Producto</label>
              <select v-model="selected" class="form-control" size="5" style="width:350px;">
                <option v-for="item in tableFilter" v-bind:value="item">
                  @{{ item.upc_ean_isbn }} -  @{{ item.name }}
                </option>
              </select>
            </div>
          </div>
          <div class=" col-xs-12 col-md-6">
            <div class="form-group">
              <label class="form-label">Cantidad:</label>
              <input class="form-control" type="number" name="quantity" v-model="new_car_item.quantity" style="width: 5em;" >
              <button type="button" class="btn" :disabled="new_car_item.quantity < 1" @click="add()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
          </div>
        </div>
      </form>
        <form method="POST" action="{{url('pos')}}" >
          <div class="row">
            <div class="col-xs-4 col-md-4">
              <div class="form-group">
                <label class="form-label" for="query">Customer</label>
                <select class="form-control" name="customer">
                  @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
          <div>
            <div>
              <table class="table table-striped">
                <thead>
                  <th>Id</th>
                  <th>Barcode</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Subtotal</th>
                  <th>&nbsp;</th>
                </thead>
                <tbody>
              <template v-for="(car_item, index) in car_items">
                <row_item :car_item="car_item" :index="index" v-on:remove="remove"></row_item>
              </template>
                    <tr class="info">
                      <td colspan="4"></td>
                      <td>Total</td>
                      <td>@{{ total | money_format }}</td>
                      <td>&nbsp;</td>
                    </tr>
                </tbody>
              </table>
                                   {{ csrf_field() }}
              <button type="submit" class="btn btn-success">Terminar</button>
            </div>

          </div>
        </div>
        </form>
    </div> <!-- app -->
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
<script type="text/template" id="row_item">
<tr>
  <td>@{{ car_item.id }}<input type=hidden name="id[]" :value="car_item.id" /></td>
  <td>@{{ car_item.upc_ean_isbn }}</td>
  <td>@{{ car_item.name }}</td>
  <td><input class="form-control" type="number" style="width: 5em;" name="quantity[]" v-model="car_item.quantity" :onchange="subtotal(car_item)"></td>
  <td><input class="form-control" type="number" min="0" style="width: 6em;" name="price[]" v-model="car_item.selling_price" :onchange="subtotal(car_item)"></td>
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
                quantity: 0,
                selling_price: 7,
                subtotal: 0
              },
      items: [],
      selected: '',
      query: ''
  },
  created: function(){
     this.getItems();
  },
  methods:{
    findBy: function (list, value) {
      return list.filter(function (item) {
        return Object.keys(item).some(function (key) {
          return String(item[key]).toLowerCase().indexOf(value) > -1
        })
      })
    },

    getItems: function (){
      this.$http.get('{!! url('api/items')!!}').then(function(response){
          this.items = response.body;
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
      this.selected =  '';
      this.query =  '';
      this.new_car_item = {
        id: 0,
        upc_ean_isbn: '',
        name: '',
        quantity: 0,
        unit_price: 0,
        subtotal: 0
      };

    },
    remove: function(i){
      console.log(i + " < index");
      this.car_items.splice(i,1);
    }
  },
  computed: {
    total: function(){
      var sum = 0;
      return this.car_items.reduce(function(sum, car_item){
        return sum + car_item.subtotal ;
      },0);
    },
    tableFilter: function () {
      if( this.query.length >= 3){
        return this.findBy(this.items, this.query);
      }

    }
  }
});

</script>
<script type="text/javascript">
$(document).ready(function () {
    $.fn.enterkeytab = function () {
        $(this).on('keydown', 'input,select,text,button,number', function (e) {
            var self = $(this)
              , form = self.parents('form:eq(0)')
              , focusable
              , next
            ;
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,number').filter(':visible');
                next = focusable.eq(focusable.index(this) + 1);
                if (next.length) {
                    //if disable try get next 10 fields
                    if (next.is(":disabled")){
                        for(i=2;i<10;i++){
                            next = focusable.eq(focusable.index(this) + i);
                            if (!next.is(":disabled"))
                                break;
                        }
                    }
                    next.focus();
                }
                return false;
            }
        });
    }
    $("form").enterkeytab();
});
</script>
@endsection
