<div id="app">
  <table class="table table-striped table-condensed">
      <thead>
          <tr>
              <td>{{trans('supplier.company_name')}}</td>
              <td>{{trans('supplier.name')}}</td>
              <td>{{trans('supplier.email')}}</td>
              <td>{{trans('supplier.phone_number')}}</td>
              <td>&nbsp;</td>
          </tr>
      </thead>
      <tbody>
      @foreach($suppliers as $value)
          <tr>
              <td>{{ $value->company_name }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->email }}</td>
              <td>{{ $value->phone_number }}</td>
              <td>
                  {!! Form::open(array('url' => 'suppliers/' . $value->id, 'class' => 'pull-right')) !!}
                    <action_icons url="{{ url('suppliers') }}" :id="{{$value->id}}"></action_icons>
                  {!! Form::close() !!}
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
</div>

@section('js')
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
