@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Team</span>
                            </li>
                        </ul>
                        <div class="col-md-3" style="float: right; margin-top: 5px;">
                        <div class="btn-group">
                            <a href="{{route('admin.team.add')}}" class="btn green btn-sm btn-outline sbold uppercase">
                                Add New Team Member
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!-- End col -->
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Team Table
                                    </div>
                                    <div class="tools">
                                       <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Content</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($teams as $team)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$team->id}} 
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('storage/uploads/teams').'/'.$team->image}}" style="max-width: 250px;">
                                                    </td>
                                                    <td>
                                                        {{$team->name}} 
                                                    </td>
                                                    <td>
                                                        {{$team->title}} 
                                                    </td>
                                                    <td style="max-width: 350px;">
                                                        {{$team->content}} 
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.team.edit' , ['id' => $team->id]) }}" class="btn green btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> Edit   </a><br><br><a href="{{ route('admin.team.delete' , ['id' => $team->id]) }}" class="btn red btn-sm btn-outline sbold uppercase">
                                                        <i class="fa fa-trash"></i>  Delete </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--End table-scrollable-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md--12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection