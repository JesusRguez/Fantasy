@extends('layout.general')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List Fantasies</h3></div>
          <div class="pull-right">
            <div class="btn-group">
                <span><a href="{{ route('fantasy.create') }}"  ><img class="icon-header" src="{{ asset('assets/stimey/graphics/icons/BTN-Add-circle.png')}}"></a>
                </span>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <!--<th>State</th>
               <th>topic</th>
               <th>Author</th>-->
               <th>Edit</th>
               <th>Delete</th>
               
             </thead>
             <tbody>
              @if($fantasies->count())  
                @foreach ($fantasies as $fantasy)  
                  <tr>
                    <td>{{$fantasy->name}}</td>
                    <!--<td>{{$fantasy->state}}</td>
                    <td>{{$fantasy->topic}}</td>
                    <td>{{$fantasy->author}}</td>-->
                    <td><a class="btn btn-primary btn-xs" href="{{action('FantasyController@edit', $fantasy->id)}}" ><span></span><img src="{{asset('assets/stimey/graphics/icons/BTN-Edit-circle.png')}}" class="icon-header"></a></td>
                    <td>
                      <form action="{{action('FantasyController@destroy', $fantasy->id)}}" method="post">
                       {{csrf_field()}}
                       <input name="_method" type="hidden" value="DELETE">

                       <button class="btn btn-danger btn-xs" type="submit"><span><img src="{{asset('assets/stimey/graphics/icons/ICON_Delete-Post.png')}}" class="icon-header"></span></button>
                     </form>
                     </td>
                   </tr>
                 @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection
