<div class="row">
  <div class="col-xs-4 col-md-4">
    <div class="form-group">
      <label class="form-label" for="query">Search</label>
      <div class="form-inline">
        <input class="form-control" type="text" name="query" v-model="query">
        <a class="btn" :disabled="query.length < 1"  v-on:click="getItems(query)"><span class="glyphicon glyphicon-search"></span></a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="table-responsive">
    <table class="table table-striped table-condensed">
      <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Account</th>
          <th>Actions</th>
      </thead>
      <tbody>
          <tr v-for="customer in items">
              <td>@{{ customer.name }}</td>
              <td>@{{ customer.email }}</td>
              <td>@{{ customer.account }}</td>
              <td>
                  <action_icons url="{{ url('customers') }}" :id="customer.id"></action_icons>
              </td>
          </tr>
      </tbody>
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
            items: [],
            selected: '',
            query: ''
        },
        methods:{
          getItems: function (query){
            this.$http.get('{!! url('api/customers')!!}'+ '?query=' + query ).then(function(response){
                this.items = response.body;
            });
          }
        }
      });
  </script>

  @endsection
