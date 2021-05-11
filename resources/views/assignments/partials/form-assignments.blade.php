@csrf
        <div class="col-md-6">
          <label for="cellphone_id" class="form-label" >Celular</label>
          <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="cellphone_id" id="cellphone_id" value="{{old('cellphone_id',$assignment->cellphone_id)}}">
            <option selected>Seleccione Celular</option>
            @foreach ( $cellphones as $key => $cellphone )
                <option value="{{($key+1)}}" @if (($key+1) == old('cellphone_id',$assignment->cellphone_id))selected @endif>{{ $cellphone->brand }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label for="employee_id" class="form-label" >Empleado Asignado</label>
          <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="employee_id" id="employee_id"  value="{{old('employeed_id',$assignment->employeed_id)}}">
            
            @foreach ( $employees as $key => $employee )
                <option value="{{($key+1)}}" @if (($key+1) == old('employee_id',$cellphone->employee_id))selected @endif>{{$employee->employee_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label for="status" class="form-label" >Estatus Asignacion</label>
          <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="status" id="status"  value="{{old('status',$assignment->status)}}">
            <option selected>Seleccione estado</option>
            <option value="0">Entrega Pendiente</option>
            <option value="1">Activo</option>
          </select>
        </div>
        <br>
        <div class="col-6 m3">
          <button type="submit" class="btn btn-primary">{{$btnText}}</button>
        </div>