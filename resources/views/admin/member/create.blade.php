@extends('admin.layout.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            
            @if(isset($saved_member) && isset($saved_member->id) && $saved_member->id >0)
                <h4 class="m-t-0 header-title">Edit member</h4>
            @else
                <h4 class="m-t-0 header-title">Add member</h4>
            @endif
            <p class="text-muted m-b-30 font-14">

            </p>
            <div class="mb-3">
                <div class="row">

                    <div class="offset-9 col-3">
                        <a class="btn btn-secondary waves-light waves-effect pull-right" href="{{route('member.index')}}"><i class="mdi mdi-keyboard-backspace"></i> Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        @if(count($errors))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <br/>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(isset($saved_member) && isset($saved_member->id) && $saved_member->id >0)
                            {!! Form::model($saved_member,['route' => ['member.update', $saved_member->id] ,'method' => 'PATCH' ,'files' => true]) !!}
                        @else
                            {!! Form::open(['route' => 'member.store' ,'method' => 'post' ,'files' => true]) !!}
                        @endif
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-12">Name</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-12">E-Mail Address</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-12">Password</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-12">Confirm Password</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                        </form>
                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection