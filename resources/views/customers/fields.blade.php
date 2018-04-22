  <!-- Name Field -->
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name',(isset($customer->name) ? $customer->name: ''))}}"/>
  </div>
  <!-- Account Field -->
  <div class="form-group">
      <label for="name">Account:</label>
      <input type="text" name="account" id="account" class="form-control" value="{{ old('account',(isset($customer->account) ? $customer->account: ''))}}"/>
  </div>
  <!-- Comment Field -->
  <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email',(isset($customer->email) ? $customer->email: ''))}}" />
  </div>

  <!-- Comment Field -->
  <div class="form-group">
      <label for="comment">Comment:</label>
      <input type="text" name="comment" id="comment" class="form-control" value="{{ old('comment',(isset($customer->comment) ? $customer->comment: ''))}}" />
  </div>

  <!-- Submit Field -->
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="{!! route('customers.index') !!}" class="btn btn-default">Cancel</a>
  </div>
