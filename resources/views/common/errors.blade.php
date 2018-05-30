

@if(count($errors)>0)
    <!-- form error list -->
    <div class="alert alert-danger">
        <div><strong>入力した文字を修正して下さい</strong></div>
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </ul>
        </div>
    </div>
@endif