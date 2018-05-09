<div id="app">
<div class="row">
  <div class="col-md-5">
    @include('layouts.parts.field_search')
    <p v-if="pagination.current_page > 0">Total found: @{{ pagination.total }}</p>
    <p v-if="pagination.current_page > 0">@lang('Page'): @{{ pagination.current_page}} @lang('of') @{{ pagination.last_page}}</p>
</div>
<div class="col-md-7">
  <div class="form-inline">
    <label class="form-label" for="query">@lang('Reorder Level Down'):</label>
    <input type="checkbox" name="options[]" v-model="options" value="reorder_level_down" /><br/>
    <label class="form-label" for="query">@lang('Without Cost Price'):</label>
    <input type="checkbox" name="options[]" v-model="options" value="without_cost_price" /><br/>
    <label class="form-label" for="query">@lang('Without Selling Price'):</label>
    <input type="checkbox" name="options[]" v-model="options" value="without_selling_price" /><br/>
    <label class="form-label" for="query">@lang('Only Stockeables'):</label>
    <input type="checkbox" name="options[]" v-model="options" value="only_stockeable" />
  </div>
</div>

</div>

  <div class="table-responsible">
    <table class="table table-striped table-condensed">
      <thead>
        <th>@lang('Barcode') - @lang('Item')</th>
        <th class="hidden-xs">@lang('Cost Price')</th>
        <th>@lang('Selling Price')</th>
        <th>@lang('Quantity')</th>
        <th>Action</th>
      </thead>
      <tbody>
        <tr v-for="row in rows">
            <td>@{{ row.upc_ean_isbn }} - @{{ row.name }}</td>
            <td class="hidden-xs">@{{ row.cost_price }}</td>
            <td>@{{ row.selling_price }}</td>
            <td>@{{ row.quantity }}</td>
            <td>
                <action_icons url="{{ url('items') }}" :id="row.id"></action_icons>
            </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
            <td colspan="5">
              <ul class="pagination">
                 <li v-if="pagination.current_page > 1">
                     <a href="javascript:void(0)" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                         <span aria-hidden="true">«</span>
                         </a>
                     </li>
                 <li v-for="page in pagination.last_page" :class="{'active': page == pagination.current_page}">
                     <a href="javascript:void(0)" v-on:click.prevent="changePage(page)">@{{ page }}</a>
                     </li>
                 <li v-if="pagination.current_page < pagination.last_page">
                     <a href="javascript:void(0)" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                         <span aria-hidden="true">»</span>
                         </a>
                     </li>
                 </ul>
            </td>
        </tr>
      </tfoot>
    </table>

  </div>
</div>

@section('js')

  <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>

  <script type="text/template" id="show_icon">
    <a :href="getUrl(url,id)" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-eye-open"></i></a>
  </script>

  <script type="text/template" id="edit_icon">
    <a :href="getUrl(url,id)" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
  </script>

  <script type="text/template" id="copy_icon">
    <a :href="getUrl(url,id)" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-duplicate"></i></a>
  </script>

  <script type="text/template" id="action_icons">
    <form :action="url + '/' + id" method="POST">
      <div class='btn-group'>
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <show_icon :url="url" :id="id"></show_icon>
          <edit_icon :url="url" :id="id"></edit_icon>
          <copy_icon :url="url" :id="id"></copy_icon>
          <button class ="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></button>
      </div>
    </form>
  </script>

  <script type="text/javascript">
    Vue.component('show_icon',{
        template: '#show_icon',
        props: ['url','id'],
        methods: {
          getUrl: function (url,id){
            return url + "/" + id;
          }
        }
      });
  </script>

  <script type="text/javascript">
    Vue.component('edit_icon',{
        template: '#edit_icon',
        props: ['url','id'],
        methods: {
          getUrl: function (url,id){
            return url + "/" + id + "/edit";
          }
        }
      });
  </script>

  <script type="text/javascript">
    Vue.component('copy_icon',{
        template: '#copy_icon',
        props: ['url','id'],
        methods: {
          getUrl: function (url,id){
            return url + "/" + id + "/copy";
          }
        }
      });
  </script>

  <script type="text/javascript">
    Vue.component('action_icons',{
        template: '#action_icons',
        props: ['url','id']
      });
  </script>

  <script type="text/javascript">
      var vm =  new Vue({
        el: "#app",
        data: {
            rows: [],
            selected: '',
            query: '',
            pagination: [{ 'prev_page_url': 0 }],
            options:[],
        },
        methods:{
          getItems: function (query, page){
            var options = "";
            this.options.forEach(function(entry) {
              options += "&options[]=" + entry;
            });
            this.$http.get('{!! url('api/items')!!}'+ '?query=' + query + "&page=" + page + options).then(function(response){
                this.rows = response.body.data;
                this.pagination = response.body;
            });
          },
          changePage(page) {
            this.getItems(this.query, page);
            this.pagination.current_page = page;
          }
        }
    });
  </script>

  @endsection
