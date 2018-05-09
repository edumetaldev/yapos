<table class="table table-striped">
  <thead>
    <th>@lang('Barcode') - @lang('Item')</th>
    <th>@lang('Quantity') </th>
    <th>@lang('Unit') @lang('Price')</th>
    <th>Subtotal</th>
    <th>&nbsp;</th>
  </thead>
  <tbody>
<template v-for="(car_item, index) in car_items">
  <row_item :car_item="car_item" :index="index" v-on:remove="remove"></row_item>
</template>
      <tr class="info">
        <td colspan="2"></td>
        <td>Total</td>
        <td>@{{ total | money_format }}</td>
        <td>&nbsp;</td>
      </tr>
  </tbody>
</table>
