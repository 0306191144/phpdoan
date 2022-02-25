@if($errors->any())
    <div class='alert alert-danger'> 
<ul>
    @foreach($errors->all() as $error)
<li>{{
    $error
    }}</li>
    
    @endforeach
</ul>
    </div>
@endif

 @if (session()->has('error'))
<div class='alert alert-danger'> 
<div> {{
     session()->get('error'); }}
</div>
</div>
@endif 