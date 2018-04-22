<table class="table table-condensed">
  <thead>
    <th>Barcode - Name</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Subtotal</th>
    <th>&nbsp;</th>
  </thead>
  <tbody>
      <template v-for="(car_item, index) in car_items">
        <row_item :car_item="car_item" :index="index" v-on:remove="remove"></row_item>
      </template>
      <tr class="info">
        <td colspan="4"></td>
        <td>Total</td>
        <td>@{{ total | money_format }}</td>
        <td>&nbsp;</td>
      </tr>
  </tbody>
</table>
