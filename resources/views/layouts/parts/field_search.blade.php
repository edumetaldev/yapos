<div class="form-group">
    <label class="form-label" for="query">@lang('Search'):</label>
    <div class="input-group input-group-lg">
      <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-font" aria-hidden="true"></span></span>
      <input class="form-control" type="text" name="query" v-model="query">
      <span class="input-group-btn">
        <button class="btn" v-on:click.prevent="getItems(query,0)"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
</div>
