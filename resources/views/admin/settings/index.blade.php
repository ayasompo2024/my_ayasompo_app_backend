@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" style="min-height: 100vh">
        @include('admin.validation-error-alert')
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                   <div class="col-md-12 mx-auto mt-3">
                      <div class="card">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h1 class="card-title">General Setting</h1>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-striped ">
                                <thead class="bg-info">
                                  <tr>
                                    <th class="p-1" scope="col">No</th>
                                    <th class="p-1" scope="col">Description</th>
                                    <th class="p-1" scope="col">Current Value</th>
                                    <th class="p-1" scope="col">Changeable  Value</th>
                                    <th class="p-1" scope="col">Change</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $key=>$setting)
                                    <tr>
                                        <th class="py-1 px-2">{{++$key}}</th>
                                        <td class="py-1">{{$setting->description}}</td>
                                        <td class="py-1">{{$setting->current_value}}</td>
                                        <td class="py-1">
                                          @if(!empty($setting->holding_values) && $setting->input_type == 'select' )
                                            @foreach(json_decode($setting->holding_values) as $val)
                                                {{$val}},
                                            @endforeach
                                            @else
                                             Any
                                            @endif
                                        </td>
                                        <td class="py-1 pr-2">
                                            <form action="{{route('admin.settings.update',$setting->id)}}" method="post">
                                                @method('put')
                                                @csrf
                                              <div class="row"> 
                                                <div class="col-8">
                                                   @if(!empty($setting->holding_values) && $setting->input_type == 'select' )
                                                   <select name="value" class="custom-select custom-select-sm py-1">
                                                    @foreach(json_decode($setting->holding_values) as $val)
                                                        <option value="{{$val}}">{{$val}}</option>
                                                    @endforeach  
                                                  </select>
                                                  @else
                                                    <input name="value" type="{{$setting->input_type}}" class="form-control form-control-sm">
                                                   @endif
                                                </div>
                                                <div class="col-4">
                                                    <input type="submit" value="update" class="btn btn-sm bg-info">
                                                </div>
                                              </div>
                                            </form>
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                          </div>
                      </div>
                  </div>                  
              </div>
            </div>
          </section>
    </div>
@endsection

