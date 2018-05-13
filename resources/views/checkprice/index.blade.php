@extends('layouts.standart')
@section('title',__('Price'))
@section('body')
  <div id="app">

    <div class="row">
      <div class="col-md-12">
        @include('layouts.parts.field_search')
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @include('layouts.parts.search_barcode_field')
      </div>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="form-group" v-for="item in items" >

          <div class="list-group">
            <a href="#" class="list-group-item">
              <h1 class="list-group-item-heading"> @{{ item.selling_price | money_format }}</h1>
              <h4 class="list-group-item-text"> @{{ item.name }}</h4>
            </a>
          </div>

        </div>
      </div>

    </div>

  </div> <!-- app -->
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>

<script type="text/javascript">

Vue.filter('money_format', function (value) {
    return numeral(value).format('$0,0.00');
})

var vm =  new Vue({
  el: "#app",
  data: {
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
    }
  }
});

</script>

@endsection
