@extends('admin.layouts.app')
@section('title')
    New Admin
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <form class="form-material form-group" method="post" action="{{route('admins.store')}}">
                {{ csrf_field() }}
                {{method_field('POST')}}
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
                        <h2 class="panel-title">Create Admin</h2>
                        <p class="panel-subtitle">
                            Create a new admin
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <input type="text" name="name" placeholder="Admin Name" class="form-control">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <input type="text" name="username"  placeholder="Admin user Name" class="form-control">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div> 

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <input type="email" name="email"  placeholder="Admin Email" class="form-control">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>


                        <div class="row form-group">
                            <div class="col-lg-12">
                                <input type="text" id="password" name="password" placeholder="Admin Password" class="form-control">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
                                    <input type="checkbox"   id="generate_password" name="generate_password">
                                    <label for="generate_password">Generate Password</label>
                                </div></div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                    </div>
                    <footer class="panel-footer">
                        <button class="btn btn-primary">Create Admin</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $('#generate_password').change(function(){
                if(this.checked)
                {
                    function makeid(length) {
                        var text = "";
                        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                        for (var i = 0; i < length; i++)
                            text += possible.charAt(Math.floor(Math.random() * possible.length));

                        return text;
                    }
                    console.log(makeid(5));
                    $('#password').val(makeid(10));
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection