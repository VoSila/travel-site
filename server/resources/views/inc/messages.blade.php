@if($errors->any())
    <div class="tn-box tn-box-color-1">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="success-message">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="error-message">
        {{session('error')}}
    </div>
@endif

<script>
    setTimeout(function () {
        $('.tn-box-success').addClass('tn-box-active');
    }, 5000);
</script>

