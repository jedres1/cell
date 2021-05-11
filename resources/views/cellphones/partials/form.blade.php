@csrf
<div class="col-md-6">
  <label for="model" class="form-label" >model</label>
  <input type="text" class="form-control" name="model" id="model" value="{{ old('model',$cellphone->model) }}" required>
</div>
<div class="col-md-6">
  <label for="brand" class="form-label" >Marca</label>
  <input type="text" class="form-control" name="brand" id="brand" value="{{old('brand',$cellphone->brand)}}"required>
</div>
<div class="col-md-6">
  <label for="imei" class="form-label" >imei</label>
  <input type="text" class="form-control" name="imei" id="imei" value="{{old('imei',$cellphone->imei)}}"required>
</div>
<div class="col-md-6">
  <label for="number" class="form-label" >Numero</label>
  <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="number" id="number" value="{{old('number',$cellphone->number_id)}}">
    @foreach ( $numbers as $number )
        <option value="{{$number->id}}">{{$number->number}}</option>
    @endforeach
  </select>
</div>
<div class="col-md-4">
  <label for="company_id" class="form-label" >Empresa Titular</label>
    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="company_id" id="company_id" value="{{old('company_id',$cellphone->company_id)}}">
      
      @foreach ( $companies as $company )
        <option value="{{$company->id}}">{{$company->company_name}}</option>
      @endforeach
      
    </select>
</div>
<div class="col-md-4">
  <label for="department_id" class="form-label" >Departamento Asignado</label>
  <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="department_id" id="department_id" value="{{old('department_id',$cellphone->department_id)}}">

    @foreach ( $departments as $department )
        <option value="{{$department->id}}">{{$department->department_name}}</option>
    @endforeach
  </select>
</div>
<div class="col-md-4">
  <label for="status" class="form-label" >Estado</label>
  <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="status" id="status" value="{{old('status',$cellphone->status)}}">
    <option value="0">Disponible</option>
    <option value="1">Asignado</option>
  </select>
</div>
<br>
<div class="col-6 m3">
  <button type="submit" class="btn btn-info">{{ $btnText }}</button>
</div>

