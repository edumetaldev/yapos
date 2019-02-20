<script type="text/template" id="row_item">
<tr>
  <td><input type=hidden id="id[]" name="id[]" :value="car_item.id" />@{{ car_item.upc_ean_isbn }} - @{{ car_item.name }}</td>
  <td><input class="form-control" type="number" step=".01" style="width: 6em;" name="quantity[]" v-model="car_item.quantity" :onchange="subtotal(car_item)"></td>
  <td><input class="form-control" type="number" step=".01" min="0" style="width: 6em;" name="price[]" v-model="car_item.cost_price" :onchange="subtotal(car_item)"></td>
  <td>@{{ car_item.subtotal | money_format  }}</td>
  <td> <trash_icon v-on:remove="remove" :index="index"></trash_icon> </td>
</tr>
</script>
