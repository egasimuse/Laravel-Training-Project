    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" placeholder="Customer Name" class="form-control">
        <div>{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') ?? $customer->email }}" placeholder="Customer Email" class="form-control">
        <div>{{ $errors->first('email') }}</div>
    </div>

    <div class="from-group pb-2">
        <label for="active">Status:</label>
        <select name="active" id="active" class="form-control">
            <option value="" disabled>Select customer status</option>
            @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
                <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
            @endforeach
        </select>
    </div>

    <div class="from-group">
        <label for="company_id">Company:</label>
        <select name="company_id" id="company_id" class="form-control">
            <option value="" disabled>Select company</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : ''}}>{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group d-flex flex-column mt-4">
        <label for="image">Profile Image</label>
        <input type="file" name="image" class="py-1">
        <div>{{ $errors->first('image') }}</div>
    </div>

    @csrf