<div class="row">
  <!-- Upc Ean Isbn Field -->
  <div class="form-group col-md-3">
      <label for="upc_ean_isbn">@lang('Barcode'):</label>
      <input type="number" name="upc_ean_isbn" id="upc_ean_isbn" class="form-control" value="{{ old('upc_ean_isbn',(isset($item->upc_ean_isbn) ? $item->upc_ean_isbn: ''))}}"/>
  </div>
  <!-- Name Field -->
  <div class="form-group col-md-4">
      <label for="name">@lang('Name'):</label>
      <input type="text" name="name" id="name" onkeyup="this.value = this.value.toUpperCase()" class="form-control" value="{{ old('name',(isset($item->name) ? $item->name: ''))}}"/>
  </div>
  <!-- Description Field -->
  <div class="form-group col-md-5">
      <label for="description">@lang('Description'):</label>
      <input type="text" name="description" onkeyup="this.value = this.value.toUpperCase()" id="description" class="form-control"   value="{{ old('description',(isset($item->description) ? $item->description: ''))}}"/>
  </div>
</div>

<div class="row">
  <div class="col-xs-3 col-md-3">
    <!-- Avatar Field -->
    <div class="form-group">
        <label for="avatar">Avatar:</label>
        <input type="text" name="avatar" id="avatar" class="form-control" value="{{ old('avatar',(isset($item->avatar) ? $item->avatar: 'no-photo.png'))}}" />
    </div>

    <!-- Type Field -->
    <div class="form-group">
          <label for="is_item_kit">@lang('Is Item Kit'):</label>
        <label class="checkbox-inline">

          @isset($item)
          <label for="is_item_kit">@lang('Yes'):</label>
          <input type="radio" name="is_item_kit" id="is_item_kit" value="1" {{ old('is_item_kit',$item->is_item_kit) == 1  ? "checked": "" }} />
          <label for="is_item_kit">@lang('No'):</label>
          <input type="radio" name="is_item_kit" id="is_item_kit" value="0" {{ old('is_item_kit',$item->is_item_kit) == 0  ? "checked": "" }} />
          @else
          <label for="is_item_kit">@lang('Yes'):</label>
          <input type="radio" name="is_item_kit" id="is_item_kit" value="1" checked />
          <label for="is_item_kit">@lang('No'):</label>
          <input type="radio" name="is_item_kit" id="is_item_kit" value="0"/>

          @endisset

    </div>

    <!-- Stock Type Field -->
    <div class="form-group">
      <label for="is_stockeable">@lang('Stock Type'):</label>
      <label class="checkbox-inline">
          <label for="is_stockeable">@lang('Stockeable'):</label>
          @isset ($item)
            <input type="radio" name="is_stockeable" id="is_stockeable" value="1" {{ old('is_stockeable',$item->is_stockeable) == 1 ? "checked": '' }} />
            <label for="is_stockeable">@lang('Unstockeable'):</label>
            <input type="radio" name="is_stockeable" id="is_stockeable" value="0" {{ old('is_stockeable',$item->is_stockeable) == 0 ? "checked": '' }}/>
          @else
            <input type="radio" name="is_stockeable" id="is_stockeable" value="1" checked />
            <label for="is_stockeable">@lang('Unstockeable'):</label>
            <input type="radio" name="is_stockeable" id="is_stockeable" value="0" />
          @endisset
      </label>
    </div>

  </div>
  <div class="col-xs-4 col-md-4">
    <!-- Cost Price Field -->
    <div class="form-group">
      <label for="cost_price">@lang('cost_price'):</label>
      <input type="number" step=".01" name="cost_price" id="cost_price" class="form-control" value="{{ old('cost_price',(isset($item->cost_price) ? $item->cost_price: '0.00'))}}"/>
    </div>

    <!-- Selling Price Field -->
    <div class="form-group">
      <label for="selling_price">@lang('selling_price'):</label>
      <input type="number" step=".01" name="selling_price" id="selling_price" class="form-control" value="{{ old('selling_price',(isset($item->selling_price) ? $item->selling_price: '0.00'))}}" />
    </div>

    <!-- Quantity Field -->
    <div class="form-group">
      <label for="quantity">@lang('quantity'):</label>
      <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity',(isset($item->quantity) ? $item->quantity: '0'))}}"/>
    </div>

  </div>
  <div class="col-xs-4 col-md-4">
    <!-- Reorder Level Field -->
    <div class="form-group">
      <label for="reorder_level">@lang('reorder_level'):</label>
      <input type="number" name="reorder_level" id="reorder_level" class="form-control" value="{{old('reorder_level',is_null($item->reorder_level) ? '0': $item->reorder_level )}}"/>
    </div>

    <!-- Receiving Quantity Field -->
    <div class="form-group">
      <label for="receiving_quantity">@lang('receiving_quantity'):</label>
      <input type="number" name="receiving_quantity" id="receiving_quantity" class="form-control" value="{{old('receiving_quantity',is_null($item->receiving_quantity) ? '0': $item->receiving_quantity )}}"/>
    </div>

  </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@lang('Save')</button>
    <a href="{!! route('items.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
