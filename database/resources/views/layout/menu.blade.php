<div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
                    @foreach($theloai as $tl)
                   
                    <li class="list-group-item menu1">
                       <a href="theloai/{{$tl->TenKhongDau}}.{{$tl->id}}.html">
                    	{{$tl->Ten}}</a>
                    </li>
                    <ul> 
                        @if(count($tl->loaitin)>0)
                        @foreach($tl->loaitin as $lt)
                		<li class="list-group-item">
                        <a href="loaitin/{{$lt->TenKhongDau}}.{{$lt->id}}.html">{{$lt->Ten}}</a>
                            		</li>
                		@endforeach
                       @endif
                    </ul>
                    
                    @endforeach
                   
            </div>
        