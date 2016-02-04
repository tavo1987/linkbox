<div class="form-group">
    {!!Form::label('name','Escribe tu nombre')!!}
    {!!Form::text('name',null,['placeholder'=>'Escribe tu nombre', 'class'=>"radius form-control"])!!}
</div>

<div class="form-group">
    {!!Form::label('email','Escribe tu correo eléctronico')!!}
    {!!Form::email('email',null,['placeholder'=>'Escribe tu correo electrónico', 'class'=>"radius form-control"])!!}
</div>

<div class="form-group">
    {!!Form::label('password','Escribe tu contraseña')!!}
    {!!Form::password('password',['class'=>"radius form-control"])!!}
</div>

<div class="form-group">
    {!!Form::label('password','Repite tu contraseña')!!}
    {!!Form::password('password_confirmation',['class'=>"radius form-control"])!!}
</div>