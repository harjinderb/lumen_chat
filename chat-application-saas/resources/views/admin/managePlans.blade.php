@extends('layouts.admin')
@section('title')
{{$page_title}}
@stop
@section('moreHead')
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
          <h4 class="card-title ">Plans</h4>
          <p class="card-category"> Subscription plans section.</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Price
                </th>
                <th>
                  Trial Days
                </th>
                <th>
                  Popular
                </th>
                <th>
                  Status
                </th>
                <th width="300">
                  Action
                </th>
              </thead>
              <tbody>
                @forelse($planData as $key => $plan)
                <tr id="row{{ $plan->_id }}">
                  <td>
                    {{$plan->name}}
                  </td>
                  <td>
                    {{$plan->currency .' '. $plan->price}}
                  </td>
                  <td>
                    {{$plan->trial_days}}
                  </td>
                  <td>
                    @if($plan->popular && $plan->popular == 'on') <span class="text-success">Yes</span> @else <span class="text-muted">No</span> @endif
                  </td>
                  <td>
                    @if($plan->status == 0) <span class="text-success">Active</span> @else <span class="text-danger">Deactivated</span> @endif
                  </td>
                  <td>
                    <div data-toggle="buttons-radio" class="btn-group">
                      <button class="btn btn-success btn-gradient reload" type="button" title="Edit and View" onclick="window.location.href = '{{URL :: to('admin/plans/edit')}}/{{ $plan->_id }}'"><i class="fa fa-pencil"></i> </button>
                      <a class="btn btn-danger btn-gradient planDelete" href="#deletePlan" data-toggle="modal" data-target="#deletePlan" id="{{$plan->_id}}" title="Delete"><i class="fa fa-remove"></i></a>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td rowspan="5">
                    No record found!
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- --------------------Model ------------>
      <div class="modal fade" id="deletePlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body">
              <h5 id="myModalLabel" class="semi-bold">Are you sure that you want to delete "<b class="blogname"></b>" plan?</h5>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-link" data-dismiss="modal">Never mind</button>
              <button type="button" class="btn btn-success btn-link deletePlan" id="">Yes
              <div class="ripple-container"></div>
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- --------------------Model end------------>
    </div>
  </div>
</div>
@endsection
@section('moreJS')
<script type="text/javascript">
$(document).on('click','.planDelete',function(){
  var catname= $(this).parents('tr').children('td:nth-child(1)').text();
  var id= $(this).attr('id');
  $('.blogname').text(catname);
  $('.deletePlan').attr('id',id);
});

$('.deletePlan').click(function(){
  var id= $(this).attr('id');
  var token= '{{ csrf_token() }}';
  $.post('{{ URL :: to('admin/plans/delete')}}',{id:id,_token:token},function(data){
    $('#deletePlan').modal('toggle');
    $('#row'+id).addClass('row_selected');
    setTimeout(function(){
      $('#row'+id).removeClass('row_selected');
      $('#row'+id).remove();
    },2000);
  });
});
</script>
@stop