<div class="form-group">
    <label class="form-label" for="query">@lang('Search'):</label>
    <div class="input-group input-group-lg">
      <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span></span>
      <input id="barcode" class="form-control" type="number" name="query" v-model="query">
      <span class="input-group-btn">
        <button id="search" class="btn" v-on:click.prevent="getItems(query,0)"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
</div>
