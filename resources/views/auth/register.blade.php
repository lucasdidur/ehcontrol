@extends('auth.template')

@section('content')
<div class="panel panel-info mt10 br-n">
    {!! Form::open(array('url' => '/auth/register', 'class' => 'form-horizontal')) !!}
        {!! csrf_field() !!}
        <div class="panel-body p25 bg-light">
            <div class="section-divider mt10 mb40">
                <span>Configure sua conta</span>
            </div>
            <!-- .section-divider -->

            <div class="section row">
                <div class="col-md-6">
                    <label for="first_name" class="field prepend-icon">
                        {!!Form::text('first_name', null, ['id' => 'first_name', 'class'=> 'gui-input', 'placeholder' => 'Nome'])!!}
                        <label for="first_name" class="field-icon">
                            <i class="fa fa-user"></i>
                        </label>
                    </label>
                </div>
                <!-- end section -->

                <div class="col-md-6">
                    <label for="last_name" class="field prepend-icon">
                        {!!Form::text('last_name', null, ['id' => 'last_name', 'class'=> 'gui-input', 'placeholder' => 'Sobrenome'])!!}
                        <label for="last_name" class="field-icon">
                            <i class="fa fa-user"></i>
                        </label>
                    </label>
                </div>
                <!-- end section -->
            </div>
            <!-- end .section row section -->

            <div class="section">
                <label for="email" class="field prepend-icon">
                    {!!Form::email('email', null, ['id' => 'email', 'class'=> 'gui-input', 'placeholder' => 'Endereço de email'])!!}
                    <label for="email" class="field-icon">
                        <i class="fa fa-envelope"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->

            <div class="section">
                <label for="password" class="field prepend-icon">
                    {!!Form::password('password', ['id' => 'password', 'class'=> 'gui-input', 'placeholder' => 'Crie uma senha'])!!}
                    <label for="password" class="field-icon">
                        <i class="fa fa-unlock-alt"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->

            <div class="section">
                <label for="password_confirmation" class="field prepend-icon">
                    {!!Form::password('password_confirmation', ['id' => 'password_confirmation', 'class'=> 'gui-input', 'placeholder' => 'Redigite sua senha'])!!}
                    <label for="password_confirmation" class="field-icon">
                        <i class="fa fa-lock"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->

            <div class="section-divider mv40">
                <span>Informações Adicionais</span>
            </div>
            <!-- .section-divider -->

            <div class="section">
                <label for="username" class="field prepend-icon">
                    {!! Form::text('username_minecraft', null, ['id' => 'username_minecraft', 'class'=> 'gui-input', 'placeholder' => 'Nome de usuário minecraft']) !!}
                    <label for="username" class="field-icon">
                        <i class="fa fa-user"></i>
                    </label>
                </label>
            </div>
            <!-- end .section -->

            <div class="section">
                <label for="phone" class="field prepend-icon">
                    {!! Form::text('phone', null, ['id' => 'phone', 'class'=> 'gui-input', 'placeholder' => 'Telefone ceular']) !!}
                    <label for="phone" class="field-icon">
                        <i class="fa fa-phone"></i>
                    </label>
                </label>
            </div>
            <!-- end .section -->

        </div>
        <!-- end .form-body section -->

        <div class="panel-footer clearfix">
            {!! Form::submit('Criar conta', ['class' => 'button btn-primary pull-right']) !!}
        </div>
        <!-- end .form-footer section -->
    {!! Form::close() !!}
</div>
@stop