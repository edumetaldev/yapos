<div class="form-group">
  <label class="form-label" for="query">Search</label>
    <input class="form-control" type="text" name="query" v-model="query">
    <button class="btn" v-on:click.prevent="getItems(query,0)"><span class="glyphicon glyphicon-search"></span></button>
</div>
