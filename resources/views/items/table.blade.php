<div id="app">

    <div class="form-group">
      <label class="form-label" for="query">Search</label>
      <div class="form-inline">
        <input class="form-control" type="text" name="query" v-model="query">
        <button class="btn" :disabled="query.length < 1"  v-on:click="getItems(query,0)"><span class="glyphicon glyphicon-search"></span></button>
        <p v-if="pagination.current_page > 0">Total found: @{{ pagination.total }}</p>
        <p v-if="pagination.current_page > 0">Page: @{{ pagination.current_page}} of @{{ pagination.last_page}}</p>
      </div>
    </div>
  <div class="table-responsible">
    <table class="table table-striped table-condensed">
      <thead>
        <th>Upc Ean Isbn - Name</th>
        <th class="hidden-xs">Cost Price</th>
        <th>Selling Price</th>
        <th>Quantity</th>
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
    <a :href="getUrl(url,id)" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
  </script>

  <script type="text/template" id="edit_icon">
    <a :href="getUrl(url,id)" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
  </script>

  <script type="text/template" id="action_icons">
    <form :action="url + '/' + id" method="POST">
      <div class='btn-group'>
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <show_icon :url="url" :id="id"></show_icon>
          <edit_icon :url="url" :id="id"></edit_icon>
          <button class ="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></button>
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
        },
        methods:{
          getItems: function (query, page){
            this.$http.get('{!! url('api/items')!!}'+ '?query=' + query + "&page=" + page).then(function(response){
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
