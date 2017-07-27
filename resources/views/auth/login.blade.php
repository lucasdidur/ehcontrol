@extends('auth.template')

@section('content')
<div class="panel panel-info mt10 br-n">
    <!-- end .form-header section -->
    {!! Form::open(array('url' => '/auth/login', 'class' => 'form-horizontal')) !!}
    {!! csrf_field() !!}
    <div class="panel-body bg-light p30">
        <div class="row">
            <div class="col-sm-7 pr30">
                <div class="section">
                    <label for="email" class="field-label text-muted fs18 mb10">Nome de Usuario</label>
                    <label for="email" class="field prepend-icon">
                        {!!Form::text('email', null, ['id'=> 'email', 'class'=> 'gui-input', 'placeholder' => 'Digite seu email'])!!}
                        <label for="email" class="field-icon">
                            <i class="fa fa-user"></i>
                        </label>
                    </label>
                </div>
                <!-- end section -->

                <div class="section">
                    <label for="username" class="field-label text-muted fs18 mb10">Senha</label>
                    <label for="password" class="field prepend-icon">
                        {!!Form::password('password', ['id'=> 'password', 'class'=> 'gui-input', 'placeholder' => 'Digite a senha'])!!}
                        <label for="password" class="field-icon">
                            <i class="fa fa-lock"></i>
                        </label>
                    </label>
                </div>

            </div>
            <div class="col-sm-5 br-l br-grey pl30">
                <h3 class="mb25"> Faça o seu cadastro:</h3>

                <p class="mb15">
                    <span class="fa fa-check text-success pr5"></span> Unlimited Email Storage</p>

                <p class="mb15">
                    <span class="fa fa-check text-success pr5"></span> Unlimited Photo Sharing/Storage</p>

                <p class="mb15">
                    <span class="fa fa-check text-success pr5"></span> Unlimited Downloads</p>

                <p class="mb15">
                    <span class="fa fa-check text-success pr5"></span> Unlimited Service Tickets</p>
            </div>
        </div>
    </div>
    <!-- end .form-body section -->

    <div class="panel-footer clearfix p10 ph15">
        {!! Form::submit('Login', ['class' => 'button btn-primary mr10 pull-right']) !!}
        <label class="switch ib switch-primary pull-left input-align mt10">
            {!! Form::checkbox('remember', null, true, ['id' => 'remember']) !!}
            <label for="remember" data-on="SIM" data-off="NÃO"></label>
            <span>Lembrar-me</span>
        </label>
    </div>
    <!-- end .form-footer section -->
    {!! Form::close() !!}
</div>
</div>
@stop