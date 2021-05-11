@csrf
<div class="col-md-4">
  <label for="number" class="form-label" >Numero de servicio</label>
  <input type="text" class="form-control" name="number" id="number" value="{{ old('number',$number->number) }}" required>
</div>
<div class="col-md-4">
  <label for="company_id" class="form-label" >Empresa Titular</label>
    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="company_id" id="company_id" value="{{old('company_id')}}">
      
      @foreach ( $companies as $key => $company )
        <option value="{{$key}}" @if ($key == old('company_id',$number->company_id)) selected @endif>{{$company->company_name}}</option>
      @endforeach
      
    </select>
</div>
<div class="col-md-4">
  <label for="status" class="form-label" >Estado</label>
    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="status" id="status" value="{{old('status')}}">
      <option value="1">Asignado</option>
      <option value="2">No Asignado</option>
    </select>
</div>
<br>
<div class="col-6 m3">
  <button type="submit" class="btn btn-primary">{{$btnText}}</button>
</div>
