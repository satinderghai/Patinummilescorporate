@extends('layouts.backend.master')
@section('content')

<div class="nk-content order-view">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">User Information <strong class="text-primary small">{{ $getPage->title }}</strong></h3>
                                       
                                        </div>
                                        <div class="nk-block-head-content back-btn">
                                            <a href="{{ url('admin/page') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon fas fa-arrow-left"></em><span>Back</span></a>
                                            <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon fas fa-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">
                                              
                                                <div class="card-inner">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head">
                                                            <h5 class="title">Page Information</h5>
                                                       
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">
                                                     
                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Title Name</span>
                                                                    <span class="profile-ud-value">{{ $getPage->title }} </span>
                                                                </div>
                                                            </div>
                                                           <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Slug</span>
                                                                    <span class="profile-ud-value">{{ $getPage->slug }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Content</span>
                                                                     <?php $content = substr(strip_tags($getPage->content),0,40)."..."; ?>
                                                                    <span class="profile-ud-value">{!! $content !!}</span>
                                                                </div>
                                                            </div>
                                                           
                                                           <div class="profile-ud-item">
                                                                <div class="profile-ud wider">
                                                                    <span class="profile-ud-label">Created at</span>
                                                                    <span class="profile-ud-value">{{ date('d M Y', strtotime($getPage->created_at)) }}</span>
                                                                </div>
                                                            </div>
                                                        </div><!-- .profile-ud-list -->
                                                    </div><!-- .nk-block -->
                                                    
                                                    
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-content -->
                                            
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                @stop

