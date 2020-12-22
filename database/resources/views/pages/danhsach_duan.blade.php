@extends('pages.layout.index')

@section('content')
<div id="container" class="w-clear">
				<div class="w-clear wikis">
					
<div class=" w-clear ">
    <div class="main-tit w-clear">
        <h2 class="name">{{$tentheloai}}</h2>
    </div>
            </div>

    <div class="w-clear ">
        <div class="content w-clear ">

                <div class=" sukienclick ds_sp col_4">
                @foreach($duan as $da)
                <div class="box-sp w-clear ">
                    <a href="chitiet_duan/{{$da->id}}.html">
                        <div class="images">
                            <img src="public/upload/duan/{{$da->anh}}" >
                        </div>
                    </a>
                    <div class="info w-clear">
                        <a href=".html">
                            <div class="name">{{$da->Ten}}
                            </div>
                       </a>
                    </div>
                    <a class="more button" href="chitiet_duan/{{$da->id}}.html">
                        Xem thêm                               
                    </a>
                </div>
            @endforeach
                
                
         </div>
            <div class="phantrang"> {{$duan->links()}} </div>
            
     </div>
    </div>

</div>
</div>
     @endsection