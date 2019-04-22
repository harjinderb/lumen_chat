@extends('layouts.admin')

@section('title')
{{$page_title}}
@stop

@section('content')

 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
       @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
          {{ Session::get('message') }}
          </div>
          </br>
        @endif
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">All Companies</h4>
          <p class="card-category">Manage your companies.</p>
        </div>
        <div class="card-body">
         @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div><br />
          @endif
          <br>
        @foreach ($companiesData as $companyData)
        <div id="Comapny_{{$companyData['_id']}}">
          {!! Form::open(array('url'=> 'owner/companyEdit','id'=>'userUpdate','class'=>'userUpdate-form')) !!}
          {!! Form::hidden('id',$companyData['_id']) !!}
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Comapny Name *">Company Name *</label>
                  {!! Form::text('name',$companyData['name'], ['class'=>'form-control edit','id'=>'name']) !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Email Address *">Email Address *</label>
                  {!! Form::text('email',$companyData['email'], ['class'=>'form-control edit','id'=>'email']) !!}
                </div>
              </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Mobile *">Mobile *</label>
                  {!! Form::text('mobile',$companyData['mobile'], ['class'=>'form-control edit number','id'=>'mobile']) !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                   @php
                      $status= ['0'=>'Activate','1'=>'Deactivate'];
                    @endphp
                  {!! Form::select('status', $status,$companyData['status'],array('class'=>'form-control edit', 'id'=>'status')) !!}

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <h4 class="card-title">Company Confidential Keys </h4>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Access Key">Access Key </label>
                  <input class="form-control disabled" readonly="" type="text" value="{{ $companyData['access_key']}}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                 <label class="bmd-label-floating" for="Secret Key">Secret Key </label>
                  <input class="form-control disabled" readonly="" type="text" value="<?=$companyData['secret_key'];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Tocken">Tocken </label>
                  <input class="form-control disabled" readonly="" type="text" value="<?=$companyData['tocken'];?>">
                </div>
              </div>
           </div>
             <button type="submit" class="btn btn-primary pull-right edit" id="{{$companyData['_id']}}" style="display: none;">Edit</button>
             <button type="submit" class="btn btn-primary pull-right update" id="{{$companyData['_id']}}" >Update</button>
            <div class="clearfix"></div>
            {!! Form::close() !!}
         </div>
         <hr>
         @endforeach
        </div>
      </div>
    </div>

  </div>
</div>



@endsection

@section('moreJS')
{!! HTML::script('js/form_validations.js') !!}
{!! HTML::script('js/common.js') !!}
<script type="text/javascript">
  onlyNumber('number');
</script>

@stop
