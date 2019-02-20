<div class="form-group">
  <label class="form-label">Item</label>
  <select id="items" v-model="selected" class="form-control" size="5">
    <option v-for="item in items" v-bind:value="item">
      @{{ item.upc_ean_isbn }} -  @{{ item.name }}
    </option>
  </select>
</div>
