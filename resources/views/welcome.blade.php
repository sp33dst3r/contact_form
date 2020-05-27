@extends('layouts.app')

@section('title', 'Page Title')



@section('content')
    <h1>Contact Form</h1>


    <div id="app">
        <router-view name="contactForm"></router-view>
        <router-view></router-view>
    </div>
@endsection
