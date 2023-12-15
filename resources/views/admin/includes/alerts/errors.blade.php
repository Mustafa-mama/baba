@if(Session::has('error'))
    <div class="text-center">
            
            <span class="text-danger">{{Session::get('error')}}</span>
           
    </div>
@endif
