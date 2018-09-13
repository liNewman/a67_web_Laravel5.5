@extends('layouts.admin-app')
@section('title','编辑角色权限')
@section('content')
    <div class="contentpanel">

        <div class="row">

            <div class="col-sm-9 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="panel-close">×</a>
                            <a href="" class="minimize">−</a>
                        </div>
                        <h4 class="panel-title">编辑[{{$info['role_name']}}]权限</h4>
                    </div>

                    <form action="/admin/role/permission/store" method="post" id="role-permissions-form">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$info['id']}}" name="role_id">

                        <div class="panel-body panel-body-nopadding">



                           @if(!empty($permissions))
                               @foreach($permissions as $permission)

                            <div class="top-permission col-md-12">
                                <a href="javascript:;" class="display-sub-permission-toggle">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                                <input type="checkbox" name="permissions[]" value="{{$permission['id']}}"
                                       class="top-permission-checkbox" {{in_array($permission['id'],$role_permission)?"checked":""}} />
                                <label><h5>&nbsp;&nbsp;{{$permission['name']}}</h5></label>
                            </div>

                                @if(isset($permission['son']))

                            <div class="sub-permissions col-md-11 col-md-offset-1">
                                <div class="col-sm-3">
                                    @foreach($permission['son'] as $sub)
                                    <label><input type="checkbox" name="permissions[]"
                                                  value="{{$sub['id']}}"
                                                  class="sub-permission-checkbox" {{in_array($sub['id'],$role_permission)?"checked":""}}/>&nbsp;&nbsp;@if($sub['is_menu']==1)@endif<span
                                                class="fa fa-bars"></span>&nbsp;{{$sub['name']}}
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                                    @endif
                                @endforeach
                           @endif







                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <button class="btn btn-primary" >保存</button>
                                </div>
                            </div>
                        </div><!-- panel-footer -->

                    </form>

                </div>

            </div><!-- col-sm-9 -->

        </div><!-- row -->

    </div>
    <script>
        $(".display-sub-permission-toggle").toggle(function () {
            $(this).children('span').removeClass('glyphicon-minus').addClass('glyphicon-plus')
                .parents('.top-permission').next('.sub-permissions').hide();
        }, function () {
            $(this).children('span').removeClass('glyphicon-plus').addClass('glyphicon-minus')
                .parents('.top-permission').next('.sub-permissions').show();
        });

        $(".top-permission-checkbox").change(function () {
            $(this).parents('.top-permission').next('.sub-permissions').find('input').prop('checked', $(this).prop('checked'));
        });

        $(".sub-permission-checkbox").change(function () {
            if ($(this).prop('checked')) {
                $(this).parents('.sub-permissions').prev('.top-permission').find('.top-permission-checkbox').prop('checked', true);
            }
        });
    </script>
    <script type="text/javascript">
        $("#save-role-permissions").click(function (e) {
            e.preventDefault();
            Rbac.ajax.request({
                href: $("#role-permissions-form").attr('action'),
                data: $("#role-permissions-form").serialize(),
                successTitle: '角色权限保存成功'
            });
        });
    </script>

@endsection