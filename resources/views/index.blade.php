@extends('layout')

@section('body')
    @if (auth()->user()->position == 'cashier' && $datas['laundry'] == null)
        <h1 class="m-1 ml-5" style="font-size: 2rem">You no have job maybe, you want join with they</h1>
        <div class="row p-1 justify-content-center">
            @foreach ($datas['listLaundry'] as $i)
                <div class="card m-2" style="width: 15%;">
                    <img src="{{asset("storage/img/{$i->img}")}}" alt="">
                    <div class="card-body">
                        <h1 style="font-size: 2rem">{{Str::limit($i->name, 7, '...')}}</h1>
                        <p class="card-text">{{Str::limit($i->description, 35, '..')}}</p>
                        <a href="#" class="btn bg-info text-light">Info</a>
                    </div>
                </div> 
            @endforeach
        </div> 
        {{$datas['listLaundry']->links()}}
    @elseif(auth()->user()->position == 'owner' || 'cashier')
      @if (auth()->user()->position == 'cashier' && $datas['laundry']!== null)
        <div class="d-flex p-3">
          <div class="w-50">
            <canvas id="grafik" width="500px" height="400px"></canvas>
          </div>

          <div class="w-25" style="display: flex; flex-direction: column">
            <div class="bg-info m-1 rounded" style="height: 10rem">
              <div class="row" style="font-size: 4rem; color: white; height: 100%">
                <p class="my-auto mx-auto"><i class="bi bi-coin"></i>{{$total_payment}}</p>
              </div>
            </div>
            <div class="m-1 rounded p-2" style="background-color: whitesmoke; height: 100%;">
              <p style="font-size: 2rem; border-bottom: 1px solid; padding-bottom: 1rem">Add ordering</p>
              <form action="{{route('add_ordering')}}" method="POST">
                @csrf
                <input type="hidden" name="laundry_id" value="{{$datas['laundry']->id_laundry}}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Laundry Weight</label>
                  <input type="text" class="form-control" name="total_order" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Payment</label>
                  <input type="text" class="form-control" name="cost" id="exampleInputPassword1">
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" name='payment_completed' for="exampleCheck1" value="true">Direct Payment</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          


          <div class="p-1 ml-auto w-25" style="height: 50rem; overflow-y: auto; background-color: #f5f5f5">
            <table class="table" >
              <thead class="text-light bg-info text-center">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Total Order</th>
                  <th scope="col">Status Payment</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas['data_ordering']['ordering'] as $i)
                  <tr>
                    <th scope="row">{{$datas['data_ordering']['data_user'][$i['user_order']][0]['name']}}</th>
                    <td>{{$i['total_order']}} kg</td>
                    @if ($i['payment_completed'])
                      <td><i class="bi bi-check-circle"></i></td>    
                    @else
                      <td><i class="bi bi-x-circle"></i></td>
                    @endif
                    <td>
                    @if (!$i['payment_completed'])
                      <a href="/payment_complete/{{$i['id']}}">Payment Complete</a>
                    @else
                      Payment Complete
                    @endif
                    <a href="/remove/{{$i['id']}}">Remove</a>
                    </td>
                  </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif
      @if (auth()->user()->position == 'owner')
        <div class="d-flex p-3">
          <div class="w-50">
            <canvas id="grafik" width="500px" height="400px"></canvas>
          </div>
          <div class="bg-info w-25 m-1 rounded" style="height: 10rem">
            <div class="row" style="font-size: 4rem; color: white; height: 100%">
              <p class="my-auto mx-auto"><i class="bi bi-coin"></i>{{$total_payment}}</p>
            </div>
          </div>
          <div class="p-1 ml-auto w-25" style="height: 50rem; overflow-y: auto; background-color: #f5f5f5">
            <table class="table" >
              <thead class="text-light bg-info">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Total Order</th>
                  <th scope="col">Status Payment</th>
                </tr>
              </thead>
              <tbody style="">
                @foreach ($datas['data_ordering']['ordering'] as $i)
                  <tr>
                    <th scope="row">{{$datas['data_ordering']['data_user'][$i['user_order']][0]['name']}}</th>
                    <td>{{$i['total_order']}} kg</td>
                    @if ($i['payment_completed'])
                      <td><i class="bi bi-check-circle"></i></td>    
                    @else
                      <td><i class="bi bi-x-circle"></i></td>
                    @endif
                  </tr>    
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif
    @endif
    
    @section('script')
    @if (auth()->user()->position == 'cashier' && $datas['laundry'] !== null)
      <script>
        let data = {!! json_encode(collect($datas['data_ordering']['ordering'])->groupBy(['year', 'month'])) !!}
      </script>
    @elseif(auth()->user()->position == 'owner')
      <script>
        let data = {!! json_encode(collect($datas['data_ordering']['ordering'])->groupBy(['year', 'month'])) !!}
      </script>
    @endif
      <script src="{{asset('js/grafik.js')}}"></script>
    @endsection
@endsection